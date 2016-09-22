<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeposit;
use App\Models\Customer;
use App\Models\ManualDeposit;
use Yajra\Datatables\Facades\Datatables;

class DepositController extends Controller
{
    /**
     * @param Customer $customer
     * @return mixed
     */
    public function index(Customer $customer)
    {
        return view('deposits.index', compact('customer'));
    }

    /**
     * @param Customer $customer
     * @return mixed
     */
    public function depositList(Customer $customer)
    {
        return Datatables::eloquent($customer->deposits()->with('user'))->make(true);
    }

    /**
     * @param Customer $customer
     * @return mixed
     */
    public function create(Customer $customer)
    {
        return view('admin.customers.deposits.create');
    }

    /**
     * @param StoreDeposit $request
     * @param Customer $customer
     * @return mixed
     */
    public function store(StoreDeposit $request, Customer $customer)
    {
        $inputs = $request->all();

        $manualDeposit = ManualDeposit::create([ 'user_id' => auth()->id() ]);
        $manualDeposit->deposit()->create([
            'amount'      => round($inputs['amount'], 4),
            'customer_id' => $customer->id
        ]);

        return redirect()->back()->withSuccess('Cash added to customer deposit!');
    }
}
