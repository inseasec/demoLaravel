<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function create(){
        return view('user/create');
    }

    public function insert(Request $request)
    {
        
        $usrObj = new User();
        $usrObj->saveUser($request);

        return redirect('user/show');  
    }

    

    public function show(){

        $showObj = User::all();
    
       return view('user/show', ['showObj' => $showObj]);
    

}
    public function edit($id){

    $editObj = User::find($id);

    return view('user/edit', ['editObj' => $editObj]);

}

public function update(Request $request){

    #dd($request);
    
    $updateObj = new User();
    // $updateObj = User::where('id',$id)->first()->update();
    $updateObj->saveUser($request);

    return redirect('user/show');  
}

    // public function deletedata($id){
        
    //     $record = User::where('id', $id)->first()->delete(); 

    //     // $record = User::find($id);
    //     // $record->delete();

    //     #return redirect('user/readdata');  


    //     return response()->json([
    //         'success'=> 'Record deleted successfully!'
    //     ]);
    // }

    public function delete($id){
        $delObj = User::find($id);
        // dd($delObj);
        $delObj->delete();
        return redirect('user/show');

        }

        // public function deleteRecord($id){

        //     $delObj = User::find($id);
        //     // dd($delObj);
        //     $response= $delObj->delete();
        //     if($response){
        //         $showObj = User::all();
        //         $table ="";
        //         foreach($showObj as $print_user){
        //             $table .="<tr>";
        //             $table .="<td>$print_user->id</td>";
        //             $table .="<td>$print_user->Name</td>";
        //             $table .="<td>$print_user->Email</td>";
        //             $table .="<td>$print_user->Password</td>";
        //             $table .="<td>$print_user->Number</td>";
        //             $table .="<td>";
        //             $table .="<button class='btn btn-danger' id='deleterecord' data-Id=$print_user->id'>Delete</button>";
        //             $table .="</td>";
        //             $table .="</tr>";
        //         }


        //     return  $table;
        //      }

        //     }
    


    }







