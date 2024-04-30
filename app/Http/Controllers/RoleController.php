<?php

namespace App\Http\Controllers;


use App\Http\Helpers\Permission\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Helpers\Permission\Permission as HelperPermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use function React\Promise\all;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('panel.role_index');
    }

    public function fetch(){
        $roles = Role::all();
        return DataTables::of($roles)->editColumn('content', function ($data){
        })->addColumn('update', function ($data){
            return '<a href="'.route('panel.super_admin_role.edit', $data->id).'" class="btn btn-warning">Güncelle</a>';
        })->addColumn('delete', function ($data){
            return '<a data-toggle="tooltip" onclick="remove('.$data->id.',\''.$data->name.'\')" data-target="#detail_modal" class="btn btn-danger">Sil</a>';
        })->rawColumns(['delete','update','content'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = new HelperPermission;

        return view('panel.role_create', compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {



        $request->validate([
            'id' => 'distinct',
            'name' => 'required|string|max:255',
            'permissions.*' => 'exists:permissions,name',
            'permissions' => 'required',
        ]);



        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('panel.super_admin_role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = new HelperPermission();

        return view('panel.role_update', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::find($id);
        $role->name=$request->name;
        $role->save();
        $role->syncPermissions($request->permissions);




        return redirect()->route('panel.super_admin_role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $result = $message = '';
        $role = Role::find($id);

        if ($role) {
            if ($role->delete()) {
                $result = 'ok';
                $message = 'Silme İşlemi Başarılı';
            } else {
                $result = 'hata';
                $message = 'Silme İşlemi Başarısız Oldu';
            }
        } else {
            $result = 'hata';
            $message = 'Silme İşlemi Başarısız, Böyle Bir Kayıt Yok';
        }

        return response()->json([
            'result' => $result,
            'message' => $message
        ]);
    }
}
