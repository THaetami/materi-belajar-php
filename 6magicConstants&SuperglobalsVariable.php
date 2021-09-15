<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>magic constans & superglobals variable</title>
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
        <h1>magic constans & superglobals variable</h1>
    </div>    
    <br class="clear">      
    <div class="container">

<!-- 
        Di dalam PHP, terdapat beberapa konstanta dan variable khusus yang memiliki status 
    sebagai 'magic' dan 'SuperGlobal'. Di sebut seperti itu karena konstanta dan 
    variable ini di-generate otomatis oleh PHP. Keduanya juga bisa diakses dari mana 
    saja, baik di global scope maupun local scope seperti di dalam function.
-->

<!-- Magic Constant PHP  
    Terdapat 8 konstanta yang menyandang nama sebagai magic constans di dalam PHP.
    Konstanta ini bisa diakses dari mana saja. Berikut ke-8 konstanta tersebut:

        Satu hal yang bisa langsung diperhatikan, seluruh konstanta ini diawali dan 
    diakhiri oleh dua buah tanda spasi "__". Penamaan seperti ini dirancang agar 
    menghindari bentrok dengan konstanta yang umum dipakai (yang dibuat oleh 
    programmer sendiri). Oleh karena alasan ini pula sebaiknya kita tidak membuat 
    konstanta yang diawali dua buah tanda spasi.

        Secara umum, seluruh konstanta ajaib (magic constants) berguna untuk memberikan
    informasi terkait posisi ketika perintah tersebut dipanggil.

    __LINE__ = berisi nomot baris
    __FILE__ = berisi alamat lengkap dan nama File
    __DIR__ = berisi nama folder (directory)
    __FUNCTION__ = berisi nama function pada saat konstanta dipanggil
    __CLASS__ 
    __TRAIT_
    __METHOD__
    __NAMESPACE__

-->
    <h5>Magic Constant</h5>
    <?php
      //contoh penggunaan magic constant
    function ada_ada_saja(){
        return "Teks ini berasal dari fungsi: ".__FUNCTION__;  
    }

      echo "Teks ini berada di baris ".__LINE__."<br>";
      echo "Alamat lengkap file ini adalah : ".__FILE__."<br>";
      echo "File ini berada di folder: ".__DIR__."<br>";
      echo ada_ada_saja()."<br>";
    ?>
        <!--
                Dari hasil yang diperoleh, terlihat bahwa setiap konstanta akan memberikan
            hasil tergantung posisinya saat ini. 
                Magic constants biasanya digunakan untuk proses debugging (pencarian kesalahan)
        ---> 
    


<!-- Superglobals Variable
        Superglobals Variable adalah variable khusus yng juga bisa diakses kapan saja dan
    dimana saja sepanjang kode program. isi dari variable ini di generate secara 
    otomatis oleh PHP.

    Terdapat 9 superglobals variable:
    *   $GLOBALS
    *   $_SERVER
    *   $_GET
    *   $_POST
    *   $_FILES
    *   $_COOKIE
    *   $_SESSION
    *   $_REQUEST
    *   $_ENV

        Juga bisa diperhatikan cara penulisan variable ini. Hampir semua superglobals 
    variable PHP diawali dengan karakter "$_". Oleh karena itu sebaiknya kita juga
    tidak menulis cariabel dengan karakter seperti ini.
        Seluruh suprglobal variable (kecuali $GLOBALS) berhubungan dengan "lingkungan luar"
    PHP. Sebagai contoh, hasil inpuran form HTML bisa diakses dari variable $GET dan $POST,
    atau variable $_COOKIE yang bisa dipekai untuk mengambil informasi yang tersimpan
    di cookie web browser.
---> 


<!-- SUPERGLOBALS VARIABLE $GLOBALS
    Jika variable superglobals lain dipakai untuk mengambil data dari luar ke dalam PHP
    variable $GLOBALS berfungsi untuk mengakses variable global dari local scope, seperti
    dari dalam sebuah function.
