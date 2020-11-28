<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function create() {
        return view('user/create');
    }

    public function insert(Request $request) {

        $usrObj = new User();
        $usrObj->saveUser($request);
        return redirect('user/show');  
    }

    public function show() {
        
        $users = User::all();
        return view('user/show', ['users' => $users]);
    
    }

    public function edit($id) {

        $users = User::find($id);
        return view('user/edit', ['users' => $users]);

    }

    public function update(Request $request){

        $users = new User();
        $users->saveUser($request);
        return redirect('user/show');
    }

    // public function delete($id){
        
    //     $users = User::where('id', $id)->first()->delete(); 

    //     // $users = User::find($id);
    //     // $users->delete();

    //     return redirect('user/show');  
    // }

    // public function delete($id){
    //     $users = User::find($id);
    //     dd($users);
    //     $users->delete();
    //     return redirect('user/show');

    //     }

    public function delete($id){

        $users = User::find($id);
        $users->delete();
        return 'deleted';
    }

    }