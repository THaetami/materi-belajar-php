<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>belajar membuat query string</title>
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
        <h1>QUERY STRING</h1>
    </div>    
    <br class="clear">      
    <div class="container">
<!----------------------------------------------------------------------------------->
<!-- Mengirim Pesan Antar Halaman Dengan Query String   
        Dalam prakteknya, query string umum digunakan sebagai sarana "pengirim pesan" 
    antar halaman. Sebagai contoh, buatlah sebuah halaman baru dengan kode program
    berikut:
-->

<!-- Mengirim Pesan Antar Halaman Dengan Query String  -->
    <h5>--- Mengirim Pesan Antar Halaman Dengan Query String ---</h5>
    <?php
      echo "Nama : ".$_GET["nama"]."<br>";
      echo "Alamat : ".$_GET["alamat"]."<br>";
      echo "Umur : ".$_GET["umur"]."<br>";
    ?>
    

  



    </div>
</body>
<script>
</script>
</html>