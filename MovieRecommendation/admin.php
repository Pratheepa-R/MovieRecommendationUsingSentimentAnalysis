<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Login</title>
    <style>
        body {
            background-color: black;
            color: black;
        }
        #invalid{
            width:400px;
            position:relative;
            left:440px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2>Admin Login</h2>
                    <form method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-login btn-block" name="adminlogin">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST["adminlogin"])){
$name=$_POST['name'];
$password=$_POST['password'];
if($name=="flmzone$234" and $password=="zonemovies098"){
	header("location:adminhome.php");
}
else{
	?>
	<button class="btn btn-danger" id="invalid">Invalid Credentials</button>
	<?php
}
}
?>
