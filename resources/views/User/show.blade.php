<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  </head>
  <style>

    .more .sign:after{
        content:"+";
        display:inline-block;
    }

    .more.expand .sign:after{
        content:"-";
    }

    tr.more{
        cursor:pointer;
    }

    .add a:hover i{
            display:none;
    }

    .add a:hover b{
        display:block;
        text-align:center;
        color: Tomato;
    }

    .add a:hover{
        font-size: 30px;
    }
    
    .add b{
        display:none;
    }

    .add{
        height:70px;
        width: 150px;
    }

    .details{
        border: 1px solid black;
        width: 40%;
    }
    
    td, th{
        border: 1px solid black;
        text-align:left;
        color: black;
        padding: 8px;
    }

    tr:nth-child(even){
        background-color: pink;
    }

    tr:nth-child(odd){
        background-color: aqua;
    }

    .details{
        display:none;
    }

  </style>

<body>
  <div id="error"></div> 
    <div class="add">
    <a href='create'><i class="fa fa-plus-square mt-5 ml-5 mb-5" aria-hidden="true" style="font-size:70px;"></i><b>Add Records</b></a>
    </div>
        <div class="col-md-12">
        <table class="table" style="margin-top:150px;">
            <tr class="more expand">
                <th style="text-align:center;"><b>Name</b><span class="sign"></span></th>
                <th colspan="2" class="text-center mx-auto"><b>Actions</b></th>
            </tr>

            @foreach($users as $user)
            <tr class="record">
                <td class="show_hide" style="text-align:center">{{$user->Name}}</td>
                <td style="text-align:center;"><a href='edit/{{$user->id}}'><i class="fa fa-user-edit"></i></a></td>
                <!-- <td style="text-align:center;"><a href='edit/{{$user->id}}' class="btn btn-primary">Update</a></td> -->
                <!-- <td><button class="btn btn-danger mx-auto d-block" id="delete" data-Id="{{ $user->id }}">Delete</button></td> -->
                <td style="text-align:center;"><i class="fa fa-trash" id="delete" data-Id="{{ $user->id }}" aria-hidden="true" ></i></button></td>
                </tr>

            <tr>
                <td colspan="3">
                    <div class="details bg-dark text-white ml-5">
                    <div style="display:inline-block;">
                    <h5>Id:</h5> 
                    <h5>Email:</h5>
                    <h5>Password:</h5>
                    <h5>Number:</h5>
                    <h5>Confirm Password:</h5>
                    <h5>Birthday:</h5>
                    <h5>Date:</h5>
                    <h5>Gender:</h5> 
                    <h5>Hobbies:</h5> 
                    <h5>Courses:</h5> 
                    <h5>Time:</h5> 
                    </div>
                
                    <div style="display:inline-block;">
                    <h5>{{$user->id}}</h5>
                    <h5>{{$user->Email}}</h5>
                    <h5>{{$user->Password}}</h5>
                    <h5>{{$user->Number}}</h5>  
                    <h5>{{$user->confirm_Pass}}</h5>
                    <h5>{{$user->Birthday}}</h5>
                    <h5>{{$user->Date}}</h5> 
                    <h5>{{$user->Gender}}</h5> 
                    <h5>{{$user->hobby}}</h5>
                    <h5>{{$user->Courses}}</h5>  
                    <h5>{{$user->Time}}</h5>
                </div>
                
                @endforeach
                </div>
             </td>
        </tr>          
    </table>
</div>

    <script>    
        $(document).ready(function() {
            $('.show_hide').on('click', function() {
                var row = $(this).closest('tr').next('tr');
                // alert(row);
                row.show().find('.details').slideToggle('slow');
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.more').click(function(){
                $('.record').toggleClass('expand').nextUntil('tr.more').slideToggle();
            });
        });
    </script>

    <script>
      $('td #delete').on('click',function(){

        var Id = $(this).data("id");
        var Id = $(this).attr('data-Id');
        // alert(Id);
        $.ajax({
        url:"delete/"+Id,
        type:"get",
        success:function(data){
        if(data == 'deleted'){
        window.location.reload();
        //  $('#row').remove(); 
        }else{
        $('#error').show();
        $('#error').html('Something went wrong').css("color: orange");
        }
        }
    });

    });

    </script>   

</body>
</html>