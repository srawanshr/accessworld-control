<?php

namespace App\Http\Controllers;

use App\Models\WebComponent;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class WebComponentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $webComponents = WebComponent::all();

        return view('components.web.index', compact('webComponents'));
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
                $webComponent = WebComponent::find($id);

                $webComponent->update([ "price" => $price ]);
            }
        });

        return redirect()->route('component.web.index')->withSuccess("Web component prices updated!");
    }
}
