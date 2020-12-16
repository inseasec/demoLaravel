<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create()
    {
        return view('user/create');
    }

    public function insert(Request $request)
    {
        // dd('jas');
        $usrObj = new User();
        $usrObj->saveUser($request);
        return redirect('user/show');
    }

    public function show()
    {

        $users = User::all();
        return view('user/show', ['users' => $users]);
    }

    public function edit($id)
    {

        $users = User::find($id);
        return view('user/edit', ['users' => $users]);
    }

    public function update(Request $request)
    {

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

    public function delete($id)
    {

        $users = User::find($id);
        $users->delete();
        return 'deleted';
    }
    function products()
    {

        $departments = $this->getDepartments();
        // $categories = $this->getcat();
        // $products = $this->getproduct();

        return view('User/products')->with('departments', $departments);
    }


    function getDepartments()
    {
        $departments = DB::select('select * from departments');
        return $departments;
    }

    function getcat(Request $request)
    {
        $cat = DB::select('SELECT * FROM categories WHERE department_id = "' . $request->depart . '"');
        // print_r($request->depart);
        return $cat;
    }

    function getproduct(Request $request)
    {
        $product = DB::select('SELECT * FROM products WHERE category_id = "' . $request->id . '"');
        return $product;
    }

    //ajax crud functions

    // Insert data function

    function createForm(){
        return view('user/createform');
    }

    public function insertData(Request $request)
    {
       
        $customer = new Customer();
        // echo $customer ;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->number = $request->number;
        $customer->password = $request->password;

        $response = $customer->save();
        if($response) {
            $customer=Customer::findOrFail($customer->id);
            $row ='';
                $row .='<tr>'; 
                $row .='<td>'.$customer->id.'</td>';
                $row .='<td>'.$customer->name.'</td>';
                $row .='<td>'.$customer->email.'</td>';
                $row .='<td>'.$customer->password.'</td>';
                $row .='<td>'.$customer->number.'</td>';
                $row .='<td><button class="btn btn-primary row_edit" data-id="'.$customer->id.'">Edit</button></td>';
                $row .='<td><button class="btn btn-danger row_delete" data-id="'.$customer->id.'">Delete</button></td>';                     
                $row .='</tr>';

            }
            //return $row;
            return response()->json(
                [
                    'success' => true,
                    'row'=>$row,
                    'message' => 'Data inserted successfully'
                ]
            );
        }
        
        

        // Show data function

    function showData(){

        $rows='';

        $customers = Customer::all();
        foreach($customers as $customer){
            $rows .='<tr>'; 
            $rows .='<td>'.$customer->id.'</td>';
            $rows .='<td>'.$customer->name.'</td>';
            $rows .='<td>'.$customer->email.'</td>';
            $rows .='<td>'.$customer->number.'</td>';
            $rows .='<td>'.$customer->password.'</td>';
            $rows .='<td><button class="btn btn-primary row_edit" data-id="'.$customer->id.'">Edit</button></td>';
            $rows .='<td><button class="btn btn-danger row_delete" data-id="'.$customer->id.'">Delete</button></td>';
            $rows .='</tr>';
        }
        return $rows;
    }



    // Edit data function

    function editData(Request $request){
        // return ($request->id);
        $customers=Customer::findOrFail($request->id);
           return $customers;   
    }

    // update data function

    function updateData(Request $request){
       //return $request->id;
        $customer= Customer::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'number'  => $request->number,
            'password' => $request->password
            
    ]);
     //return $customer;
    if($customer){
        $row ='';
        $customers=Customer::all();
        foreach($customers as $customer)
        {
            $row .='<tr>'; 
            $row .='<td>'.$customer->id.'</td>';
            $row .='<td>'.$customer->name.'</td>';
            $row .='<td>'.$customer->email.'</td>';
            $row .='<td>'.$customer->number.'</td>';
            $row .='<td>'.$customer->password.'</td>';
            $row .='<td><button class="btn btn-primary row_edit" data-id="'.$customer->id.'">Edit</button></td>';                                                
            $row .='<td><button class="btn btn-danger row_delete" data-id="'.$customer->id.'">Delete</button></td>';                                                
            $row .='</tr>';

        }
        // return $row;
        return response()->json(
            [
                'success' => true,
                'row'=>$row,
                'message' => 'Data updated successfully'
            ]);
    }
}



// delete data function

function deleteData(Request $request){
    $customers=Customer::find($request->id);
    $response = $customers->delete(); 
    if($response){
                
        // echo "dffdgg";
        $rows ='';
        $customers=Customer::all();
        foreach($customers as $customer)
        {
            $rows .='<tr>'; 
            $rows .='<td>'.$customer->id.'</td>';
            $rows .='<td>'.$customer->name.'</td>';
            $rows .='<td>'.$customer->email.'</td>';
            $rows .='<td>'.$customer->password.'</td>';
            $rows .='<td>'.$customer->number.'</td>';
            $rows .='<td><button class="btn btn-primary row_edit" data-id="'.$customer->id.'">Edit</button></td>';
            $rows .='<td><td><button class="btn btn-danger row_delete" data-id="'.$customer->id.'">Delete</button></td>';                             
            $rows .='</tr>';

        }
        return $rows;
            }
}
}
    
    

