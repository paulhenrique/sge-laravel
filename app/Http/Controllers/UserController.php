<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\userEventoModel;
use App\UserAtividadeModel;
use App\EventoModel;

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

        $eventos = userEventoModel::join('evento','evento.idEvento','=','user_evento.idEvento')
                    ->where('user_evento.idUser','=',auth()->id())
                    ->get();

        //$eventos->password = Hash::bcrypt($eventos->password);
        return view('user.account')->with('user', $user)->with('eventos',$eventos);

    }
    public function edit(request $data) {
        $user = User::findOrFail(Auth()->id());
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('listEvent');

    }

    public function TornarAdmin(Request $request)
    {
        $users = User::findOrFail($request['idUser']);
        $users->tipoUser = 'admin';
        $users->save();
        $users = User::all();
        return view('admin.listusers')->with('users',$users);
    }

    public function pegarTodosUsers()
    {
        $users = User::all();

        return view('admin.listusers')->with('users', $users);
    }

    public function deletarUsuario()
    {
        User::where("idUser", "=", user()->auth()->id)->delete();
        UserAtividadeModel::where("idUser", "=", user()->auth()->id)->delete();
        userEventoModel::where("idUser", "=", user()->auth()->id)->delete();
        return view("welcome");
    }
}
