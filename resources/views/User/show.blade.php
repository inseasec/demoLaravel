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
    .data{
      display: none;
    }
  </style>
  <script>
  // $(document).ready(function(){
  //   $(".show_hide").click(function(){
  //     var tableData = $('.show_hide').closest('tr').children("td").map(function(){
  //       return $(this).text();
  //     }).get();
  //     $('.data').slideToggle("slow").css("color", "orange");
  //     // alert(tableData[0] + " , " + tableData[1]);
  //   });
  // });

      $(document).ready(function(){
        $(".show_hide").click(function(){
          $(this).closest("tr").find('.data').slideToggle().css("color", "orange");
        });
      });

  </script>
<body>

//  <div id="error"></div> 
      <a href='create' class="btn btn-lg btn btn-primary mt-5 ml-5 ">Add Record</a>
      <table class= "table table-dark mt-5">
        <thead>
        <tr>
          <th class="data">Id</th>
          <th>Name</th>
          <th class="data">Email</th>
          <th class="data">Password</th>
          <th class="data">Number</th>
          <th class="data">Confirm Password</th>
          <th class="data">Birthday</th>
          <th class="data">Date</th>
          <th class="data">Gender</th> 
          <th class="data">Hobbies</th> 
          <th class="data">Courses</th> 
          <th class="data">Time</th> 
          <th class="data text-center">Action</th>
          </tr>
        </thead>

        <tbody>

        @foreach($users as $user)
        
        <tr id="row">
        <td class="data">{{$user->id}}</td>
        <td>{{$user->Name}}</td>
        <td class="data">{{$user->Email}}</td>
        <td class="data">{{$user->Password}}</td>
        <td class="data">{{$user->Number}}</td>  
        <td class="data">{{$user->confirm_Pass}}</td>
        <td class="data">{{$user->Birthday}}</td>
        <td class="data">{{$user->Date}}</td> 
        <td class="data">{{$user->Gender}}</td> 
        <td class="data">{{$user->hobby}}</td>
          
        <td class="data">{{$user->Courses}}</td>  
        <td class="data">{{$user->Time}}</td>
        
        <td><button class="show_hide btn btn-primary">Show/Hide Records</button><td>
        <td><a href='edit/{{$user->id}}' class="btn btn-primary" >Update</a></td>

      <!-- <td><a href='delete/{{$user->id}}' class="btn btn-danger" onclick="return confirm('You really want to delete this record?')">Delete</a></td> -->

      <td><button class="btn btn-danger" id="delete" data-Id="{{ $user->id }}">Delete</button></td>
      

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