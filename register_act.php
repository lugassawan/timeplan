<?php
    /* Catatan
    - Secure form
    - Filter input yang masuk( field kosong, dll)
    - Buat sistem cek apakah sudah sesuai dengan format yang diminta
    */
?>
<?php
    include("inc/koneksi.php");
    require_once('functions.php');
    
    //Mengatur waktu sesuai timezone
    date_default_timezone_set('Asia/Jakarta');
    
    //Cek sudah submit form field
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //Filter input
        $data_post = filter_submittedform($_POST);
        
        //Memasukkan nilai ke variabel
        $nama = $data_post['name'];
        $nm_perusahaan = $data_post['nm_usaha'];
        $username = $data_post['username'];
        $email = $data_post['email'];
        $password = $data_post['password'];
        $con_pass = $data_post['con_pass'];
        $no_telp = $data_post['telp'];
        $alamat = $data_post['alamat'];
        $role = $data_post['role'];
        $waktu_input = date("Y-m-d H:i:s");

        //Validasi field kosong
        if(empty($nama) || empty($nm_perusahaan) || empty($username) || empty($email) || empty($password) || empty($con_pass) || empty($no_telp) || empty($alamat)){
            $_SESSION['Error'] = 'Field harus di isi';
            header('location:register');
        }else{
            //Validasi nama
            if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                $_SESSION['nameErr'] = "Hanya huruf dan spasi yang di izinkan";
                header('location:register');
            }else{
                //Validasi perusahaan
                if (!preg_match("/^[a-zA-Z ]*$/",$nm_perusahaan)) {
                    $_SESSION['usahaErr'] = "Hanya Huruf dan spasi yang di izinkan";
                    header('location:register');
                }else{
                    //Validasi email
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION['emailErr'] = "Format email salah";
                        header('location:register');
                    }else{
                        //Cek Password dengan Confirm Password
                        if($password!=$con_pass){
                            $_SESSION['passErr'] = "Password tidak sama";
                            header('location:register');
                        }else{
                            //Enkripsi password
                            $hash = hash_password($password);

                            //Validasi telp
                            if (!preg_match("/^[0-9]*$/",$no_telp)) {
                                $_SESSION['telpErr'] = "Format telepon salah";
                                header('location:register');
                            }else{
                                //Upload userfile script
                                $path = "uploads/userfile_register/";
                                $count = 0;
                                // membaca nama file yang diupload
                                $fileName = $_FILES['userfile']['name'];    
                                
                                // membaca ukuran file yang diupload
                                $fileSize = $_FILES['userfile']['size'];

                                // membaca type file yang diupload
                                $fileType = $_FILES['userfile']['type'];
                                
                                // nama file temporary yang akan disimpan di server
                                $tmpName  = $_FILES['userfile']['tmp_name']; 
                                
                                // menggabungkan nama folder dan nama file
                                $uploadfile = $path . $fileName;
                                
                                //Validasi file upload
                                if($fileType == 'image/png' || $fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/gif'){
                                    if(!file_exists($uploadfile)){
                                        if($fileSize<5000000){
                                            if(move_uploaded_file($tmpName, $uploadfile)){
                                                $url_file = $uploadfile;
                                                $count++; // Number of successfully uploaded file
                                                
                                                //SQL ke database
                                                $regis = mysqli_query($conn, "insert into pelanggan values(NULL,'$nama','$nm_perusahaan','$username','$email','$hash','$no_telp','$alamat','$url_file','$role','','$waktu_input')");
                                                if ($regis) {
                                                    header('location:welcome');
                                                }else{
                                                    echo "Error: " . $regis . "<br>" . mysqli_error($conn);
                                                }
                                                //End SQL
                                                
                                            }else{
                                                if($count == 0){
                                                    $_SESSION['fileErr'] = "File gagal di upload";
                                                    header('location:register');
                                                }
                                            }
                                        }else{
                                            $_SESSION['fileErr'] = "File tidak boleh lebih dari 5 Mb";
                                            header('location:register');
                                        }
                                    }else{
                                        $_SESSION['fileErr'] = "File sudah ada";
                                        header('location:register');
                                    }
                                }else{
                                    $_SESSION['fileErr'] = "Format file hanya jpg, jpeg, png, dan gif";
                                    header('location:register');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>