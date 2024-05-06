<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chat;
use App\Models\Chat_request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PanelController extends Controller
{
    public function index(){

        $user = User::find(1);

        return view('panel.home');
    }
    public function user_list()
    {
        $roles = DB::table('roles')->get();
        return view('panel.user_list',compact('roles'));
    }

    public function fetch_users()
    {
        $users = User::select('id', 'name', 'email', 'birim_id', 'user_status')->get();

        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<button onclick="deleteUser(' . $user->id . ')" class="btn btn-danger">Sil</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_user(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        User::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }
    public function updateUser(Request $request)
    {
        // Validate the request data as needed

        // Extract data from the request
        $userId = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $birimId = $request->input('birim_id');
        $userStatus = $request->input('user_status');
        $roleId = $request->input('role');

        // Update the user in the database
        DB::table('users')
            ->where('id', $userId)
            ->update([
                'name' => $name,
                'email' => $email,
                'birim_id' => $birimId,
                'user_status' => $userStatus,
                'role_id' => $roleId, // Assuming your role column is 'role_id'
            ]);

        // You may add additional logic or return a response as needed
        return response()->json(['success' => true]);
    }



    //newuser
    public function create(Request $request)
    {
        $request->validate([
            "category_name" => "string|max:255|required",
        ], [
            'category_name.required' => 'Kategori Adı boş bırakılamaz.',
            'category_name.string' => 'Kategori Adı alanında uygun olmayan karakter görüldü.',
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->save();

        return response()->json(['Success' => 'success']);
    }

    public function list()
    {
        $roles = Role::all();
        return view('panel.newuser', compact('roles'));

    }

    function fetch()
    {
        $users = User::select('users.id', 'users.name', 'users.email', 'users.birim_id', 'users.user_status', 'roles.name as role_name')
            ->leftJoin('model_has_roles', function($join) {
                $join->on('users.id', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.model_type', '=', User::class);
            })
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->get();



        return DataTables::of($users)

            ->addColumn('update', function ($data) {
                return "<button onclick='updateCategory(" . $data->id . ")' class='btn btn-warning'>Güncelle</button>";
            })->addColumn('delete', function ($data) {
                return "<button onclick='deleteCategory(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->rawColumns(['update', 'delete'])
            ->make(true);
    }

    function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        User::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }

    function get(Request $request)
    {
        $user = User::find($request->id);
        if($user){
            $role_ids = collect();
            foreach($user->getRoleNames() as $roleName){
                $role_ids->push(DB::table('roles')->where('name',$roleName)->first()->id) ;
            }
            return response()->json(['category_name' => $role_ids]);
        }else{
            return response()->json(['category_name'=>null]);
        }
    }

    function update(Request $request)
    {
        $request->validate([
            'role_id' => 'required|distinct|numeric',
        ]);
        //$categoryId = intval($request->category_name);

        $user = User::find($request->updateId);
        if($user){
            $role_name = Role::find($request->role_id)->name;
            $user->syncRoles($role_name);
        }

        //dd($categoryId);

        return response()->json(['Success' => 'success']);
    }
//chat list
    public function chat_list()
    {
        $chats = DB::table('chats')->get();
        return view('panel.chat_list',compact('chats'));
    }
    public function fetch_chat()
    {
        $chats = Chat::select('chats.id', 'chats.from_user_id', 'chats.to_user_id', 'chats.chat_message', 'chats.message_status', 'users_from.name as from_user_name', 'users_to.name as to_user_name')
            ->leftJoin('users as users_from', 'chats.from_user_id', '=', 'users_from.id')
            ->leftJoin('users as users_to', 'chats.to_user_id', '=', 'users_to.id')
            ->get();

        return DataTables::of($chats)
            ->addColumn('action', function ($chats) {
                return '<button onclick="deleteUser(' . $chats->id . ')" class="btn btn-danger">Sil</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_chat(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        Chat::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }
    public function updateChat(Request $request)
    {
        // Validate the request data as needed

        // Extract data from the request
        $userId = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $birimId = $request->input('birim_id');
        $userStatus = $request->input('user_status');
        $roleId = $request->input('role');

        // Update the user in the database
        DB::table('users')
            ->where('id', $userId)
            ->update([
                'name' => $name,
                'email' => $email,
                'birim_id' => $birimId,
                'user_status' => $userStatus,
                'role_id' => $roleId, // Assuming your role column is 'role_id'
            ]);

        // You may add additional logic or return a response as needed
        return response()->json(['success' => true]);
    }

    //sohbet istekleri
    public function chatrequest_list()
    {
        $chatsrequest = DB::table('chat_requests')->get();
        return view('panel.chatrequest_list',compact('chatsrequest'));
    }
    public function fetch_chatrequest()
    {

        $chatsrequest = Chat_request::select('chat_requests.id', 'chat_requests.from_user_id', 'chat_requests.to_user_id', 'chat_requests.status', 'users_from.name as from_user_name', 'users_to.name as to_user_name')
            ->leftJoin('users as users_from', 'chat_requests.from_user_id', '=', 'users_from.id')
            ->leftJoin('users as users_to', 'chat_requests.to_user_id', '=', 'users_to.id')
            ->get();



        return DataTables::of($chatsrequest)
            ->addColumn('action', function ($chatsrequest) {
                return '<button onclick="deleteUser(' . $chatsrequest->id . ')" class="btn btn-danger">Sil</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete_chatrequest(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        Chat_request::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }
    public function updateChatrequest(Request $request)
    {
        // Validate the request data as needed

        // Extract data from the request
        $userId = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $birimId = $request->input('birim_id');
        $userStatus = $request->input('user_status');
        $roleId = $request->input('role');

        // Update the user in the database
        DB::table('users')
            ->where('id', $userId)
            ->update([
                'name' => $name,
                'email' => $email,
                'birim_id' => $birimId,
                'user_status' => $userStatus,
                'role_id' => $roleId, // Assuming your role column is 'role_id'
            ]);

        // You may add additional logic or return a response as needed
        return response()->json(['success' => true]);
    }

}
