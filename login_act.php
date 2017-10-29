<?php 
    include("inc/koneksi.php");
    require_once('functions.php');

    //Filter input
    $data_post = filter_submittedform($_POST);
    
    $username = $data_post['username'];
    $password = $data_post['password'];

    $hash = hash_password($password);

    //SQL untuk admin dan tim
    $login = mysqli_query($conn,"select * from login where username='$username' and password='$hash'");
    $r=mysqli_fetch_array($login);
    $cek = mysqli_num_rows($login);

    //SQL untuk pelanggan
    $log = mysqli_query($conn, "select * from pelanggan where username='$username' and password='$hash'");
    $rw = mysqli_fetch_array($log);
    $ck = mysqli_num_rows($log);

    //Apabila username dan password benar
    if ($cek>0){
        session_start(); //mulai sesi
        
        //Isi dari sesi
        $_SESSION["id_user"]=$r["id_user"];
        $_SESSION["role"]=$r["role"];
        $_SESSION["user"]=$r["username"];
        $_SESSION["pass"]=$r["password"];
        header('location:overview');
    } else {
        if($ck>0){
            session_start();
            $_SESSION["id_user"] = $rw["id_user"];
            $_SESSION["role"] = $rw["role"];
            $_SESSION["user"] = $rw["username"];
            $_SESSION["pass"] = $rw["password"];
            header('location:overview');
        }else{
            header('location:index');
        }
    }
?>