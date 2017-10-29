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

    echo "======TEST mencari nilai max====";
    $ruruts = 0;
    $urut = mysqli_query($conn, "select max(urutan) as maks_id from act_test where nm_activity='Survey' AND id_pelanggan='1'");
    $rurut = mysqli_fetch_array($urut);
    $curut = mysqli_num_rows($urut);
    if($curut>0){
        $hasil = $rurut['maks_id']+1;
        echo $hasil . "</br></br>";
    }else{
        $hasil = $ruruts+1;
        echo $hasil . "</br></br>";
    }

    echo "=====TEST Upload multi file  </br>";
    for($j=0;$j<5;$j++){
        //Cek field yang kosong agar tidak dimasukkan ke database
        echo "j ke-" . $j . "</br>";
        if(!empty($_FILES['file'.$j]['name'])){
            //Upload script beda lagi
            $path = "uploads/";
            $count = 0;
            // membaca nama file yang diupload
            $fileName = $_FILES['file'.$j]['name'];    
            
            // membaca ukuran file yang diupload
            $fileSize = $_FILES['file'.$j]['size'];
            
            // nama file temporary yang akan disimpan di server
            $tmpName  = $_FILES['file'.$j]['tmp_name']; 
            
            // menggabungkan nama folder dan nama file
            $uploadfile = $path . $fileName;

            if(!file_exists($uploadfile)){
                if($fileSize<5000000){
                    if(move_uploaded_file($tmpName, $uploadfile)){
                        $url_file[$j] = $uploadfile;
                        $count++; // Number of successfully uploaded file
                    }else{
                        if($count == 0){
                            echo "Sorry, your file was not uploaded.";
                        }
                    }
                }else{
                    echo "File terlalu besar dari 5mb";
                }
            }else{
                echo "File sudah ada";
            }

                // SQL untuk input waktu activity admin
                        $act_tim = mysqli_multi_query($conn,"insert into test values(NULL,'$url_file[$j]')");
                        if ($act_tim) {
                            
                        } else {
                            echo "Error: " . $act_tim . "<br>" . mysqli_error($conn);
                        }
            echo 'berhasil upload '.$count.' files array ke-' . $j . "</br>";
            var_dump($_FILES);
        }else{
            continue;// Skip field input yang kosong
        }
    }
    echo "</br>=====TEST jumlah hari dengan 2 kondisi  </br>";
    //Menghitung total nilai dari field waktu_activity
    //Untuk Activity sesuai Produk
    $activitys = mysqli_query($conn,"select * from act_test where nm_activity='Survey' AND id_pelanggan='1'");
    //Untuk Jumlah Hari sesuai Activity
    $tot = mysqli_query($conn, "select sum(if(id_produk= 1 AND nm_activity = 'Survey', waktu_activity, 0)) as waktu_activity from act_test");
    //$rtot = mysqli_fetch_array($tot);
    while($rtot = mysqli_fetch_array($tot) AND $racts = mysqli_fetch_array($activitys)){
        echo $racts['nm_activity'] . ": " . $rtot['waktu_activity'] . "</br>";
    }
    echo "</br>=====TEST menampilkan activity yang sudah ada datanya  </br>";
    //Untuk mengambil activity
    $activ = mysqli_query($conn,"select nm_activity from act_test where id_produk='1' AND id_pelanggan='1' group by nm_activity ORDER BY nm_activity DESC");
    $n=0;
    while($rac = mysqli_fetch_array($activ)){
        $nm_[$n] = $rac['nm_activity'] . $n;
        echo $rac['nm_activity'] . "</br>";
        $n++;
    }
    echo "</br>=====TEST menampilkan activity dan jumlah hari tiap activity dengan script baru  </br>";
     //Untuk mengambil activity
     $activ = mysqli_query($conn,"select nm_activity from act_test where id_produk='1' AND id_pelanggan='1' group by nm_activity ORDER BY nm_activity DESC");
     //Untuk Jumlah Hari sesuai Activity
    $tote = mysqli_query($conn, "select sum(if(id_produk= 1 AND nm_activity = 'Perizinan', waktu_activity, 0)) as waktu_activity from act_test");
    while($rtote = mysqli_fetch_array($tote) AND $ractiv = mysqli_fetch_array($activ)){
        echo $ractiv['nm_activity'] . ": " . $rtote['waktu_activity'] . "</br>";
    }

    //Create admin and tim  password secure
    function hash_password($pass){
        $salt = 'somethingrandom';
        $hash = hash('sha512', $salt . $pass);
        return $hash;
    }
    $pass = 'tim12345';
    $hash = hash_password($pass);
    echo $hash . "</br>";

     //Fungsi filter input
     function strfilter($input){
        $input=trim($input);
        $input=strip_tags($input);
        $input=nl2br($input);
        $input=addslashes($input);
        $input=stripslashes($input);
        $input=str_ireplace("'", "%", $input);
        $input=str_ireplace( "''", '%', $input );
        $input=str_ireplace( '""', '%', $input );
        $query = preg_replace( '|(?<!%)%s|', "'%s'", $input );
        $input=htmlentities($input, ENT_QUOTES);
        $input=ltrim($input);
        $input=rtrim($input);
        return $input;
    }

    //Fungsi filter $_POST atau $_GET ( filter banyak input sekaligus)
    function filter_submittedform($submitted_forms){
        $array = array();
        foreach(array_keys($submitted_forms) as $forms){
            $array[$forms] = strfilter($submitted_forms[$forms]);
        }
        return $array;
    }
    
    $email = 'coba@co.com';
    $emai = strfilter($email);
    echo $emai;

    echo "</br></br>==================================================</br></br>";
?>

<form method="POST" action="" enctype="multipart/form-data">
<input type="text" name="name">
<input type="file" name="files">
<button type="submit">Submit</buttton>
</br>
</form>
<?php
    $data_post = filter_submittedform($_POST);
    //$na = $_POST['name'];
    //echo $na . "</br>===</br>";
    $an = $data_post['name'];
    echo $an . "</br>";
    if(!empty($_FILES['files']['name'])){
        echo "ADA FILE</br>";
        $type = $_FILES['files']['type'];
        var_dump($_FILES);
        // type pdf ==> application/pdf
        if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/gif'){
            echo "</br>HASIL SUBMIT</br>";
            $files = $_FILES['files']['name'];
            echo $files . "</br>====</br>";
            $fil = strfilter($files);
            echo $fil . "</br>";
            echo $type;
        }
    }
?>

