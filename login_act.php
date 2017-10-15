<?php 
include("inc/koneksi.php");

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($conn,"select * from login where username='$username' and password='$password'");
$r=mysqli_fetch_array($login);
$cek = mysqli_num_rows($login);

//Apabila username dan password benar
if ($cek>0){
    session_start(); //mulai sesi
    
    //Isi dari sesi
    $_SESSION["id_user"]=$r["id_user"];
    $_SESSION["role"]=$r["role"];
    $_SESSION["user"]=$r["username"];
    $_SESSION["pass"]=$r["password"];
    header('location:overview.php');

    // if($r["role"] == "admin"){
    //     session_start(); //mulai sesi
                
    //     //Isi dari sesi
    //     $_SESSION["id_user"]=$r["id_user"];
    //     $_SESSION["role"]=$r["role"];
    //     $_SESSION["user"]=$r["username"];
    //     $_SESSION["pass"]=$r["password"];
    //     header('location:timeplan_admin.php');
                
    // }else{
    //     if($r["role"] == "tim"){
    //         session_start(); //mulai sesi

    //         //Isi dari sesi
    //         $_SESSION["id_user"]=$r["id_user"];
    //         $_SESSION["role"]=$r["role"];
    //         $_SESSION["user"]=$r["username"];
    //         $_SESSION["pass"]=$r["password"];
    //         header('location:timeplan_tim.php');
    //     }
    // }
} else {
    header('location:index.php');
}

?>