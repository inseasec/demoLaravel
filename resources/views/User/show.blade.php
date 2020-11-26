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
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
  </head>
<body>
<!-- <div id="error"></div> -->
      <a href='create' class="btn btn-lg btn btn-primary mt-5">Add Record</a>
      <table id="data" class= "table table-dark mt-5">
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
        <!-- <tbody id="table"> -->
        <tbody>

        @foreach($showObj as $print_user)
        
        <tr>
        <td>{{$print_user->id}}</td>
        <td>{{$print_user->Name}}</td>
        <td>{{$print_user->Email}}</td>
        <td>{{$print_user->Password}}</td>
        <td>{{$print_user->Number}}</td>  
        <td>{{$print_user->confirm_Pass}}</td>
        <td>{{$print_user->Birthday}}</td>
        <td>{{$print_user->Date}}</td>  
        <td>{{$print_user->Gender}}</td>  
        <td>{{$print_user->Hobbies}}</td>  
        <td>{{$print_user->Courses}}</td>  
        <td>{{$print_user->Time}}</td>  
      

        <td><a href='edit/{{$print_user->id}}' class="btn btn-primary" >Update</a></td>
        <!-- <td><a href='deletedata/{{$print_user->id}}'>
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button></a></td> -->

        <!-- <td> -->
        <!-- <a href='deletedata/{{$print_user->id}}'></a> -->


        <!-- @php $id = $print_user->id; @endphp
        <button class ="deleteRecord btn btn-danger"  onclick='deleteRecord(<?php echo $print_user->id; ?>)' >Delete</button></td>
        -->

      <td><a href='delete/{{$print_user->id}}' class="btn btn-danger" onclick="return confirm('You really want to delete this record?')">Delete</a></td>

      <!-- <td><button class="btn btn-danger" id="deleterecord" data-Id="{{ $print_user->id }}">Delete</button></td> -->
        </tr>
        @endforeach
        </tbody>
      
      </table>
     

      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

      <script>
        $(function(){
          $("#data").dataTable();
        })
      </script>



<!-- <script>
// $("#error").hide();
$('td #deleterecord').on('click',function(){

  var Id = $(this).data("id");
  // var Id = $(this).attr('data-id'));
  //alert(Id);
  $.ajax({
    url:"/user/deleterecord/"+Id,
    type:"get",
    success:function(data){
     
      $("#table").html(data);
      // if(data == deleted){
      //   window.location.reload();
      // }else{
      //   $('#error').show();
      //   $('#error').html('Something went wrong');
      // }
    }
  })

});

</script> -->
    
</body>
</html>