<?php
	session_start(); //mulai sesi
	include("inc/koneksi.php"); //koneksi ke database
	session_destroy(); //memutus sesi
	header('location:index');
?>