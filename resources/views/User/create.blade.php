<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid bg-dark text-light">
        <div class="row">
            <div class="col-md-6 mx-auto p-5 mt-5">
            <form action="{{url('user/insert')}}" Id="form" method="post">
            <h3 style= "text-align:center">Registration Form</h3>
            @csrf
            <label for="">Name</label>
            <input type="text" name="Name" class="form-control" required>

            <label for="">Email</label>
            <input type="text" name="Email" Id="email" class="form-control" required>

            <label for="">Phone Number</label>
            <input type="Number" name="Number" class="form-control" required>

            <label for="">Password</label>
            <input type="Password" name="Password" class="form-control" required >

            <label for="">Confirm Password</label>
            <input type="Password" name="confirm_Pass" class="form-control" required>

            <label for="">Birthday</label>
            <input type="date" name="Birthday" class="form-control" required >

            <label for="">Date</label>
            <input type="date" name="Date" class="form-control" required ><br>

            <label for="">Gender</label>
            <div class="form-control" required>
            <label for="male" >Male</label>
            <input type="radio" id="male" name="Gender" value="male"><br>
            <label for="female">Female</label>
            <input type="radio" id="female" name="Gender" value="female"><br>
            <label for="other">Other</label>
            <input type="radio" id="other" name="Gender" value="other"><br>
            </div><br>

            <label for="">Hobbies</label>
            <div class="form-control" required>
            <label for="" required>Eating</label>
            <input type="checkbox" id="Eating" value="Eating" name="hobby[]"><br>
            <label for="">Sleeping</label>
            <input type="checkbox" id="Sleeping" value="Sleeping" name="hobby[]"><br>
            <label for="">Travelling</label>
            <input type="checkbox" id="Travelling" value="Travelling" name="hobby[]"><br>
            <label for="">Studying</label>
            <input type="checkbox" id="Studying" value="Studying" name="hobby[]"><br>
            </div><br>

            <label for="">Courses</label>
            <div class="form-control" required>
            <select name="Courses" id="Courses" required>
            <option value="Computer Science" >Computer Science</option>
            <option value="Science">Science</option>
            <option value="Electronics" >Electronics</option>
            <option value="Mechanical" >Mechanical</option>
            </select><br></div>
            
            <label for="">Time</label>
            <input type="Time" name="Time" class="form-control" required> 
        
            <button type="Submit" name="Submit" class="btn btn-success mx-auto mt-5 d-block" value="validate" >Submit</button>
            </form>

            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
            <script>
            
            $("#form").validate({
                rules:{
                    Email:{
                        required:true,
                        email:true
                    },
                    Number:{
                        required:true,
                        minlength:10
                    },
                    Password:{
                        minlength:5
                    },
                    confirm_Pass:{
                        minlength:5,
                        equalTo:"Password"
                    }
                }
            });
            </script> -->

            </div>
        </div>
    </div>
</body>
</html>