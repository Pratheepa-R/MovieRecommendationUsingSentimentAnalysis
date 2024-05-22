<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .movie-card {
            margin: 10px;
        }
        #simple_arc span{
        font-family:'Viga';
        font-size:38px;
        font-weight:regular;
        font-style:normal;
        line-height:2;
        white-space:pre;
        overflow:visible;
        padding:0px;
        }
        #simple_arc span {
        color:#8c35ff;
        }
        #logout{
            position:absolute;
            left:1100px;
            top:20px;
        }
        body{
            background-color: #181818;
        }
        textarea{
            padding:20px;
            border: 2px solid black;
        }
        #submit{
            position:relative;
            left:325px;
            top:10px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
<div class="row" style="background-color: black">
<div class="col-sm-3">
            <div class="left">
                <div id="simple_arc">
                    <span>F</span>
                    <span>I</span>
                    <span>L</span>
                    <span>M</span>
                    <span>Z</span>
                    <span>O</span>
                    <span>N</span>
                    <span>E</span>
             </div> 
            </div></div>
	<div class="col-sm-3">
	</div>
</div>
</div>
    <div class="container">
    <a href="index.html"><button class="btn btn-primary" id="logout">LogOut</button></a>
         <br>
          <br>
          <br><br>
          <?php
          session_start();
          $moviename=$_COOKIE["moviename"];
          $poster=$_COOKIE["movieposter"];
          $conn=new mysqli("localhost","root","","movies");
          $sql="select * from films where name='".$moviename."' and poster='".$poster."'";
          $res=$conn->query($sql);
          while($row=$res->fetch_assoc()){
            ?>
            <div class="card movie-card" style="width: 50rem; position: relative; left:130px;">
                <img src="<?php echo $poster; ?>" style="height:500px;">
                <div class="card-body">
                <h5 class="card-title"><?php echo $moviename; ?></h5>
                <form autocomplete="off" method="post" action="analyse.php">
                <textarea rows="4" cols="95" name="review" required></textarea>
                <button class="btn btn-primary" id="submit" name="submitreview">SUBMIT</button>
                </form>
                </div>
            </div>
            <?php
          }
          ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>