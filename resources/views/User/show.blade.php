<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  </head>
  <style>

    table{
        width: 100%;
        border: 1px solid black;
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

    .details,
    .details div{
        display:none;
    }

  </style>
  <script>
    $(document).ready(function(){
        $('.show_hide').on('click', function(){
            var row = $(this).closest('tr').next('.details');
            row.show().find('div').slideToggle('slow');
            });
        });

  </script>
<body>
  <div id="error"></div> 
    <a href='create' class="btn btn-lg btn btn-primary mt-5 ml-5 mb-5">Add Record</a>
    <table class= "table">
        <tr>
            <th>Name</th>
            <th colspan="11" class="text-center mx-auto">Actions</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{$user->Name}}</td>
            <td><button class="show_hide btn btn-primary mx-auto d-block">Show/Hide Records</button></td>
            <td style="text-align:center;"><a href='edit/{{$user->id}}' class="btn btn-primary">Update</a></td>
            <td><button class="btn btn-danger mx-auto d-block" id="delete" data-Id="{{ $user->id }}">Delete</button></td>
        </tr>

        <tr class="details">
        <td colspan="11">
            <div>
            <table class="table">
            <thead>
            <th>Id</th>
            <th>Email</th>
            <th>Password</th>
            <th>Number</th>
            <th>Confirm Password</th>
            <th>Birthday</th>
            <th>Date</th>
            <th>Gender</th> 
            <th>Hobbies</th> 
            <th>Courses</th> 
            <th>Time</th> 
            </thead>
        
        <tr id="row">
            <td>{{$user->id}}</td>
            <td>{{$user->Email}}</td>
            <td>{{$user->Password}}</td>
            <td>{{$user->Number}}</td>  
            <td>{{$user->confirm_Pass}}</td>
            <td>{{$user->Birthday}}</td>
            <td>{{$user->Date}}</td> 
            <td>{{$user->Gender}}</td> 
            <td>{{$user->hobby}}</td>
            <td>{{$user->Courses}}</td>  
            <td>{{$user->Time}}</td>
        </tr>

    </table>
    </div>
    <td>
    </tr>

    @endforeach
    </table>

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