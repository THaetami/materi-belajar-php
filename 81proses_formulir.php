<?php
    //cara lain Mencegah Akses ke halaman proses.php teknik 2
  if (!isset($_POST["submit"])) { //jika hal. proses.php tdk menemukan variable $_POST["submit"], 
      header("location: 80form_index.php"); //maka akan langsung di redict ke index.php(tempat form berada)
      die();
  }
  /*
    kode diatas akan bekerja ketika kita mengakses halaman 81form_formulir.php secara langsung
    tanpa melalui halaman 80form_index.php..
    
  */
?>
<h1>Halaman Proses (81proses_formulir.php)</h1>
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
        <h1>Teknik Validasi dengan PHP</h1>
    </div>    
    <br class="clear">      
    <div class="container">
<!--
    Dibawah ini akan membahas berbagai teknik yang bisa dipakai untuk proses validasi 
    Form.
---> 

<!--
//FUNCTION isset() ===================================================================
    Function isset() dipakai untuk memeriksa apakah sebuah variable telah terdefinisi atau 
  tidak. Fungsi ini berguna untuk memastikan sebuah isian form siap diproses.

    ketika anda mengklik tombol proses Data tanpa mengisi form, akan terdapat error.
  Error ini berasal dari checkbox "belajar". 

    Untuk mencari letak masalahnya, kita akan lakukan proses debugging. Cara yg paling 
  praktis yakni dengan memeriksa variable $_GET dan $_POST menggunakan printah
  print_r atau var_dump().  

    Fungsi isset() mengembalikan boolean true jika variabel itu ada, atau false jika 
  variabel tersebut tidak ada.
-->
<?php
  print_r ($_POST); //contoh debugging. 
  echo "<br>";
?>

<br>
<h5>Function isset()</h5>
<?php
  //contoh penggunaan Function isset() u/ checkbox
  if (isset($_POST["belajar1"])) { //jika variabel belajar1 ada, maka jalankan echo.. apabila tidak ada, maka perintah echo berhenti
        echo "Target ke 1: ".$_POST["belajar1"]."<br>"; //
  }
?>


<!--
//MENCEGAH AKSES KE HALAMAN proses.php ================================================
    pada pembahasan ini, kita menggunakan 2buah halaman, yakni index.php dan proses.php
  Halaman index.php berisi form HTML, dan halaman proses.php berisi kode program untuk
  memproses form dan menampikan hasilnya. Ini juga berarti bahwa halaman proses.php 
  diakses secara tidak langsung. dan apabila halaman proses.php diakses secara
  langsung, akan menampilkan error seperti kasus checkbox diatas. 
-->
<br>
<h5>Mencegah Akses Ke Halaman proses.php</h5>
<?php 
  // if (isset($_POST["submit"])) { //Mencegah akses ke halam proses.php teknik satu
    echo "Nama: ".$_POST["nama"]."<br>";
    echo "NIM: ".$_POST["nim"]."<br>";
    
    if (isset($_POST["belajar2"])) { //contoh penggunaan Function isset() u/ checkbox
      echo "Target ke 2: ".$_POST["belajar2"]."<br>";
    }
  // }
  // else {
  //   echo "Halaman ini hanya bisa diakses dari form!"; //Mencegah akses ke halam proses.php teknik satu
  // }
?>


<!--
//FUNCTION empty() ====================================================================
    Validasi berikutnya yang akan saya bahas adalah memeriksa apakah sebuah inputan form
  sudah diisi atau tidak. Untuk kebutuhan ini, kita bisa menggunakan fungsi empty().

    Function empty() akan menghasilkan nilai true ketika sebuah variable tidak berisi
  apa-apa. Namun karena PHP mengkonversi sebuah tipe data menjadi data lain, 
  "tidak berisi apa-apa" ini mencakup beberapa kondisi, berikut isi variable yang dianggap
  kosong oleh fungsi empty():
-->
<br>
<h5>Function empty()</h5>
<?php
  //String kosong
  $test = "";
  var_dump(empty($test)); echo "<br>";

  //integer 0
  $test = 0;
  var_dump(empty($test)); echo "<br>";

  //float 0.0
  $test = 0.0;
  var_dump(empty($test)); echo "<br>";

  //String "0"
  $test = "0";
  var_dump(empty($test)); echo "<br>";

  //Null
  $test = NULL;
  var_dump(empty($test)); echo "<br>";

  //array kosong 
  $test = array();
  var_dump(empty($test)); echo "<br>";

  //variable yg blum berisi nilai
  $test;
  var_dump(empty($test)); echo "<br>";
?>

<br>
<p>----  contoh penggunaan function empty() ------------------------------------------</p>
<?php
  //contoh penggunaan function empty()
  $email= trim($_POST["email"]); //functin trim() berfungsi untuk menghapus karakter whitespace di sisi kiri dan kanan sebuh string.
      
  if (empty($email)) {
    echo "Email wajib diisi <br>";
  }
  else {
    echo "Email : $email <br>";
  }

  if (empty($_POST["belajar3"])) {
    echo "Target ke 3 wajib di ceklis <br>";
  }
  else {
    echo "Target ke 3 ".$_POST["belajar3"]. "<br>";
  }
?>









