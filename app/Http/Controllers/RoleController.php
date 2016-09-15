<?php

namespace App\Http\Controllers;

use DB;
use Bican\Roles\Models\Role;
use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use Bican\Roles\Models\Permission;

class RoleController extends Controller {

    /**
     * @return mixed
     */
    public function index()
    {
        $roles = Role::where('slug', '<>', 'super')->get();

        return view('role.index', compact('roles'));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('role.create', compact('permissions'));
    }

    /**
     * @param StoreRole $request
     * @return mixed
     */
    public function store(StoreRole $request)
    {
        DB::transaction(function () use ($request)
        {
            $role = Role::create([
                'name'        => $request->get('name'),
                'description' => $request->get('description'),
                'slug'        => str_slug($request->get('name'))
            ]);
            $permissions = Permission::whereIn('slug', array_keys($request->get('permissions')))->get();
            $role->attachPermission($permissions);
        });

        return redirect()->route('role.index')->withSuccess(trans('messages.create_success', ['entity' => 'Role']));
    }

    /**
     * @param Role $role
     * @return mixed
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('role.edit', compact('role', 'permissions'));
    }

    /**
     * @param UpdateRole $request
     * @param Role $role
     * @return mixed
     */
    public function update(UpdateRole $request, Role $role)
    {
        DB::transaction(function () use ($request, $role)
        {
            $role->update($request->all());
            $role->detachAllPermissions();
            $permissions = Permission::whereIn('slug', array_keys($request->get('permissions')))->get();
            $role->attachPermission($permissions);
        });

        return redirect()->route('role.index')->withSuccess('Role updated!');
    }

    public function destroy(Role $role)
    {
        $notAssigned = $role->users->isEmpty();

        if ($notAssigned)
        {
            $role->delete();

            return redirect()->back()->withSuccess('Role deleted!');
        }

        return back()->withWarning('Cannot delete. Role is assigned!');
    }
}
