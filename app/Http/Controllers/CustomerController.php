<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Form;
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
        return Datatables::eloquent(Customer::with('image', 'detail'))
            ->addColumn('action', function ($customer)
            {
                if ($this->user->canOne(['read.deposit', 'update.customer', 'delete.customer']))
                {
                    $buttons = Form::open(['route' => ['admin.customer.destroy', $customer->slug], 'method' => 'DELETE']);
                    if ($this->user->can('update.customer'))
                    {
                        $buttons .= '<a href="' . route('admin.customer.edit', $customer->slug) . '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($this->user->can('read.deposit'))
                    {
                        $buttons .= '<a href="' . route('admin.customer.deposit.index', $customer->slug) . '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Deposits"><i class="fa fa-money"></i></a>';
                    }
                    if ($this->user->can('delete.customer'))
                    {
                        $buttons .= '<button type="submit" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="return confirm(\'Delete customer ' . $customer->name . '?\')"><i class="fa fa-trash-o"></i></button>';
                    }
                    $buttons .= Form::close();
                } else
                {
                    $buttons = '<em>NA</em>';
                }

                return $buttons;
            })
            ->make(true);
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
     * @param Customer $customer
     * @return \Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        $country = Country::lists('name', 'id');

        return view('customer.edit', compact('customer', 'country'));
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
        } else
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

        return redirect()->back()->with('success', 'Customer deleted!');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function details(Request $request)
    {
        $customer = Customer::with('detail','vpsProvisions','webProvisions','emailProvisions','domainProvisions', 'sslProvisions')
            ->findOrFail($request->get('id'));

        return view('customer.detail', compact('customer'))->render();
    }
}
