<?php
    include("inc/koneksi.php");
    require_once('functions.php');

    //Mengatur waktu sesuai timezone
    date_default_timezone_set('Asia/Jakarta');

    //Filter input
    $data_get = filter_submittedform($_GET);
    $data_post = filter_submittedform($_POST);

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
    $_SESSION['id_pelanggan'] = $data_post['pelanggan'];

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
                $file_acti[$i] = $hasil . "_file" . $i;
            }
        }

        //Memasukkan value dari input ke variabel array
        $co_input = 0;//untuk menghitung banyak data yang berhasil di input ke database
        for($j=0;$j<$activity_length;$j++){
            //Cek field waktu_activity kosong/tidak, agar tidak dimasukkan ke database
            if(!empty($_POST[$wkt_acti[$j]])){
                $nm_act[$j] = $_POST[$nm_acti[$j]];
                $waktu_act[$j] = $_POST[$wkt_acti[$j]];
                $waktu_input[$j] = date("Y-m-d H:i:s");
                $id_produk[$j] = $data_get['id'];

                //Upload file script
                $path = "uploads/tim/";
                $count = 0;
                // membaca nama file yang diupload
                $fileName = $_FILES[$file_acti[$j]]['name'];    
                
                // membaca ukuran file yang diupload
                $fileSize = $_FILES[$file_acti[$j]]['size'];

                // membaca type file yang diupload
                $fileType = $_FILES[$file_acti[$j]]['type'];
                
                // nama file temporary yang akan disimpan di server
                $tmpName  = $_FILES[$file_acti[$j]]['tmp_name']; 
                
                // menggabungkan nama folder dan nama file
                $uploadfile = $path . $fileName;

                //Validasi file upload
                if($fileType == 'image/png' || $fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/gif'){
                    if(!file_exists($uploadfile)){
                        if($fileSize<5000000){
                            if(move_uploaded_file($tmpName, $uploadfile)){
                                $url_file[$j] = $uploadfile;
                                $count++; // Number of successfully uploaded file
                            }else{
                                if($count == 0){
                                    echo '<script language="javascript">alert("Sorry, your file' . $fileName . 'was not uploaded.");</script>';
                                }
                            }
                        }else{
                            echo '<script language="javascript">alert("File' . $fileName . 'lebih dari 5 Mb!");</script>';
                        }
                    }else{
                        echo '<script language="javascript">alert("File' . $fileName . 'sudah ada!");</script>';
                    }
                }else{
                    echo '<script language="javascript">alert("File' . $fileName . 'tidak sesuai format jpg, jpeg, png, atau gif!");</script>';
                }

                $id_pelanggan[$j] = $data_post['pelanggan'];

                //Membuat urutan dari mencari dari database
                $urutan[$j] = 0;
                $urut = mysqli_query($conn, "select max(urutan) as maks from act_test where nm_activity='$nm_act[$j]' AND id_pelanggan='$id_pelanggan[$j]' AND id_produk='$id_produk[$j]'");
                $rurut = mysqli_fetch_array($urut);
                $curut = mysqli_num_rows($urut);
            
                //Cek data
                if($curut>0){
                    $urutan[$j] = $rurut['maks']+1;
                }else{
                    $urutan[$j] = $urutan[$j]+1;
                }

                $id_user[$j] = $data_get['user'];

                // SQL untuk input waktu activity admin
                $act_tim = mysqli_multi_query($conn,"insert into act_test values(NULL,'$nm_act[$j]','$waktu_act[$j]','','$waktu_input[$j]','$id_produk[$j]','$url_file[$j]','$id_pelanggan[$j]','$urutan[$j]','$id_user[$j]')");
                if ($act_tim) {
                    header('location:statis_tim');
                } else {
                    echo "Error: " . $act_tim . "<br>" . mysqli_error($conn);
                }
            }else{
                continue;// Skip field input yang kosong
            }
        }

    }else{
        echo '<script language="javascript">alert("Data tidak ditemukan!"); history.go(-1);</script>';
    }
?>