<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Sign Up</title>
    <style>
        body {
            background-color: black;
            color: black;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
        }

        .btn-login {
            background-color: #007BFF;
            color: #fff;
            border: none;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }
        #passwords{
            width:400px;
            position:relative;
            left:70px;
            display:none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2>User Sign Up</h2>
                    <form method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email ID" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Create Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Create password" required>
                        </div>  
                        <div class="form-group">
                            <label for="repass">Confirm Password</label>
                            <input type="password" class="form-control" id="repass" name="repass" placeholder="Confirm password" required>
                        </div>
                        <button type="submit" class="btn btn-login btn-block" onclick="check()" name="signup">Sign up</button>
                    </form>
                </div>
                <button class="btn btn-danger" id="passwords">Passwords don't match</button>
            </div>
        </div>
    </div>
    <script>
        function check(){
            var x=document.getElementById("pass").value;
            var y=document.getElementById("repass").value;
            if(x!=y){
                document.getElementById("pass").value="";
                document.getElementById("repass").value="";
                document.getElementById("passwords").style.display="block";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","movies");
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["pass"];
$sql="insert into users(name,email,password) values('$name','$email','$password')";
if($conn->query($sql)){
    header("location:user.php");
}
?>
