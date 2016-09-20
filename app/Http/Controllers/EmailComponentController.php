<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\EmailComponent;

use App\Http\Requests;

class EmailComponentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $emailComponents = EmailComponent::all();

        return view('components.email.index', compact('emailComponents'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request)
        {
            $prices = $request->get('price');

            foreach ($prices as $id => $price)
            {
                $emailComponent = EmailComponent::find($id);

                $emailComponent->update([ "price" => $price ]);
            }
        });

        return redirect()->route('component.email.index')->withSuccess("Email component prices updated!");
    }
}
