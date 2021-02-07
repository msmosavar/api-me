<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleCreateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;

class RolePermissionsController extends Controller
{
    private $RoleRepo;
    private $permissionRepo;

    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->RoleRepo = $roleRepository;
        $this->permissionRepo = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('manage-role');
        $roles = $this->RoleRepo->all();
        $permissions = $this->permissionRepo->all();
        return response()->json([
            'roles' => $roles,
            'permissions' => $permissions
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $this->authorize('manage-role');
        $this->roleRepo->create($request);
        return response()->json('Create New Role', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($roleId)
    {
        $this->authorize('manage-role');
        $role = $this->roleRepo->findById($roleId);
        $permissions = $this->permissionRepo->all();
        return response()->json([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('manage-role');
        $this->roleRepo->update($id, $request);
        return response()->json('Update Role', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($roleId)
    {
        $this->authorize('delete', Role::class);
        $this->roleRepo->delete($roleId);
        return response()->json('Delete Role', 204);
    }
}