--->
    <br>
    <h5>SUPERGLOBALS VARIABLE $GLOBALS</h5>
    <?php
      //fungsi variable $GLOBALS ini hampir sama dengan fungsi keyword global seperti contoh dibawah ini:
      $hari = "senin";

      function nama_hari(){
          global $hari; //dgn keyword global kita bisa mengakses variable diluar function (global scope)
          return "Sekarang hari $hari";
      }

      echo nama_hari();
      echo "<br>";

      //dengan variable superglobals $GLOBALS, kita juga bisa melakukan hal yang sama:
      $poe = "selasa";
      function nama_poe(){
          return "Sekarang hari {$GLOBALS["poe"]}";
      }

      echo nama_poe(); 
      echo "<br>";

      //kita juga bisa menukar nilai variable $poe dari dalam function, berikut contohnya:
      function ganti_poe(){
          $GLOBALS["poe"] = "Jum'at";
        //   return "Sekarang hari {$GLOBALS["poe"]}";
      }

      ganti_poe();
      echo "sekarang hari $poe"."<br>"; //hasilnya, variable $poe juga akan berubah ketika diakses dari luar function
    ?>


<!-- SUPERGLOBALS VARIABLE $_ENV
        Variabel $_ENV berisi informasi tentang environment atau lingkungan pemrograman. 
    Di sistem operasi Windows, variabel ini tidak berisi nilai apa-apa. Namun jika 
    diakses di sistem Unix seperti Linux, $_ENV berisi informasi seperti nama user 
    yang menjalankan kode program. Karena saya tidak bisa mencontohkan dan penggunaannya 
    juga tidak banyak, mari kita lanjut ke variabel superglobal berikutnya.
--->



<!-- SUPERGLOBALS VARIABLE $_SERVER
       Variabel superglobals $_SERVER berisi informasi server dan informasi web browser 
    yang digunakan pengunjung. Kebanyakan informasi ini berasal dari HTTP Header yang 
    dikirim dari dan ke web server. Sama seperti variabel superglobals lain, informasi 
    ini disusun ke dalam sebuah associative array.

        Untuk melihat seluruh informasi yang ada di dalam variable $_SERVER, kita bisa 
    menggunakan fungsi print_r(). Berikut contoh kode programnya:
