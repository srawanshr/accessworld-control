<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Notifications\ActivationCode;
use Form;
use Datatables;
use App\Models\User;
use App\Models\Image;
use App\Http\Requests;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Bican\Roles\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\StoreUser;

class UserController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * @return mixed
     */
    public function userList()
    {
        $users = User::select(['username', 'email', 'first_name', 'last_name', 'phone', 'address', 'created_at']);

        return Datatables::eloquent($users)
            ->addColumn('avatar', function ($user)
            {
                return user_avatar(50, $user->username);
            })
            ->addColumn('action', function ($user)
            {
                $buttons = '<a href="' . route('user.edit', $user->username) . '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="md md-edit"></i></a>';
                $buttons .= '<button type="button" class="btn btn-icon-toggle btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="md md-delete"></i></button>';

                return $buttons;
            })
            ->addColumn('role', function ($user)
            {
                return display($user->roles->pluck('name')->implode(', '), 'None');
            })
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('slug', '<>', 'super')->pluck('name', 'id');

        return view('user.create', compact('roles'));
    }

    /**
     * @param StoreUser $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUser $request)
    {
        DB::transaction(function () use ($request)
        {
            $user = User::create($request->userFillData());

            $user->attachRole($request->get('role'));

            $this->uploadRequestImage($request, $user);

            $user->notify(new ActivationCode());
        });

        return redirect()->route('user.index')->withSuccess(trans('messages.create_success', ['entity' => 'User']));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::where('slug', '<>', 'super')->pluck('name', 'id');

        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * @param UpdateUser $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUser $request, User $user)
    {
        DB::transaction(function () use ($request, $user)
        {
            $user->update($request->userFillData());

            if ($request->has('role'))
            {
                $user->detachAllRoles();

                $user->attachRole($request->get('role'));
            }

            $this->uploadRequestImage($request, $user);
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'User']));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        DB::transaction(function () use ($user)
        {
            $user->delete();
        });

        return redirect()->back()->with('success', 'User deleted!');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request, User $user)
    {
        $password = bcrypt($request->get('password'));

        $user->update(['password' => $password]);

        return redirect()->back()->with('success', 'Password changed!');
    }
}
