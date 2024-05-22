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
        .carousel-inner img{
            height:500px;
            width:1100px;
        }
        .movie-card img{
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
       <a href="index.html"><button class="btn btn-primary" id="logout">LogOut</button></a>
         <br>
          <br>
          <br><br>
          <?php 
          session_start();
          $conn=mysqli_connect("localhost","root","","movies");
          $sql="select * from rating order by score desc limit 5";
          $result=$conn->query($sql);
          ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <?php for ($i = 0; $i < $result->num_rows; $i++) { ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php echo ($i == 0) ? 'class="active"' : ''; ?>></li>
            <?php } ?>
        </ul>

  <div class="carousel-inner">
    <?php
    $c=0;
    while( $row = $result->fetch_assoc() ) { 
        $moviename=$row["movie"];
        $sql="select * from films where name='".$moviename."'";
        $res=$conn->query($sql);
        while($r= $res->fetch_assoc()) {
            ?>
            <div class="carousel-item <?php echo ($c == 0) ? 'active' : ''; ?>">
            <img src="<?php echo $r["poster"]; ?>">
            </div>
        <?php
        }
        $c+=1;
    }
    ?>
  </div>

  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </br></br></br>
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
                <div class="card movie-card" style="width: 18rem;">
                <img src="<?php echo $image; ?>">
                <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <button class="btn btn-primary" onclick="func('<?php echo $name; ?>','<?php echo $image; ?>')">REVIEW</button>
                </div>
                </div>
                </div>
                <?php
            }
            ?>
    </div>
    </div>
    <script>
        function func(x,y){
            document.cookie="moviename="+x;
            document.cookie="movieposter="+y;
            window.location.href="addreview.php";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
