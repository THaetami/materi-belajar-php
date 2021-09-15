<?php
  if (!isset($_POST["submit1"])){
    header("Location: 80form_index.php");
  }

//====================================================================================
//Menampilkan Pesan Kesalahan Form ===================================================
  //ambil nilai form
  $nami = trim($_POST["nami"]);
  $nem = trim($_POST["nem"]);


  //cek apakah "nami" sudah diisi atau tidak
  if (empty($nami)){
    $pesan = urlencode("Nami harus diisi");
    header("Location: 80form_index.php?pesan=$pesan");
    die();
  }

  //cek apakah "nem" sudah diisi atau tidak
  if (empty($nem)){
    $pesan = urlencode("Nem harus diisi");
    header("Location: 80form_index.php?pesan=$pesan");
    die();
  }

//=====================================================================================
//Mengisi Kembali Form (Form re-populate)==============================================
  //ambil nilai form
  $sekolah = trim($_POST["sekolah"]);
  $jurusan = trim($_POST["jurusan"]);
  $belajer = $_POST["belajer"];

  //siapkan nilai untuk dikirim kembali
  $query_sekolah = "sekolah=".urlencode($sekolah);
  $query_jurusan = "jurusan=".urlencode($jurusan);
  $query_belajer = "belajer=".urlencode($belajer);

  $isi_form = "&$query_sekolah&$query_jurusan&$query_belajer";

  //cek apakah "sekolah" sudah diisi atau tidak
  if (empty($sekolah)) {
   $pesan = urlencode("Nama sekolah harus diisi");
   header("Location: 80form_index.php?pesan={$pesan}{$isi_form}");
   die();
  }

  //cek apakah "jurusan" sudah diisi atau tidak
  if (empty($jurusan)) {
    $pesan = urlencode("Nama jurusan harus diisi");
    header("Location: 80form_index.php?pesan={$pesan}{$isi_form}");
    die();
  }

  //cek apakah "belajer" sudah diisi atau tidak
  if (empty($belajer)) {
    $pesan = urlencode("Target harus dicentang");
    header("Location: 80form_index.php?pesan={$pesan}{$isi_form}");
    die();
  }
?>
<h1>Halaman Proses (82proses_formulir.php)</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>teknik validasi dengan PHP</title>
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
        <h1>Menampilkan Pesan Kesalahan Form</h1>
    </div>    
    <br class="clear">      
    <div class="container">
<!--=
//Menampilkan Pesan Kesalahan Form ===================================================
    Pesan Kesalahan form akan lebih rapi jika tampil diatas form pada halaman 
  index.php, sehingga pengguna bisa langsung memperbaiki form dengan lebih cepat tanpa 
  perlu men-klik tombol back di web browser.
    Terdapat berbagai takniik yang isa dipakai. Kali ini saya akan me-redict pesan error 
  halaman inde.php melalui query string.
-->
<br>
<h5>Menampilkan Pesan Kesalahan Form</h5>
<?php
  echo "Nami: $nami <br>";
  echo "Nim: $nem <br>";

?>

<!--
//Mengisi Kembali FOrm (form re-populte) ==============================================
    Selain menampilkan pesan error, sebuah form akan lebih use freindly jika terisi
  kembali secara otomatis.
    Sebagai contoh, misalkan saya telah menulis sekolah namun lupa mengisi kolom jurusan.
  Pesan error akan tampil untuk menginfokan bahwa kolom jurusan wajib diisi, namun
  kolom sekolah juga kembali kosong. Ini terjadi karena efek redict halaman akan 
  menghapuskan seluruh isian form. Akan jauh lebih baik jika kolom sekolah langsung 
  terisi dengan nilai yang sudah diinput sebelumnya.
    Untuk membuat hal ini, kita bisa menggunakan beberapa teknik, misalnya dengan
  cookie, atau bisa juga dengan cara menyisipkan hasil form ke dalam query string. 
  Idenya sama seperti cara menampilkan pesan error sebelumnya.
-->
<?php
  //contoh latihan form re-populate
  echo "---  Dengan form re-populate  ---------------------"."<br>";
  echo "Sekolah: $sekolah <br>";
  echo "Jurusan: $jurusan <br>";
  echo "Target: $belajer <br>";
?>








