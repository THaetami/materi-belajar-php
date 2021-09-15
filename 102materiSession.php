<?php
  session_start();
  if (!isset($_SESSION["username"])) {
      header("Location: 100CookieSession.php");
  }

  if (isset($_POST["submit1"])) {

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

    <h2>MATERI SESSION</h2>
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

    <form id="materi_session" action="102materiSession.php" method="post" enctype="multipart/form-data">
        <div class="input">
            <input type="file" name="file_upload" value="Pilih Gambar" >
            <?php if (!empty($pesan_error_file)) {echo "<p> $pesan_error_file </p>";} ?>
            <p><input type="submit" name="submit1" value="Upload Gambar"></p>
        </div>
    </form>

<div class="articel">
    <p>
        Session sebenarnya bentuk lain dari cookie. Session juga dipakai untuk menampung data, tapi ada 
        beberapa perbedaan mendasar antara session dengan cookie:
    </p>
    <ol>
        <li>
            <h4>Data session disimpan di dalam web server</h4>
            <p>
                Session tetap menggunakan cookie untuk dapat bekerja, tapi isi dari cookie tersebut
                hanya berupa referensi atau alamat yang merujuk kepada sebuah file di dalam web
                server. Seluruh data session disimpan di dalam file yang berada di dalam web server ini.
                Karena data disimpan di dalam web server, session relatif lebih aman dari pada cookie,
                karena isi session tidak bisa 'diintip' dari web browser seperti halnya cookie.
            </p>
        </li>
        <li>
            <h4>Session akan hilang ketika web browser di tutup</h4>
            <p>
                Berbeda dengan cookie yang bisa di-set umurnya hingga 10 tahun atau lebih, data yang
                disimpan dalam session hanya bertahan sampai web browser ditutup, atau hanya dalam
                1 sesi.
                Namun perlu juga diketahui, beberapa web browser menawarkan fitur untuk
                menyimpan session pada saat web browser akan ditutup. Jadi, data session bisa saja
                tidak terhapus apabila user menggunakan fitur ini.
            </p>
        </li>
        <li>
            <h4>Session disimpan di dalam variabel superglobal $_SESSION</h4>
            <p>
                Walaupun prinsip kerjanya mirip dengan cookie (dan memang menggunakan cookie),
                data session disimpan dalam superglobal variable $_SESSION. Cara pengaksesan variabel
                ini sama seperti variabel superglobal lain.
            </p>
        </li>
        <li>
            <h4>Session bisa menyimpan lebih banyak data</h4>
            <p>
                Data yang disimpan oleh cookie memiliki batas maksimal. Karena tentu saja kita tidak
                mau harddisk penuh sesak oleh cookie yang dititipkan dari ratusan website. Maksimum
                data yang bisa disimpan dalam cookie web browser adalah 4kB, atau sekitar 4000
                karakter. Ini berlaku untuk total seluruh cookie dari satu website.<br>
                Sedangkan pada session tidak ada batasan, karena data disimpan dalam server. Batas
                maksimalnya adalah ruang harddisk di web server yang bisa mencapai puluhan GB.
            </p>
        </li>
    </ol>

    <h3>Prinsip Kerja Dan Cara Pembuatan Session</h3>
    <p>
        Untuk bisa menggunakan session, kita harus jalankan function session_start() terlebih dahulu.
        session_start() merupakan sebuah function ajaib yang melakukan banyak kerja secara otomatis.<br><br>

        Pertama, function session_start() akan membuat sebuah cookie yang berisi referensi ke file session
        di web browser. Jika cookie referensi ini sudah ada, maka tinggal mengambil nilai referensinya saja
        (cookie tidak akan dibuat lagi). Kemudian, function session_start() akan membuka file referensi di 
        dalam web server dan mengambil isinya untuk diinput ke dalam variable $_SESSION.<br><br>

        Secara default, file session disimpan dalam folder C:\xampp\tmp.<br><br>

        dibawah ini merupakan contoh pembuatan session:<br><br>

        session_start(); <br>

        $_SESSION["nama"] = "Sheila"; <br>
        $_SESSION["id"] = "007"; <br>
        $_SESSION["hak_akses"] = "super_user";<br><br>

        dan cara pengaksesannya seperti berikut:<br><br>

        echo "Nama = ".$_SESSION["nama"]; <br>
        echo "ID = ".$_SESSION["id"]; <br>
        echo "Hak akses = ".$_SESSION["hak_akses"];; <br>

    </p>
    <br>

    <h3>Menghapus Session</h3>
    <p>
        Cara pertama, jika ingin menghapus data cookie secara individual, bisa menggunakan function unset()
        seperti contoh berikut:<br><br>

        session_start(); <br>
        //... kode PHP lain disini.. <br>
        unset($_SESSION["nama"]); <br><br>

        Hasilnya, variable session nama sudah tidak ada lagi (sudah dihapus). Yang juga perlu diingat, 
        function session_start() tetap harus dipanggil ketika ingin menghapus session.<br><br>

        Cara kedua, jika kita ingin menghapus seluruh variabel session bisa menggunakan fungsi
        session_unset() seperti contoh berikut:<br><br>

        session_start(); <br>
        //... kode PHP lain disini... <br>
        session_unset(); <br> <br>

        Sekarang, seluruh variabel yang ada di dalam $_SESSION akan terhapus.<br><br>

        Cara ketiga, apabila ingin menghapus fisik file session, bisa menggunakan fungsi
        session_destroy() seperti berikut: <br><br>

        session_start(); <br>
        //... kode PHP lain disini... <br>
        session_destroy(); <br> <br>

        Pemanggilan function session_destroy() akan menghapus file session dari temporary folder. Dengan 
        perintah ini, file seperti sess_8b7qv4n1jmpliit3c1drqf2vk7 sudah tidak ada lagi, termasuk seluruh
        data session di dalamnya juga ikut terhapus.<br><br>

        Walaupun data session itu sudah tidak ada, cookie yang digunakan oleh session masih
        ditemukan di dalam web browser. Ketika saya membuat ulang data session (sebelum menutup
        web browser) referensi yang digunakan tetap 8b7qv4n1jmpliit3c1drqf2vk7. <br><br>

        Jadi bagaimana cara menghapus seluruh data session berserta cookienya? Untuk menghapus
        cookie ini ternyata sedikit rumit karena kita perlu mencari tau seluruh argumen yang
        digunakan PHP untuk membuat cookie PHPSESSID. Berikut cara menghapus cookie session
        yang saya ambil dari PHP Manual:<br><br>

        //mulai sessiion <br>
        session_start(); <br><br>

        //ambil seluruh data terkait coookie yg digunakan session <br>
        $params = session_get_cookie_params();  <br><br>

        //set ulang cookie (proses hapus cookie) <br>
        setcookie(session_name(), null, time() - 42000, $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]);  <br><br>

        //hapus file session di dalam stream_socket_server <br>
        session_destroy();<br><br>

        function session_get_cookie_params() berguna untuk mengambil seluruh data cookie yang dipakai ketika
        membuat session. Data seperti lama expired cookie, nama path, nama domain (host), dst.<br><br>
        $params = session_get_cookie_params(); , ketika dicek dengan perintah print_r($params); , 
        hasilnya seperti dibawah ini <br><br>
        <?php
          $params = session_get_cookie_params();

          echo "<pre>";
          print_r($params);
          echo "</pre> <br>";
        ?>
        Terlihat bahwa nilai domain, secure, dan httponly kosong, karena memang sudah bawaan dari php ini.
    </p>
    <br>

    <h3>Jeda Antara Set Session dan Menampilkan Session</h3>
    <p>
        Berbeda dengan cookie yang harus memiliki "jeda" ketika cookie di buat dan di akses, dalam session
        jeda ini tidak ada. Ini karena isi data session disimpan di dalam server sehingga tidak perlu dikirim
        dengan HTTP header (yang dikirim dalam HTTP header hanyalah cookie untuk referensi, bukan data session 
        itu sendiri).
    </p>
    <br>


    


    


    </div>
</body>
</html>
