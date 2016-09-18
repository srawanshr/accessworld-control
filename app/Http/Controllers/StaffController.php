<?php

namespace App\Http\Controllers;

use DB;
use Form;
use QRcode;
use App\Models\Staff;
use App\Http\Requests\CreateStaff;
use Yajra\Datatables\Facades\Datatables;

class StaffController extends Controller {

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
            $buttons = '<a href="' . route('staff.edit', $staff->id) . '" class="text-primary">Edit</a>';
            $buttons .= '&nbsp;&nbsp;<a role="button" href="javascript:void(0);" data-url="' . route('staff.destroy', $staff->id) . '" class="text-primary item-delete">Delete</a>';

            return $buttons;
        })->addColumn('qr', function ($staff)
        {
            return '<div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="staff_qr_' . $staff->id . '" data-toggle="dropdown">
                    <span class="md md-pageview"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="staff_qr_' . $staff->id . '" style="text-align:center;">
                    <img src="' . route('qrcode.show', $staff->id) . '">
                </ul>
            </div>';
        })->addColumn('avatar', function ($staff)
        {
            return thumbnail(50, $staff);
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $companies = ['AWT' => 'AccessWorld', 'OMNI' => 'Omni'];

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
        $companies = ['AWT' => 'AccessWorld', 'OMNI' => 'Omni'];

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
        if ($staff->delete())
            return response()->json([
                'Result' => 'OK'
            ]);

        return response()->json([
            'Result' => 'Error'
        ], 500);
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
