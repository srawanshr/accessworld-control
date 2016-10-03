<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * @param Country $country
     * @return mixed
     */
    public function setCountry(Country $country)
    {
        Session::put('country', $country->iso_alpha2);

        return redirect()->back();
    }
}