--->
    <br>
    <h5>SUPERGLOBALS VARIABLE $_SERVER</h5>
    <?php
      echo "<pre>";
      print_r($_SERVER);
      echo "</pre>";
        /*
            seperti yang terlihat, cukup banyak informasi yang ada dalam variable 
            $_SERVER . sebagian besar memang tidak terlalu jelas fungsinya karena butuh
            pembahasan lebih lanjut, namun terdapat beberapa variable yang bermanfaat:
        */
    ?>
    <br><br>
    <p>----------------------------------------------------------------------------</p>
    <?php
      echo "HTTP_HOST = {$_SERVER["HTTP_HOST"]} <br>"; //berisi informasi mengenai nama server. karena kita mengaksesnya secara local, isi dari variable ini adalah localhost.

      echo "HTTP_USER_AGENT = {$_SERVER["HTTP_USER_AGENT"]} <br>"; /*   Berisi informasi tentang web browser yang digunakan pengunjung. 
                                                                     Hasil yang didapat lengkap beserta nomor versi serta informasi lain.
                                                                     Informasi ini bisa dipakai untuk membedakan tampilan web, misalnya jika 
                                                                     pengujung menggunakan web browser Mozilla Firefox tampilkan halaman A, atau jika menggunakan 
                                                                     Google Chrome tampilkan halaman B, dst. Teknik mencari jenis web browser ini dikenal juga
                                                                     dengan istilah browser sniffing. */

      echo "SERVER_SOFTWARE = {$_SERVER["SERVER_SOFTWARE"]} <br>"; /*   Berisi informasi mengenai software yang digunakan sebagai server. Informasi ini termasuk versi 
                                                                      web server serta aplikasi yang memproses kode program. */

      echo "SERVER_ADDR = {$_SERVER["SERVER_ADDR"]} <br>"; /* Berisi informasi mengenai alamat IP server. Karena halaman ini saya jalankan dari localhost, hasilnya adalah ::1. 
                                                              Ini merupakan penulisan alamat IP versi 5 dari localhost. Jika halaman di atas saya jalankan dari web hosting, 
                                                              hasilnya bisa berupa alamat IP server hosting seperti 199.32.11.01. */

      echo "DOCUMENT_ROOT = {$_SERVER["DOCUMENT_ROOT"]} <br>"; //Berisi informasi nama folder tempat file yang sedang dijalankan. Hasilnya variable ini sama dengan magic constant __DIR__
      echo "SCRIPT_FILENAME = {$_SERVER["SCRIPT_FILENAME"]} <br>"; //Berisi informasi alamat lengkap file. ini sama dengan isi magic constant __FILE__
      echo "REQUEST_URI = {$_SERVER["REQUEST_URI"]} <br>"; //Berisi informasi tentang alamat yang diminta oleh pengunjung.

      echo "PHP_SELF = {$_SERVER["PHP_SELF"]} <br>"; /* Berisi informasi tentang alamat file, relatif kepada root folder. 
                                                        Root folder adalah istilah yang digunakan untuk menyebut folder paling awal di dalam sebuah web
                                                        server. Di dalam XAMPP, folder tersebut adalah folder htdocs. Seluruh dokumen harus di
                                                        letakkan pada folder ini agar bisa diakses. */

      echo "SERVER_SIGNATURE = {$_SERVER["SERVER_SIGNATURE"]} <br>"; //Berisi signature atau informasi mengenai web server,
    ?>

    <br>
    <p>-----------------------------------------------------------------------------</p>
    <?php
      //latihan membuat browser sniffing, teknik ini dilakukan untuk mengatasi perbedaan fitur pada tiap2 browser, terutama pada dukungan kode CSS dan JavaScript
      
      $cari = strpos($_SERVER["HTTP_USER_AGENT"],"Firefox"); //strpos() dipakai untuk mencari posisi sebuah string atau karakter di dalam string lain. argumen pertama adalah string sumber, argumen kedua berupa string yang ingin dicari.
      if ($cari == true){
          echo "Anda menggunakan web browser Mozzila Firefox";
      }
      else {
          echo "Anda tidak menggunakan web browser Mozzila Firefox";
      }
    ?>



<!-- SUPERGLOBALS VARIABLE $_GET
       Superglobals variable $_GET biasa dikenal sebagai variabel global penampung nilai 
    form. Tapi sebenarnya variabel ini juga bisa di set tanpa melalui form.

        Secara sederhana, variabel $_GET berisi nilai yang ditulis ke dalam query string. 
    Query string adalah sebutan untuk karakter tambahan di belakang URL atau di 
    belakang penulisan alamat dari sebuah situs.
    Sebagai contoh, perhatikan penulisan URL atau link dibawah ini:

    http://www.duniailkom.com?s=php

    setelah alamat situs http://www.duniailkom.com terdapat tambahan teks ?s=php . 
    tambahan teks inilah yang disebut sebagai query string. Karakter tanda tanya (?)
    berfungsi sebagai pembatas dari alamat situs dengan query string.

    dalam contoh diatas, saya mengirimm data "php" melalui variable "s" ke dalam halaman
    www.duniailkom.com. Nilai "php" ini bisa diakses dari variable $_GET["s"].

      dibaawah ini contohnya
--->
    <br><br>
    <h5>Mengenal SUPERGLOBALS VARIABLE $_GET</h5>
    <?php
      print_r($_GET);
    ?>

    <p>----------------------------------------------------------------------------</p>
    <?php
      $nama=$_GET["nama"];
      $alamat=$_GET["alamat"];

      echo "Nama Siswa = $nama";
      echo "<br>";
      echo "Alamat Siswa = $alamat";
    ?>

    </div>
</body>
<script>
</script>
</html>