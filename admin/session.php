<?php
session_start();
if(!isset($_SESSION['uname'])){
    header("location:http://localhost/project_2/login.php");
    exit;
}