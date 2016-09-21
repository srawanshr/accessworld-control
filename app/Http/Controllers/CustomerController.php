<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Models\Customer;
use DB;
use Form;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class CustomerController extends Controller {

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
        return Datatables::eloquent(Customer::with('image')->select(['username','phone','address','first_name', 'last_name', 'email', 'id']))
            ->addColumn('action', function ($customer)
            {
                if (auth()->user()->canOne(['read.customer', 'save.customer', 'delete.customer']))
                {
                    $buttons = false;
                    if (auth()->user()->can('read.customer'))
                        $buttons .= '<a href="'.route('customer.show', $customer->username).'" class="text-primary">View</a>';

                    if (auth()->user()->can('save.customer'))
                        $buttons .= '&nbsp;&nbsp;<a href="' . route('customer.edit', $customer->username) . '" class="text-primary">Edit</a>';

                    if (auth()->user()->can('delete.customer'))
                        $buttons .= '&nbsp;&nbsp;<a role="button" href="javascript:void(0);" class="text-primary item-delete" data-url="' . route('customer.destroy', $customer->username) . '">Delete</a>';
                } else {
                    $buttons .= "NA";
                }

                return $buttons;
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

            $this->uploadRequestImage($request, $customer);
        });

        return redirect()->route('customer.index')->withSuccess(trans('messages.create_success', ['entity' => 'Customer']));
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
     * @param UpdateCustomer $request
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCustomer $request, Customer $customer)
    {
        DB::transaction(function () use ($request, $customer)
        {
            $customer->update($request->data());

            $this->uploadRequestImage($request, $customer);
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
        if ($customer->delete())
            return response()->json([
                'Result' => 'OK'
            ]);

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }
}
