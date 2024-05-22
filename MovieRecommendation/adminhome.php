<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        #addmovies{
            position:absolute;
            left:570px;
            top:100px;
        }
        body{
            background-color: #181818;
        }
        img{
            height:400px;
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
        <form action="add.php" method="POST">
            <button class="btn btn-warning" type="submit" id="addmovies">ADD MOVIES</button>
       </form>
       <br>
       <a href="index.html"><button class="btn btn-primary" id="logout">LogOut</button></a>
         <br>
          <br>
          <br><br>
        <div class="row">
           <?php
            $conn=new mysqli("localhost","root","","movies");
            $sql="select * from films";
            $res=$conn->query($sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $name=$row['name'];
                $image=$row['poster'];
                $year=$row["year"];
                ?>
                <div class="col-md-4">
                <div class="card movie-card" style="width:18rem;">
                <img src="<?php echo $image; ?>">
                <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                </div>
                </div>
                </div>
                <?php
            }
            ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
