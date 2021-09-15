<?php
  
  // cek apakah ukuran file melewati batas maksimal post_max_size (Kode Error 1) 
  if ($_SERVER['REQUEST_METHOD']=='POST' && empty($_FILES) && empty($_POST)) {
    $post_max = ini_get('post_max_size'); 
    $pesan_error = "Ukuran file melewati batas maksimal ({$post_max}B)";
  }


  //pengenalan kode error file upload ------------------------------------------------
  if (isset($_POST["submit"])) {

     // echo "<pre>";
     // print_r($_POST);
     // print_r($_FILES);
     // echo "</pre>";

     $nama      = strip_tags(htmlentities(trim($_POST["nama"])));
     $alamat    = strip_tags(htmlentities(trim($_POST["alamat"]))); 

     //hitung jumlah file upload
     $jumlah_file = count($_FILES["file_upload"]["name"]);

     for ($i = 0; $i < $jumlah_file; $i++) {

         
     
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
         $error = $_FILES["file_upload"]["error"][$i];

         $pesan_error = $arr_upload_error["$error"];

         
         if ($error === 0) { //jika tidak ada error
             
            //siapkan variable untuk pemindahan file
            $nama_folder = "gambar";
            $tmp = $_FILES["file_upload"]["tmp_name"][$i];
            
            // $nama_file = $_FILES["file_upload"]["name"];
            $nama_file = explode(".", $_FILES["file_upload"]["name"][$i]);
            
            $nama_file_baru = strtolower($nama . rand(1,99) . '.' . end($nama_file));//menganti nama file sesuai nama dari $_POST yg digenerate
            
            $path_file = "$nama_folder/$nama_file_baru";
            $upload_gagal = false; //disebut flag

            //cek type file
            $mime_boleh = array("image/jpeg", "image/gif", "image/png", "image/gif");
            $type_file = $_FILES["file_upload"]["type"][$i];
            if (!in_array($type_file, $mime_boleh)) {
                $pesan_error .= "Mohon upload file gambar (.gif, .png, .jpeg) <br>";
                $upload_gagal = true;
            }

            // // cek apakah terdapat file dengan nama yang sama
            // if (file_exists($path_file)) {
            //     $pesan_error .= "File dengan nama sama sudah ada diserver <br>";
            //     $upload_gagal = true; //flag
            // }

            //cek ukuran file tidak melebihi 700kb (Kode Error 2)
            $ukuran_file = $_FILES["file_upload"]["size"][$i];
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
    <title>form upload Multipe materi</title>
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
        <h1>FROM UPLOAD MATERI</h1>
    </div>    
    <br class="clear">      
    <div class="container">

<!-- MULTIPLE UPLOAD FILE ==============================================================
    Untuk form yang kompleks, kadang 1 file upload belum cukup. Untuk mengupload 2 file
    atau lebih, terdapat 2 alternatif. Membuat beberapa tag <input type="file"> atau 
    menambah atribut multiple. 

    cara untuk mengupload banyak file adalah dengan menambahkan atribut multiple ke
    dalam tag <input="file"> dengan penulisan sebagai berikut:
    
    <input type="file" name="file_upload[]" multiple>

    Hasilnya sekarang kita bisa memilih lebih dari 1file dari jendela browser file dengan
    cara blok atau menekan tombol CTRL + klik,
    Bagaimana cara pemrosesan file upload multiple?

    Ketika kita menjalankan printah print_r($_FILES) maka hasilnya akan berbentuk array
    3 dimensi. Untuk mengakases nama file dari masing2 file upload, bisa dari variable

    $_FILES["file_upload"]["name"][0], $_FILES["file_upload"]["name"][1], dst hingga
    $_FILES["file_upload"]["name"][3].

    Selanjutnya, untuk memprosesnya kita tinggal memeriksa ada berapa file yang diupload,
    lalu membuat sebuah perulangan untuk memindahkan semua file.
-->

    <div class="reset">
     <form action="92formUploadMultiple.php" method="post" enctype="multipart/form-data">
        <fieldset>
        <legend>Mengenal From Upload Multiple</legend>
            <p>
                <label for="nama">Nama :</label> 
                <input type="text" name="nama" id="nama" value="<?php echo $nama ?> "></p>
            <p>
                <label for="alamat">Alamat :</label>
                <input type="textarea" name="alamat" id="alamat" value="<?php echo $alamat ?> "></p>
           
            <p>Upload file: <input type="file" name="file_upload[]" multiple></p>
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