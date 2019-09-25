<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;
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
        $users = User::findOrFail($id);
        return view('user.account')->with('users', $users);
    }


}
