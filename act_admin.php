<?php
    include("inc/koneksi.php");
    require_once('functions.php');

    //Mengatur waktu sesuai timezone
    date_default_timezone_set('Asia/Jakarta');

    //Filter input
    $data_get = filter_submittedform($_GET);

    //Memanggil activity yg sesuai menu
    $id_menu = $data_get['id'];
    $id_user = $data_get['user'];

    // SQL untuk menu
    $produks = mysqli_query($conn,"select * from produk2 where id_produk='$id_menu'");
    $rproduks = mysqli_fetch_array($produks);
    $cekproduk = mysqli_num_rows($produks);

    //Membawa data menu
    session_start();
    $_SESSION['id_produk'] = $rproduks['id_produk'];

    // Cek Produk
    if ($cekproduk>0){
        $activity = $rproduks['activity'];
        $nm_produk = $rproduks['nm_produk'];
        
        //Memecah data menjadi array
        $arr_activity = explode(",",$activity);
        
        //Menghitung banyak data pada array
        $activity_length = count($arr_activity);
        $_SESSION['act_length'] = $activity_length;

        //Menghilangkan spasi pada nama menu
        $name_produk = str_replace(' ','',$nm_produk);
        
        //Memasukkan ke indeks
        for ($i=0;$i<$activity_length;$i++){
            $in_activity[$i] = $arr_activity[$i];
            
            // SQL untuk activity
            $acts[$i] = mysqli_query($conn,"select * from activity where id_activity='$in_activity[$i]'");
            $racts[$i] = mysqli_fetch_array($acts[$i]);
            $cekact[$i] = mysqli_num_rows($acts[$i]);

            if($cekact[$i]>0){
                //Memasukkan activity ke variabel array
                $id_activity[$i] = $racts[$i]['id_activity'];
                $nm_activity[$i] = $racts[$i]['nm_activity'];
                
                //Mengambil kata awal di setiap activity
                $kt_acti = $nm_activity[$i];
                $jumlah = "1";
                $hasil = implode(" ", array_slice(explode(" ", $kt_acti), 0, $jumlah));

                //Memberi nama input setiap value
                $nm_acti[$i] = "nm_" . $hasil;
                $wkt_acti[$i] = "waktu_" . $hasil;              
            }
        }

        //Memasukkan value dari input ke variabel array
        for($j=0;$j<$activity_length;$j++){
            $nm_act[$j] = $_POST[$nm_acti[$j]];
            $waktu_act[$j] = $_POST[$wkt_acti[$j]];
            $waktu_input[$j] = date("Y-m-d H:i:s");
            $id_produk[$j] = $data_get['id'];
            $id_user[$j] = $data_get['user'];
            
            // SQL untuk input waktu activity admin
            $act_admin = mysqli_multi_query($conn,"insert into act_admin values(NULL,'$nm_act[$j]','$waktu_act[$j]','','$waktu_input[$j]','$id_produk[$j]','$id_user[$j]')");
            if ($act_admin) {
                header('location:statis_admin');
            } else {
                echo "Error: " . $act_admin . "<br>" . mysqli_error($conn);
            }
        }

    }else{
        echo '<script language="javascript">alert("Data tidak ditemukan!"); history.go(-1);</script>';
    }
?>