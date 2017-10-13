<?php
    include('inc/koneksi.php');

    //Menghitung total nilai dari field waktu_activity
    $tot = mysqli_query($conn, "select sum(if(id_produk= 1, waktu_activity, 0)) as waktu_activity from act_admin");
    $rtot = mysqli_fetch_array($tot);

    echo $rtot['waktu_activity'] . "</br></br>";

    //Perhitungan persen
    $persen = (27/$rtot['waktu_activity'])*100;
    echo $persen . "</br></br>";

    // SQL untuk menjumlahkan banyaknya data yang sesuai id_produk
    $tact_admin = mysqli_query($conn,"select count(*) as nm_activity from act_admin where id_produk='1'");
    $ract_admin = mysqli_fetch_array($tact_admin);

    echo $ract_admin['nm_activity'] . "</br></br>";
    
    // BATAS MASALAH

    //SQL untuk activity muncul
    $acti_adm = mysqli_query($conn,"select * from act_admin");
    $racti_adm = mysqli_fetch_array($acti_adm);
    while($racti_adm<$ract_admin['nm_activity']){
        echo $racti_adm['nm_activity'] . "</br>";
        echo $racti_adm['waktu_activity'] . "</br>";

    }

    $query=mysqli_query($conn,"SELECT * FROM act_admin where id_produk='1' order by id_actadmin asc");
    while($row=mysqli_fetch_array($query)){
        echo "==== </br>";
        echo $row['id_actadmin'] . "</br>";
        echo $row['nm_activity'] . "</br>";
        echo $row['waktu_activity'] . "</br>";
        echo $row['keterangan'] . "</br>";
        echo $row['waktu_input'] . "</br>";
        echo $row['id_produk'] . "</br>";
        echo $row['id_user'] . "</br></br>";
    }

    echo "===================================================================================== </br></br>";
    //SQL untuk memberikan nilai data berupa persen
    $querys=mysqli_query($conn,"SELECT * FROM act_admin where id_produk='1' order by id_actadmin asc");
    while($rows=mysqli_fetch_array($querys)){
        echo "==== </br>";
        echo $rows['id_actadmin'] . "</br>";
        echo $rows['nm_activity'] . "</br>";
        echo $rows['waktu_activity'] . "</br>";
        echo $rows['keterangan'] . "</br>";
        echo $rows['waktu_input'] . "</br>";
        echo $rows['id_produk'] . "</br>";
        echo $rows['id_user'] . "</br>";
        $persen = ($rows['waktu_activity']/$rtot['waktu_activity'])*100;
        echo $persen . "</br></br>";
    }


    echo "===================================================================================== </br></br>";
    //echo 
    var_dump($racti_adm) . "</br></br>";
    echo "muncul data" . "</br></br>";

?>