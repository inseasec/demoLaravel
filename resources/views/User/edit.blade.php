<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto p-5 mt-5 bg-dark text-light">
            <form action="{{url('user/update')}}" method="post">
            <h3 style= "text-align:center">Edit Details Form</h3>
            @csrf
            <input type="hidden" name="id" value="{{ $editObj->id }}" class="form-control">
            <label for="">Name</label>
            <input type="text" name="Name" value="{{ $editObj->Name }}" class="form-control">
            <label for="">Email</label>
            <input type="text" name="Email" value="{{ $editObj->Email }}" class="form-control">
            <label for="">Number</label>
            <input type="text" name="Number" value="{{ $editObj->Number }}" class="form-control">
            <label for="">Password</label>
            <input type="Password" name="Password" value="{{ $editObj->Password }}" class="form-control">
            <label for="">Confirm Password</label>
            <input type="Password" name="confirm_Pass" value="{{ $editObj->confirm_Pass }}" class="form-control">
            <label for="">Birthday</label>
            <input type="date" name="Birthday" value="{{ $editObj->Birthday }}" class="form-control">
            <label for="">Date</label>
            <input type="date" name="Date" value="{{ $editObj->Date }}" class="form-control">
            <label for="">Gender</label>
            <div class="form-control">
            <label for="male">Male</label>
            <input type="radio" id="male" name="Gender" value="male" value="{{ $editObj->Gender }}"><br>
            <label for="female">Female</label>
            <input type="radio" id="female" name="Gender" value="female" value="{{ $editObj->Gender }}"><br>
            <label for="other">Other</label>
            <input type="radio" id="other" name="Gender" value="other" value="{{ $editObj->Gender }}"><br>
            </div>
            <label for="">Hobbies</label>
            <div class="form-control">
            <label for="">Eating</label>
            <input type="checkbox" id="Eating" name="Hobbies" value="Eating" value="{{ $editObj->Hobbies }}"><br>
            <label for="">Sleeping</label>
            <input type="checkbox" id="Sleeping" name="Hobbies" value="Sleeping" value="{{ $editObj->Hobbies }}"><br>
            <label for="">Travelling</label>
            <input type="checkbox" id="Travelling" name="Hobbies" value="Travelling" value="{{ $editObj->Hobbies }}"><br>
            <label for="">Studying</label>
            <input type="checkbox" id="Studying" name="Hobbies" value="Studying" value="{{ $editObj->Hobbies }}">
            </div>
            <label for="">Courses</label>
            <div class="form-control">
            <select name="Courses" id="Courses">
            <option value="Computer Science" name="Courses" value="{{ $editObj->Hobbies }}">Computer Science</option>
            <option value="Science" name="Courses" value="{{ $editObj->Hobbies }}">Science</option>
            <option value="Electronics" name="Courses" value="{{ $editObj->Hobbies }}">Electronics</option>
            <option value="Mechanical" name="Courses" value="{{ $editObj->Hobbies }}">Mechanical</option>
            </select><br>
            </div><br>
            <label for="">Time</label>
            <input type="time" name="Time"  value="{{ $editObj->Time }}">
            <button type="Submit" name="Submit" class="btn btn-success mx-auto mt-5 d-block">Submit</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>