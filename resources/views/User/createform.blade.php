<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
   
</head>
<body>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Customers</button>

<!-- insert customers Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="mycustomers">
      <div class="modal-body">

        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>

        <label for="">Email</label>
        <input type="text" name="email" id="email" class="form-control" required>

        <label for="">Phone Number</label>
        <input type="Number" name="number" id="number" class="form-control" required>

        <label for="">Password</label>
        <input type="Password" name="password" id="password" class="form-control" required >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="submit" class="btn btn-primary">Submit Customer Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- update customers modal-->

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="myUpdcustomer">
      <div class="modal-body">

      <input type="hidden" name="id" id="upd_id" class="form-control" required>
        <label for="">Name</label>
        <input type="text" name="name" id="upd_name" class="form-control" required>

        <label for="">Email</label>
        <input type="text" name="email" id="upd_email" class="form-control" required>

        <label for="">Phone Number</label>
        <input type="Number" name="number" id="upd_number" class="form-control" required>

        <label for="">Password</label>
        <input type="Password" name="password" id="upd_password" class="form-control" required >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="edit" class="btn btn-primary">Update Customer data</button>
      </div>
      </form>
    </div>
  </div>
</div>



<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Number</th>
      <th>Password</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody id="table"> 
  
  </tbody>
</table>

</body>

<!-- Insert data ajax -->

<script src="{{url('assets/js/myjquery.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>