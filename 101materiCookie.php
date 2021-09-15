<?php
  session_start();
  if (!isset($_SESSION["username"])) {
      header("Location: 100CookieSession.php");
  }

  if (isset($_POST["submit"])) {

    $pesan_error_file = "";

     $arr_upload_error = array(
                       0 => '',
                       1 => 'Ukuran file melewati batas maksimal',
                       2 => 'Ukuran file melewati batas maksimal 7MB',
                       3 => 'File hanya ter-upload sebagian',
                       4 => 'Tidak ada file yang terupload',
                       6 => 'Server Error',
                       7 => 'Server Error',
                       8 => 'Server Error',
                       );

     $upload_error = $_FILES["file_upload"]["error"];
     if ($upload_error !== 0) {
        $pesan_error_file .= $arr_upload_error["$upload_error"];
     }
        
     $nama_folder = "gambar/";
     $nama_file_baru = $_FILES["file_upload"]["name"];
     $path = "$nama_folder $nama_file_baru";
 

     $ukuran_file = $_FILES["file_upload"]["size"];
     if ($ukuran_file > 716800) {               
        $pesan_error_file .= "Ukuran file melebihi 700Kb";            
     }

     $tmp = isset($_FILES['file_upload']) ?? $_FILES['file_upload']['tmp_name'];
     if ($tmp = $_FILES['file_upload']['tmp_name']) {
        $check = (getimagesize($tmp) === false ) ? $pesan_error_file = "Mohon upload file gambar (.gif, .png, .jpeg)" : ""; 
     }

     if ($pesan_error_file === '') {
        move_uploaded_file($tmp, "$nama_folder $nama_file_baru");
     }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>case study</title>
    <link href="percobaan/csslatih.css" rel="stylesheet">
    <style>
        .header { margin-top: 0 }
    </style>
</head>
<body>  
    <div class="header">
        <h1>MATERI</h1>
    </div>    
    <br class="clear">      
    <div class="container">

    <h2>MATERI COOKIE</h2>
    <h2>Selamat datang, <?php echo $_COOKIE["nama"]; ?> </h2>

    <div class="nav">
        <ul>
            <li><a href="101materiCookie.php">Materi Cookie</a></li>
            <li><a href="102materiSession.php">Materi Session</a></li>
            <li><a href="103logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="clear">

    <img src="<?php echo "$nama_folder $nama_file_baru" ?>">

    <form id="materi_cookie" action="101materiCookie.php" method="post" enctype="multipart/form-data">
        <div class="input">
            <input type="file" name="file_upload" value="Pilih Gambar" >
            <?php if (!empty($pesan_error_file)) {echo "<p> $pesan_error_file </p>";} ?>
            <p><input type="submit" name="submit" value="Upload Gambar"></p>
        </div>
    </form>

<div class="articel">
    <h3>Cara Membuat Cookie</h3>
    <p>
        Untuk membuat cookie, PHP menyediakan fungsi setcookie(). Fungsi ini bisa diisi dengan beberapa 
        argumen. Untuk membuat cookie, setidaknya kita butuh 2 argumen utama, yakni nama dari cookie dan 
        nilainya.
        Sebagai contoh, untuk membuat cookie "nama" dengan nilai "Sheila", bisa ditulis dengan perintah 
        dibawah ini:<br><br>
        setcookie("nama", "sheila");<br><br>
        Fungsi setcookie() harus di posisi paling awal, sebelum ada kode HTML, kecuali fitur output buffering
        sudah diaktifkan.
    </p>
    <br>

    <h3>Superglobals Variable $_COOKIE</h3>
    <p>
        sama seperti superglobal variable lain, PHP menyediaakn variable $_COOKIE yang berisi seluruh 
        tentang cookie. Langsung saja kita cek dengan perintah print_r($_COOKIE):<br>
        hasilnya:
        <?php
          echo "<pre>";
          print_r($_COOKIE);
          echo "</pre> <br>";
        ?>
    </p>

    <h3>Function setcookie()</h3>
    <p>
        Fungsi setcookie() sebenarnya sudah kita bahas sebelum ini. Dan fungsi setcookie() ternyata memiliki 
        cukup banyak argumen, yakni 7 buah, dimana 6 diantaranya bersifat opsional (boleh tidak ditulis).
    </p>
    <ol>
        <li>Argumen Pertama: Nama Cookie</li>
        <li>Argumen Kedua: Nilai Cookie</li>
        <li>Argumen Ketiga: Masa Aktif Cookie</li>
        <li>Argumen Keempat: Mengatur Path</li>
        <li>Argumen Kelima: Mengatur Domain</li>
        <li>Argumen Keenam: Mengatur Secure Protokol http atau https</li>
        <li>Argumen Ketujuh: Hanya Bisa diakses dari web server</li>
    </ol>
    <br>

    <h3>Jeda Ketika Menghapus Cookie</h3>
    <p>
        Pembahasan ini sebenarnya kebalikan dari materi tentang jeda antara set cookie dan menampilkan cookie
        Disana kita sudah lihat bahwa fungsi setcookie() butuh perjalanan ke web browser untuk dibuat. Hal
        yang sama juga berlaku untuk proses penghapusan cookie.<br><br>
        kode penghapusan cookie seperti ini => setcookie("bulan",null,time()-60); , akan membutuhkan "jeda"
        1 kali reload, sebab instruksi ini harus dikirim terlebih dahulu ke web browser:<br><br>
        Sebagai solusi alternatif, dengan manambahkan fungsi unset(), seperti contoh dibawah ini:<br><br>
        setcookie("bulan",null,time()-60); <br>
        unset($_COOKIE["bulan"]);<br><br>
        Fungsi unset($_COOKIE["bulan"]) berguna untuk menghapus cookie "Bulan" hanya untuk halaman ini saja.
        Fungsi unset() sendiri tidak akan menghapus cookie. Untuk menghapus cookie asli, kita tetap harus
        menjalankan setcookie(). Trik seperti ini diperlukan agar halaman tidak perlu reload untuk 
        menunggu cookie asli dihapus dari web browser.
    </p>
    <br>
</div>




    


    


    </div>
</body>
</html>
