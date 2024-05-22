<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Login</title>
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
        p:hover{
            color:blue;
            cursor: pointer;
        }
        #invalid{
            width:400px;
            position:relative;
            left:440px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2>User Login</h2>
                    <form method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-login btn-block" name="login">Login</button>
                        <p style="position:relative; top:20px;" onclick="func()">Don't have an account?</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function func(){
            window.location.href="usersignup.php";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
session_start();
if(isset($_POST["login"])){   
$conn=mysqli_connect("localhost","root","","movies");
$name=$_POST["name"];
$password=$_POST["password"];
$sql="select * from users where name='".$name."' and password='".$password."'";
$result=$conn->query($sql);
if($result->num_rows==0){
    ?>
	<button class="btn btn-danger" id="invalid">Invalid Credentials</button>
	<?php
}else{
    $_SESSION["NAME"]=$name;
    header("location:userhome.php");
}
}
?>
