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
  </head>
<body>
 <!-- <div id="error"></div> -->
      <a href='create' class="btn btn-lg btn btn-primary mt-5">Add Record</a>
      <table class= "table table-dark mt-5">
        <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
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
          <th>Action</th>
          </tr>
        </thead>

        <tbody>

        @foreach($users as $user)
        
        <tr id="row">
        <td>{{$user->id}}</td>
        <td>{{$user->Name}}</td>
        <td>{{$user->Email}}</td>
        <td>{{$user->Password}}</td>
        <td>{{$user->Number}}</td>  
        <td>{{$user->confirm_Pass}}</td>
        <td>{{$user->Birthday}}</td>
        <td>{{$user->Date}}</td> 
        <td>{{$user->Gender}}</td> 
        <td> 
        {{$user->hobby}}
        </td>
          
        <td>{{$user->Courses}}</td>  
        <td>{{$user->Time}}</td>  
      

        <td><a href='edit/{{$user->id}}' class="btn btn-primary" >Update</a></td>

      <!-- <td><a href='delete/{{$user->id}}' class="btn btn-danger" onclick="return confirm('You really want to delete this record?')">Delete</a></td> -->

      <td><button class="btn btn-danger" id="delete" data-Id="{{ $user->id }}">Delete</button></td>
>
        </tr>
        @endforeach
        </tbody>
      
      </table>

      <script>
      // $("#error").hide();
      $('td #delete').on('click',function(){

        var Id = $(this).data("id");
        
        var Id = $(this).attr('data-Id');
        // alert(Id);
        $.ajax({
          url:"delete/"+Id,
          type:"get",
          success:function(data){
            if(data == 'deleted'){
              // window.location.reload();
              $('#row').remove(); 
            }else{
              $('#error').show();
              $('#error').html('Something went wrong');
            }
          }
        });

      });

</script>   

</body>
</html>