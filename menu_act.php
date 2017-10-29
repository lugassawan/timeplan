<?php 
include("inc/koneksi.php");
require_once('functions.php');

$data_get = filter_submittedform($_GET);
$menu = $data_get['menu'];

// SQL untuk menu
$menus = mysqli_query($conn,"select * from produk2 where id_produk='$menu'");
$rmenus = mysqli_fetch_array($menus);
$cekmenu = mysqli_num_rows($menus);

// Cek menu
if ($cekmenu>0){
    $activity = $rmenus['activity'];
    $nm_menu = $rmenus['nm_produk'];
    
    //Memecah data menjadi array
    $arr_activity = explode(",",$activity);
    
    //Menghitung banyak data pada array
    $activity_length = count($arr_activity);

    //Menghilangkan spasi pada nama menu
    $name_menu = str_replace(' ','',$nm_menu);
    
    session_start();
    //Memasukkan ke indeks
    for ($i=0;$i<$activity_length;$i++){
        $_SESSION['activity'][$i] = $arr_activity[$i];
    }
    
    //SESSION untuk menu
    $_SESSION['id_menu'] = $rmenus['id_produk'];
    $_SESSION['nm_menu'] = $rmenus['nm_produk'];
    $_SESSION['name_menu'] = $name_menu;
    $_SESSION['activity_length'] = $activity_length;

    if($_SESSION['role'] == "admin"){
        header('location:timeplan_admin');
    }else{
        if($_SESSION['role'] == "tim"){
            header('location:timeplan_tim');
        }else{
            if($_SESSION['role'] == "customers"){
                header('location:customers');
            }else{
                header('location:overview');
            }
        }
    }
}else{
    echo '<script language="javascript">alert("Halaman tidak ditemukan!"); history.go(-1);</script>';
}


?>