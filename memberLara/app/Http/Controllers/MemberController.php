<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\ManifestElementException;

class MemberController extends Controller
{

    public function index()
    {
        if(session()->get('id') == null) {
            return view('index');
        } else {
            return redirect('/welcome');
        }
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $password = Hash::make($request['password']);

//        $user->username = $request['username'];
        $user->password = $password;
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->save();
        return redirect('/');
    }

    public function show()
    {
        if(session()->get('id') == '1') {
            $users = User::all();
            $count = User::count();
            return view('members', compact('users', 'count'));
        }
    }

    public function edit($id = null)
    {
        if ($id == null) {
            $user = User::find(session()->get('id'));
            return view('update', compact('user'));
        }
        else if (session()->get('id') == '1')
        {
            $user = User::find($id);
            return view('update', compact('user'));
        }



    }

    public function update(Request $request, $id = null)
    {
        if($id == null)
        {
            $user = User::find(session()->get('id'));
        } else {
            $user = User::find($id);
        }


        if ($request['newPassword'] == $request['confirmPassword']) {

        }

        if (Hash::check($request['currentPassword'], $user['password']) || session()->get('id') == '1')
        {
//            $user['username'] = $request['username'];
            $user['password'] = Hash::make($request['newPassword']);
            $user['name'] = $request['name'];
            $user['phone'] = $request['phone'];
            $user->save();
            return redirect('/welcome');
        }

    }

    public function destroy($id = null)
    {

        if (session()->get('id') == '1')
        {
            $user = User::find($id);
            $user->delete();
            return redirect('show');
        }

        if ($id == null)
        {
            $user = User::find(session()->get('id'));
            session()->flush();
            $user->delete();
            return redirect('/');
        }

        return redirect('/');


    }


    public function login(Request $request)
    {

        if ($request['username'] == '' || $request['password'] == '')
        {
            echo '帳號密碼不可為空值';
            return redirect('/');
        }

        $user = User::where('username', $request['username'])->first();
        if ($user == null)
        {
            echo '使用者不存在';
            return redirect('/');
        }

        if (Hash::check($request['password'], $user['password']))
        {
            session()->put('id', $user['id']);
            return redirect('/welcome');
        } else {
            echo 'wrong password';
            return redirect('/');
        }

    }

    public function welcome() {
        $user = User::find(session()->get('id'));
        return view('welcome', compact('user'));
    }

    public function logout() {

       session()->flush();
       return redirect('/');

    }

}