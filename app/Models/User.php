<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'Name', 'Email', 'Number','Password','confirm_Pass','Birthday','Date','Gender','Hobbies','Courses','Time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


        public function saveUser($request){

        #$this->id = $request['id'];
        $dataArr['Name'] = $request['Name'];
        $dataArr['Email'] = $request['Email'];
        $dataArr['Number'] = $request['Number'];
        $dataArr['Password'] = md5($request['Password']);
        $dataArr['confirm_Pass'] = md5($request['confirm_Pass']);
        $dataArr['Birthday'] = $request['Birthday'];
        $dataArr['Date'] = $request['Date'];
        $dataArr['Gender'] = $request['Gender'];
        $dataArr['Hobbies'] = $request['Hobbies'];
        $dataArr['Courses'] = $request['Courses'];
        $dataArr['Time'] = $request['Time'];
        if(!empty($request['id'])){
            $updateObj = User::where('id',$request['id'])->update($dataArr);
        }else{
            $this->create($dataArr);
        }
        
    
        
        }
    }
