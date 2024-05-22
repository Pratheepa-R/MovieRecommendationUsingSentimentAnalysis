<?php
session_start();
if(isset($_POST["submitreview"])){
    $moviename=$_COOKIE["moviename"];
    $name=$_SESSION["NAME"];
    $review=$_POST["review"];
    exec("python nlp.py \"$name\" \"$moviename\" \"$review\" 2>&1",$output,$returncode);
    header("location:userhome.php");
}
?>