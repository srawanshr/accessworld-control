<?php

namespace App\Http\Controllers;

use DB;
use App\Models\VpsComponent;
use Illuminate\Http\Request;

use App\Http\Requests;

class VpsComponentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $vpsComponents = VpsComponent::all();

        return view('components.vps.index', compact('vpsComponents'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            $prices = $request->get('price');

            foreach($prices as $id => $price)
            {
                $vpsComponent = VpsComponent::find($id);

                $vpsComponent->update(["price" => $price]);
            }
        });

        return redirect()->route('component.vps.index')->withSuccess("VPS component prices updated!");
    }
}
