<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    use Message;

    public function index(){

        try {
            $roles = Role::select('name','id')->with('permissions:name')->paginate(10);

            return $this->sendResponse($roles,'Data exited successfully');

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }// ******* end index

    public function create()
    {
        try {
            $permission = Permission::select('id','name')->get();
            return $this->sendResponse($permission,'Data exited successfully');

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');

        }

    }// ******* end create


    public function store(Request $request)
    {
        DB::beginTransaction();
        try{

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required|string|unique:roles,name',
                'permission' => "required|array",
                'permission.*' => 'required'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch(\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }// ******* end store


    public function edit($id)
    {

        DB::beginTransaction();
        try {

            $role = Role::find($id);

            if($role){
                $permission = Permission::get();
                $rolePermissions = DB::table("role_has_permissions")
                    ->where("role_has_permissions.role_id",$id)->
                    pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();

                return $this->sendResponse(['role'=> $role,'permission'=>$permission,'rolePermissions' => $rolePermissions],'Data exited successfully');

            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }// ******* end edit

    public function update(Request $request, $id)
    {

        try{
            DB::beginTransaction();

            $role = Role::find($id);

            if($role){

                // Validator request
                $v = Validator::make($request->all(), [
                    'name' => "required|string|unique:roles,name,$role->id",
                    'permission' => "required|array",
                    'permission.*' => 'required'
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $role->name = $request->input('name');
                $role->save();
                $role->syncPermissions($request->input('permission'));

                DB::commit();
                return $this->sendResponse([],'Edited successfully');

            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }// ******* end update

    public function destroy($id)
    {

        try {
            $role = Role::find($id);
            if ($role){

                DB::table("roles")->where('id', $role->id)->delete();
                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }

    }// ******* end destroy
}
