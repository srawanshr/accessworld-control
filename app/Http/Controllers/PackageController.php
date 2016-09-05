<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

use App\Http\Requests;

class PackageController extends Controller
{
    public function index(Service $service)
    {
        return view('service.package.index', compact('service'));
    }
}
