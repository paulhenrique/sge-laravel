<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth()->id();
        $user = User::findOrFail($id);

        // if(can('isAdmin')){
        //     $userAll = User::all();
        //     ->with('userAll', $userAll)
        // }
        return view('user.account')->with('user', $user);
    }
    public function edit(request $data) {
        $user = User::findOrFail(Auth()->id());
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('listEvent');

    }

    public function TornarAdmin(Request $data)
    {
        $user = User::findOrFail($data["id"]);
        $user->tipoUser = 'admin';
        $user->save();

        return redirect()->view('');
    }

    public function pegarTodosUsers()
    {
        $user = User::all();
        
        return redirect()->view('user.account')->with('user', $user);
    }
}
