<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Models\Customer;
use DB;
use Form;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class CustomerController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('customer.index');
    }

    /**
     * @return mixed
     */
    public function customerList()
    {
        return Datatables::eloquent(Customer::with('image')->select([
            'username',
            'email',
            'id'
        ]))->addColumn('action', function ($customer)
            {
                $buttons = Form::open([ 'route' => [ 'customer.destroy', $customer->username ], 'method' => 'DELETE' ]);
                $buttons .= '<a href="' . route('customer.edit', $customer->username) . '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
                $buttons .= '<button type="submit" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="return confirm(\'Delete customer ' . $customer->name . '?\')"><i class="fa fa-trash-o"></i></button>';
                $buttons .= Form::close();

                return $buttons;
            })->addColumn('avatar', function ($customer)
            {
                return thumbnail(50, $customer);
            })->make(true);
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\View\View
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * @param StoreCustomer $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCustomer $request)
    {
        DB::transaction(function () use ($request)
        {
            $customer = Customer::create($request->data());
            $customer->detail()->save($request->data());

            $this->uploadRequestImage($request, $customer);
        });

        return redirect()->route('customer.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Customer' ]));
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        if ($request->get('password') == "")
        {
            $inputs = $request->except('password');
        }
        else
        {
            $inputs['password'] = bcrypt($request->get('password'));
        }

        DB::transaction(function () use ($inputs, $request, $customer)
        {
            $customer->update($inputs);
            if ($request->hasFile('profile_picture'))
            {
                $customer->image->setPath($request->file('profile_picture'));
            }
            $customer->detail->update($inputs['detail']);
        });

        return redirect()->back()->with('success', 'Customer updated!');
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->withSuccess(trans('messages.delete_success', [ 'entity' => 'Customer' ]));
    }

    /**
     * @param Request $request
     * @return string
     */
    public function details(Request $request)
    {
        $id = $request->get('id', false);

        if ($id)
        {
            $customer = Customer::with('detail', 'vpsProvisions', 'webProvisions', 'emailProvisions', 'domainProvisions', 'sslProvisions')->findOrFail($id);

            return view('customer.detail', compact('customer'))->render();
        }

        return false;
    }
}
