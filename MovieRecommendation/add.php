<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
        body{
            background-color: #181818;
        }
        textarea{
            resize:vertical;
            padding-left:20px;
            padding-top: 20px;
            position:relative;
            top:60px;
            left:40px;
        }
        #moviebox{
            border:2px solid white;
            position: relative;
            left:300px;
            top:50px;
            width:700px;
            min-height: 670px;
        }
        #addpic{
            color:white;
            font-size:20px;
            position:relative;
            left:280px;
            top:40px;
        }
        #addpic:hover{
            cursor: pointer;
            color:blue;
        }
        input[type="submit"] {
        border: none;
        outline: none;
        height: 40px;
        background-color:#8c35ff;
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
        font-weight:bold;
        width:200px;
        position:relative;
        left:240px;
        top:80px;
        }
        input[type="submit"]:hover {
            cursor: pointer;
            color: #000;
        }
        input[type="file"]{
            display: none;
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
<div id="moviebox">
        <form method="post" autocomplete="off" enctype="multipart/form-data">
        <img id="image" style="display:none; width:100%; height:350px;">
        <p id="addpic">ADD A POSTER</p>
        <input type="file" name="moviefile" id="moviefileinput" required>
        <textarea rows="2" cols="80" placeholder="Enter the name" name="title" required></textarea></br></br>
        <textarea rows="2" cols="80" placeholder="Enter the release year" name="year" required></textarea>
        <input type="submit" value="ADD" name="addmovie">
        </form>
</div>
<script>
	document.getElementById("addpic").addEventListener("click",function(){
		document.getElementById("moviefileinput").click();
	});
	document.getElementById("moviefileinput").addEventListener("change",function(){
		var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
        var imageUrl = event.target.result;
        document.getElementById("addpic").style.display = "none";
        var imgElement = document.getElementById("image");
        imgElement.style.display = "block";
        imgElement.src = imageUrl;
    };
    reader.readAsDataURL(file);
	});
</script>
<!-- Include Bootstrap JS and jQuery (for form validation) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST["addmovie"])){
        $filename=$_FILES["moviefile"]["name"];
        $filepath="posters/".$filename;
        $conn = mysqli_connect("localhost","root","","movies");
        $name=$_POST["title"];
        $year=$_POST["year"];
        $sql="select * from films where name='".$name."'";
        $result=$conn->query($sql);
        if($result->num_rows==0){
            if(move_uploaded_file($_FILES['moviefile']['tmp_name'],$filepath)){
                $sql1 = "INSERT INTO films(name,poster,year) VALUES ('$name', '$filepath', '$year')";
                $sql2 = "insert into rating(movie,score) values('$name',0.0)";
                if ($conn->query($sql1) and $conn->query($sql2)) {
                    header("location:adminhome.php");
		        }
            }
        }
        else{
            header("location:adminhome.php");
        }
    }
?>
