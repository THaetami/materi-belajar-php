<?php
  
  // cek apakah ukuran file melewati batas maksimal post_max_size (Kode Error 1) 
  if ($_SERVER['REQUEST_METHOD']=='POST' && empty($_FILES) && empty($_POST)) {
    $post_max = ini_get('post_max_size'); 
    $pesan_error = "Ukuran file melewati batas maksimal ({$post_max}B)";
  }


  //pengenalan kode error file upload ------------------------------------------------
  if (isset($_POST["submit"])) {

     echo "<pre>";
     print_r($_POST);
     print_r($_FILES);
     echo "</pre>";

     $nama      = strip_tags(htmlentities(trim($_POST["nama"])));
     $alamat    = strip_tags(htmlentities(trim($_POST["alamat"]))); 

     $arr_upload_error = array (
           0 => '',
           1 => 'Upload gagal, ukuran file melewati batas maksismal (Error 1)', //post_max_size
           2 => 'Upload gagal, ukuran file melewati batas maksimal (Error 2)', //upload_max_filesize
           3 => 'Upload gagal, file hanya terupload sebagian',
           4 => 'Upload gagal, tidak ada file yang terupload',
           6 => 'Upload gagal, server error',
           7 => 'Upload gagal, server error',
           8 => 'Upload gagal, server error',
           );
     $error = $_FILES["file_upload"]["error"];
     $pesan_error = $arr_upload_error["$error"];

     
     if ($error === 0) { //jika tidak ada error
         
        //siapkan variable untuk pemindahan file
        $nama_folder = "gambar";
        $tmp = $_FILES["file_upload"]["tmp_name"];
        // $nama_file = $_FILES["file_upload"]["name"];
        $nama_file = explode(".", $_FILES["file_upload"]["name"]); 
        $nama_file_baru = strtolower($nama . '.' . end($nama_file));//menganti nama file sesuai nama dari $_POST yg digenerate
        $path_file = "$nama_folder/$nama_file_baru";
        $upload_gagal = false; //disebut flag

        //cek type file
        $mime_boleh = array("image/jpeg", "image/gif", "image/png", "image/gif");
        if (!in_array($_FILES["file_upload"]["type"], $mime_boleh)) {
            $pesan_error .= "Mohon upload file gambar (.gif, .png, .jpeg) <br>";
            $upload_gagal = true;
        }

        // cek apakah terdapat file dengan nama yang sama
        if (file_exists($path_file)) {
            $pesan_error .= "File dengan nama sama sudah ada diserver <br>";
            $upload_gagal = true; //flag
        }

        //cek ukuran file tidak melebihi 700kb (Kode Error 2)
        $ukuran_file = $_FILES["file_upload"]["size"];
        if ($ukuran_file > 716800) {
            $pesan_error .= "Ukuran file melebihi 700Kb <br>";
            $upload_gagal = true; //flag
        }

        //pindahkan file upload 
        if (!$upload_gagal AND move_uploaded_file($tmp, $path_file)) {
            $pesan_error .= "File Sukses diupload <br>";
        }
        else {
            $pesan_error .= "File gagal diupload <br>";
        }
     }
  }
  else {
      $nama = "";
      $alamat = "";
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form upload materi</title>
    <link href="csslatihan.css" rel="stylesheet">

</head>

<body>

    <nav class="navigasi">
        <ul>
            <li><a href="indexcoba.html" target="_blank">Home</a></li>
            <li><a href="dramaterbaru.html" target="_blank">Drama Terbaru</a></li>
            <li><a href="genredrama.html" target="_blank">Genre</a></li>
            <li><a href="listfilm.html"target="_blank">Film Korea</a></li>
        </ul>
    </nav>
    <br class="clear">   
    <div class="header">
        <h1>MATERI FROM UPLOAD</h1>
    </div>    
    <br class="clear">      
    <div class="container">

<!-- MEMAHAMI KODE ERROR FILE UPLOAD =================================================
     Dari contoh yang telah kita jalankan, terdapat satu informasi mengenai kode error, 
     yakni isi dari variabel $_FILES["file_upload"]["error"].
     
     Variable ini mengindikasikan apakan terdapat error atau tidak pada saat proses file 
     upload. Nilai ini disajikan dalam bentuk angka 0-8. Berikut penjelasannya:

     0 : Tidak ada error, file sukses sampai ke web server. 
     1 : Ukuran file melewati batas upload_max_filsize. pengaturan di-set dr php.ini
     2 : Ukuran file melewati batas MAX_FILE_SIZE. pengaturan ini diset dari form.
     3 : File hanya diupload  sebagian. Kemungkinan besar karena masalah jaringan atau
         koneksi yang tidak lancar.
     4 : File upload tidak ditemukan. Ini terjadi ketika form disubmit, namun user tidak 
         memilih file apapun (form kosong).
     6 : Folder sementara tidak ditemukan. Error ini bisa terjadi karena salah menulis 
         alamat folder upload_tmp_dir atau folder tersebut sudah terhapus.
     7 : PHP tidak bisa menulis ke harddisk server. Ini bisa erjadi ketika PHP tidak 
         mendapa hak akses ke dalam temporary directory. Dalam server linux, setiap file
         maupun folder bisa dibatasi hak aksesnya.
     8 : Proses upload dihentikan oleh extension lain dari PHP. Artinya terdapat kode
         program di server yang mencegah file diupload.
 -->


<!-- MEMBATASI UKURAN FILE UPLOAD DENGAN MAX_FILE_SIZE ===============================
    Selain php.ini kita juga bisa batasi ukuran file upload dari HTML. cara dengan 
    menulis sebuah tag :
    
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">

    Sebagaimana yang kita ketahui tag <input type="hidden"> tidak akan telihat di web
    browser. Tag ini biasa dipakai untuk membantu coding PHP seperti dalam contoh ini.
    Agar dapat bekerja, tag <input type="hidden"> harus ditempatkan sebelum tag 
    <input type="file">

    Akan tetapi metode ini juga memiliki kelemahan. Sebagaimana cara kerja HTML yang
    diproses di web browser, pembatasan dari MAX_FILE_SIZE dapat dibobol dangan mudah.
    Seseorang bisa menghapus ta ini di web browser dan mengirim file untuk diupload.
-->


<!-- MENGATASI ERROR Warning: POST Content-Length ===================================
    Jika kita mencoba mengupload file yang ukurannya lebih besar dari post_max_size, 
    tidak akan tampil error dari $_FILES["upload_file]["error"]. Jika masih ingat,
    post_max_size adalah ukuran maksimum total file upload dari suatu form.

    Dalam php.ini post_max_size = 40 MB. Artinya total seluruh file upload dalam satu
    form tidak boleh melebihi 40MB.

    Jika melebihi akan menampilkan error kategori starup errors, yakni error yang 
    terjadi sebelum kode PHP dijalankan.

    Ketika ukuran file upload melebihi nilai maksimum post_max_size, PHP melakukan 
    hal yang di luar prediksi. Yakni menghapus seluruh isi variabel $_POST dan $_FILES.
    Inilah yang menjelaskan kenapa perintah print_r() tidak mengeluarkan hasil apa pun.

    Salah satu solusi untuk mengatasi error ini adalah dengan menaikkan nilai ]
    post_max_size, katakan menjadi 100MB. Dengan demikian, peluang terjadi error bisa 
    sedikit diatasi.

    Namun ini bukan solusi yang ideal. Bagaimana jika seseorang mencoba mengupload file
    dengan ukuran 1GB? Error yang sama akan tampil kembali. Yang juga menyulitkan, 
    kita tidak bisa mendapat informasi kode error karena variabel $_FILES memang sudah 
    tidak ada.

    Solusinya adalah dengan membuat validasi sebagai berikut:

    if ($_SERVER['REQUEST_METHOD']=='POST' && empty($_FILES) && empty($_POST)) {
        $post_max = ini_get('post_max_size');
        $pesan_error = "Ukuran file melewati batas maksimal ({$post_max}B)";
    }

    Namun bagaimana cara menghilangkan pesan error: Warning: POST Content-Length of
    164607932 bytes exceeds the limit of 41943040 bytes in Unknown on line 0?

    Kita bisa memaksa PHP untuk tidak menampilkan pesan startup errors dengan cara
    mengubah setingan php.ini: display_startup_errors = Off. Akan tetapi selama proses
    development (pembuatan program), sebaiknya tetap mengaktifkan konfigurasi ini dan baru
    dimatikan ketika website sudah live.
-->


<!-- MEMINDAHKAN FILE UPLOAD =========================================================
    PHP menyediakan fungsi move_upload_file() untuk memindahkan file upload dari
    temporary folder ke folder yang kita inginkan.

    Fungsi move_upload_file() butuh 2 argumen. Argumen pertama berupa alamat temporary
    directory. Nilai ini bisa diakases dari variable $_FILES["file_upload"]["tmp_name"].
    Argumen kedua adalh lokasi dan nama file ke mana file upload akan disimpan.

    Fungsi move_upload_file() akan mengembalikan nilai false jika tidak bisa memindahkan
    file, misalkan folder tujuan belum ada atau masalah lain. 
-->


<!-- VALIDASI UNTUK FILE UPLOAD YANG MEMILIKI NAMA SAMA ==============================
    Jika anda mencoba upload file yang memiliki nama sama, fungsi move_upload_file()
    tetap mengizinkan hal ini dan tidak menampilkan error apapun. File terakhir akan 
    menimpa file lama yang memiliki nama yang sama (overwrite). Bagaimana jika kita
    tidak ingin hal ini terjadi?

    Sebelum menjalankan fungsi move_upload_file(), periksa apakah di folder upload 
    terdapat file dengan nama yang sama atau tidak. Ini bisa dilakukan dengan function
    file_exists(). 

    Function ini butuh 1 buah argumen berupa alamat file yang ingin diperiksa. Function 
    ini mengembalikan nilai true jika file tersebut ada, atau false jika file yang dicari
    tidak ada.

    Dengan memanfaatkan function file_exists(), kita bisa buat kode program yang 
    menampilkan pesan error jika file yang diupload ternyata mamilki nama yang sama
    dengan file yang ada di server.
-->


<!-- MEMBATASI UKURAN FILE UPLOAD =====================================================
    Cara pembatasan file ukuran file upload telah kita bahas beberapa kali, mulai dari
    settingan php.ini hingga manambahkan tag input type hidden.

    Dalam kebanyakan kasus, kita tidak bisa mengakses file php.ini. Contohnya jika anda
    berencana menggunakan web hosting dengan tipe "shared hosting". Di dalam shared
    hosting, kita tidka diizinkan mengutak-atik setingan php.ini (untuk alasan keamanan)
    Oleh karena itu, pengaturan ukuran file upload tidak bisa dilakukan dari settingan
    upload_max_filesize dan post_max_size dari php.ini akan berdampak ke seluruh form 
    di server, tidak peduli itu form untuk upload video maupun form gambar.

    Di sisi lain, menggunakna konstanta MAX_FILE_SIZE dari tag <input> juga tidak bisa
    diandalkan karena kode HTML dapat diubah dari web browser.

    Solusi lain yang bisa dipakai adlah dengan memeriksa variable 
    $_FILES["file_upload"]["size"]. Jika nilainya melebihi batas yang sudah ditentukan,
    maka hentikan proses upload dan tampilkan pesan error.
-->


<!-- MEMBATASI JENIS FILE UPLOAD ======================================================
    Validasi berikutnya adalah membatasi jenis tipe file yang boleh diupload. Sebagai
    contoh, form biodata akan lebih menarik jika user bisa mengupload gambar profilenya
    sendiri, tapi bagaimanajika ada yang iseng dan mengupload file mp3?

    Terdapat beberapa alternatif solusi, mulai dari yang sederhana namun mudah di bobol
    hing yang cukup rumit tapi lebih aman. 

    yaitu dengan menggunakan informasi yg ada didalam variable
    $_FILES["file_upload"]["type"]
-->
    <div class="reset">
     <form action="91formUpload.php" method="post" enctype="multipart/form-data">
        <fieldset>
        <legend>Mengenal From Upload</legend>
            <p>
                <label for="nama">Nama :</label> 
                <input type="text" name="nama" id="nama" value="<?php echo $nama ?> "></p>
            <p>
                <label for="alamat">Alamat :</label>
                <input type="textarea" name="alamat" id="alamat" value="<?php echo $alamat ?> "></p>
            
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> --untuk membatasi ukuran file upload sebesar 1000000 byte, saat mengupload file lebih dr batas tsb, maka akan muncul kode error 2 -->
            <p>Upload file: <input type="file" name="file_upload"></p>
            <input type="submit" name="submit" value="Proses Upload">
            <?php if (!empty($pesan_error)) {echo "<p> $pesan_error </p>";} ?>
        </fieldset>
     </form>
    </div>






































    </div>
</body>
<script>
</script>
</html>