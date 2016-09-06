<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaff;
use App\Models\Staff;
use DB;
use Form;
use QRcode;
use Yajra\Datatables\Facades\Datatables;

class StaffController extends Controller
{
    private $oldUrl = "https://www.accessworld.net/backend/cardinfo/index.php?checkid=";

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('staff.index');
    }

    /**
     * @return mixed
     */
    public function staffList()
    {
        return Datatables::eloquent(Staff::with('image'))->addColumn('action', function ($staff)
        {
            $buttons = Form::open([ 'route' => [ 'staff.destroy', $staff->id ], 'method' => 'DELETE' ]);
            $buttons .= '<a href="' . route('staff.edit', $staff->id) . '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
            $buttons .= '<button type="submit" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="return confirm(\'Delete staff ' . $staff->display_name . '?\')"><i class="fa fa-trash-o"></i></button>';
            $buttons .= Form::close();

            return $buttons;
        })->addColumn('qr', function ($staff)
        {
            return '<div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="md md-pageview"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <img src="' . route('qrcode.show', $staff->id) . '">
                </ul>
            </div>';
        })->addColumn('avatar', function ($staff)
            {
                return staff_avatar(50, $staff);
            })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $companies = [ 'AWT' => 'AccessWorld', 'OMNI' => 'Omni' ];

        return view('staff.create', compact('companies'));
    }

    /**
     * @param  CreateStaff $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateStaff $request)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($inputs, $request)
        {
            $staff = Staff::create($inputs);
            $this->uploadRequestImage($request, $staff);
        });

        return redirect()->route('staff.index')->with('success', 'Staff created!');
    }

    /**
     * @param Staff $staff
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Staff $staff)
    {
        $companies = [ 'AWT' => 'AccessWorld', 'OMNI' => 'Omni' ];

        return view('staff.edit', compact('staff', 'companies'));
    }

    /**
     * @param CreateStaff $request
     * @param Staff $staff
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateStaff $request, Staff $staff)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($inputs, $request, $staff)
        {
            $staff->update($inputs);

            $this->uploadRequestImage($request, $staff);
        });

        return redirect()->back()->with('success', 'Staff updated!');
    }

    /**
     * @param Staff $staff
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Staff $staff)
    {
        DB::transaction(function () use ($staff)
        {
            $staff->delete();
        });

        return redirect()->back()->with('success', 'Staff deleted!');
    }

    /**
     * @param $id
     * @return string
     */
    public function qr($id)
    {
        return (string) QRcode::png($this->oldUrl . $id);
    }
}
