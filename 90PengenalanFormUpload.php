<?php
  //cek apakah form telah di submit
  if (isset($_POST["submit"])) {
      //form telah disubmit, tampilkan nilai form
      echo "<h1>Form Berhasil di Proses </h1>";

      //ambil nilai form
      $nama = trim($_POST["nama"]);
      $alamat = trim($_POST["alamat"]);
      $target = $_POST["target"] ?? "";

      $setting1 = <<<"end"
                  Pengaturan upload_max_filesize dipakai untuk membatasi ukuran maksimum 
                  satu file upload. Dalam settingan default XAMPP 8 nilainya adalah 
                  40M, yang berarti file upload dibatasi maksimal 40MB untuk 1 buah 
                  file. Jika lebih dari itu, proses upload akan error.
                  end;
      $setting2 = <<<"end"
                  Pengaturan post_max_size adalah batas maksimum total seluruh file dalam 
                  1 kali pengiriman (1 kali POST-ing).
                  Di dalam sebuah form, kita bisa membuat beberapa tag 
                  <input type="file">. Setiap tag ini dibatasi oleh upload_max_size. 
                  Namun total seluruh file tidak boleh melebihi post_max_size. 
                  Dalam pengaturan default XAMPP 8, nilai post_max_size = 40M.
                  end;
      $setting3 = <<<"end"
                  Pengaturan max_file_uploads berfungi untuk membatasi jumlah file upload 
                  yang diizinkan.
                  dalam 1 kali pengiriman form. Nilai defaultnya adalah 20, yang berarti kita 
                  hanya bisa mengupload maksimal 20 file dalam 1 form. Tentunya total 
                  ukuran file seluruh file ini juga tidak boleh melebihi nilai 
                  post_max_size.
                  end;
      $setting4 = <<<"end"
                  Pengaturan max_execution_time sebenarnya tidak hanya berkaitan dengan 
                  file upload, tapi seluruh pemrosesan di PHP. 
                  Nilai max_execution_time = 120 berarti setiap proses yang dilakukan oleh 
                  PHP tidak boleh melebihi 120 detik. Jika lebih, proses dihentikan paksa dan
                  akan tampil pesan error.
                  Ketika kita mengupload file berukuran besar di jaringan yang lambat, 
                  bisa saja proses upload butuh waktu lebih dari 120 detik.
                  end;
      $setting5 = <<<"end"
                  Sama seperti max_execution_time, pengaturan memory_limit juga tidak 
                  hanya berkaitan dengan file upload. Ini adalah total maksimum memori 
                  yang dialokasikan kepada PHP.
                  Jika PHP mengerjakan kode program yang cukup rumit atau memproses 
                  upload file berukuran besar, akan butuh alokasi memori yang besar 
                  pula. Nilai default dari memory_limit adalah 512M, yang berarti PHP 
                  diberikan jatah memori sebesar 512 MB.
                  end;
      $setting6 = <<<"end"
                  Pengaturan upload_tmp_dir dipakai untuk menentukan lokasi folder 
                  sementara (temporary directory) dari file upload. Nilai default dari 
                  XAMPP berada di C:\\xampp\\tmp. Artinya, ketika sebuah file di upload, 
                  file tersebut akan ditempatkan ke dalam folder C:\\xampp\\tmp untuk
                  sementara sebelum diproses atau pindah ke tempat lain.
                  Nantinya kita juga bisa memberikan nilai upload_tmp_dir = NULL. 
                  Jika di set dengan nilai NULL, PHP akan menggunakan folder temporary 
                  yang diatur oleh sistem operasi.
                  Dalam sistem operasi linux (yang umum digunakan pada web server), 
                  alamat folder ini juga harus bisa diakses oleh PHP 
                  (diberikan hak aksesnya).
                  end;
      $setting7 = <<<"end"
                  Pengaturan file_uploads bisa jadi merupakan pengaturan paling penting 
                  untuk pemrosesan file upload. Karena jika settingan file_uploads diisi 
                  off, PHP tidak akan bisa memproses form upload sama sekali. Agar bisa 
                  berjalan, file_uploads harus bernilai on, 1 atau true.
                  end;


          echo "<pre>";
          print_r($_POST);
          print_r($_FILES);
          echo "untuk melihat apa yang akan dikirim oleh form, saya membuat perintah 
                print_r(\$_POST) dan print_r(\$_FILES), hasilnya akan seperti array 
                diatas. \n
                
                Hasil form dipecah ke dalam 2 variable superglobal: \$_POST
                dan \$_FILES. Isian form (text box) akan masuk ke variable \$_POST, 
                termasuk jika saya menambah objek form lain seperti checkbox, radio 
                button atau textarea, termasuk tombol sumbit yang bernilai \"Proses
                Upload\" \n
                
                Variable \$_FILES hanya akan berisi data tentang file yang diupload,
                yakni yang berasal dari tag &lt;input type=\"file\"&gt;. Karena di
                dalam form saya menulis atribut name=\"file_upload\", maka seluruh 
                informasi tersimpan ke dalam variable \$_FILES[\"file_upload\"]. \n
                
                Bukan itu sahja, variabel \$_FILES sebenarnya merupakan sebuah
                Associative array 2dimensi. Untuk mendapatkan nama file yang diupload,
                kita mengaksesnya dari variable: \n
                
                \$_FILES[\"file_upload\"][\"name\"]. \n
                
                Dari contoh diatas, terlihat bahwa file upload memiliki 5buah informasi: \n
                [name] => koala.jpg
                [type] => image/jpeg 
                [tmp_name] => C:\\xampp\\tmp\\phpB1B1.tmp
                [error] => 0
                [size] => 127280  \n ";
          
          echo "<br><br> === latihan mengakses satu persatu nilai variable \$_POST dan \$_FILES : === <br><br>";

          //latihan mengakses satu persatu nilai variable $_POST dan $_FILES :

          // form telah disubmit, proses data
          echo "Nama (dari kotak input) = ".$_POST["nama"]."<br>";
          echo "Alamat (dari kotak input) = ".$_POST["alamat"]."<br>";
          
          
        //   if (isset($_POST["target"])) {
        //       echo $target = $_POST["target"];
        //   }

          echo "Target (dari kotak input alias checkbox) = $target <br>";
          echo "Nama File (dari kotak input) = ".$_POST["nama_file"]."<br>";


          echo "=========================================================<br>";
          //tampilkan informasi tentang file yang diupload
          echo "Nama File = ".$_FILES["file_upload"]["name"]."<br>";
          echo "NIME Type = ".$_FILES["file_upload"]["type"]."<br>";
          echo "Temprary = ".$_FILES["file_upload"]["tmp_name"]."<br>";
          echo "Kode Error = ".$_FILES["file_upload"]["error"]."<br>";
          echo "Ukuran File = ".$_FILES["file_upload"]["size"]."<br>";


          echo "<br><br><h4>DAFTAR PENGATURAN YANG BERHUBUNGAN DENGAN FILE UPLOAD DALAM KONFIGURASI php.ini bawaan XAMPP</h4>";
          echo "<h3>Setting php.ini: upload_max_filesize</h3>".htmlentities($setting1);
          echo "<h3>Setting php.ini: post_max_size</h3>".htmlentities($setting2);
          echo "<h3>Setting php.ini: max_file_uploads</h3>".htmlentities($setting3);
          echo "<h3>Setting php.ini: max_execution_time</h3>".htmlentities($setting4);
          echo "<h3>Setting php.ini: memory_limit</h3>".htmlentities($setting5);
          echo "<h3>Setting php.ini: upload_tmp_dir</h3>".htmlentities($setting6);
          echo "<h3>Setting php.ini: file_uploads</h3>".htmlentities($setting7);
          echo "</pre>";
          die();
      }  
  else {
    $pesan_error = "";
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
    <title>pengenalan form upload</title>
    <link href="percobaan/csslatih.css" rel="stylesheet">
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
        <h1>FORM UPLOAD</h1>
    </div>    
    <br class="clear">      
    <div class="container">
<!----------------------------------------------------------------------------------->
<!-- Superglobals Variable $_FILES  
        Meskipun sama-sama dipakai untuk memproses form, informasi tentang file upload 
    di simpan ke dalam superglobals $_FILES, bukan $_GET maupun $_POST sebagaimana 
    yang kita gunakan untuk memproses form biasa. 
        
        Selain itu, di kode HTML untuk tag <form> harus ditambah atribut 
    enctype="multipart/form-data". Berikut kode HTML untuk menampilkan kotak input 
    upload:

        Secara sederhana, aribut enctype="multipart/form-data" menginformasikan kepada
    web server bahwa nilai yang dikirim dari form tidak hanya barupa teks tetapi 
    mungkin juga terdapat file. Kata "mungkin" artinya jika didalam form tidak
    terdapat file yang di upload, form tetap bisa diproses seperti biasa.

        Untuk form upload, kita juga harus menggunakan method="post". Method get tidak
    bisa dipakai untuk pemprosesan file upload.

-->

<!-- Superglobals Variable $_FILES   -->
    <h5>--- Superglobals Variable $_FILES ---</h5>
    <form action="90PengenalanFormUpload.php" method="post" enctype="multipart/form-data">
        <p>Nama : <input type="text" name="nama" value="<?php echo $nama ?> "></p>
        <p>Alamat : <input type="textarea" name="alamat" value="<?php echo $alamat ?> "></p>
        <input type="checkbox" name="target" value="PHP">Paham PHP</p>
        <p>Nama File : <input type="text" name="nama_file"></p>
        <p>Upload File : <input type="file" name="file_upload"></p>
        <input type="submit" name="submit" value="Proses Upload">
    </form>
    


    </div>
</body>
<script>
</script>
</html>