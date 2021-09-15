<?php
//---------------------------------------------------------------------------------------
//Menampilkan Pesan Kesalahan Form (Materi di Hal. 82proses_formulir.php) ===============
  if (isset($_GET["pesan"])) {
    $pesan = "<p> {$_GET["pesan"]} </p>";
  }
  else {
    $pesan = "";
  }


//--------------------------------------------------------------------------------------
//Mengisi Kembali Form (Form re-populate) (Materi di Hal. 82proses_formulir.php) =======
  //ambil nilai sekolah jika ada
  if (isset($_GET["sekolah"])) {
      $nilai_sekolah = $_GET["sekolah"];
  }
  else {
      $nilai_sekolah = "";
  }

  //ambil nilai jurusan jika ada
  if (isset($_GET["jurusan"])) {
      $nilai_jurusan = $_GET["jurusan"];
  }
  else {
      $nilai_jurusan = "";
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>teknik validasi dengan PHP</title>
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
        <h1>Teknik Validasi dengan PHP</h1>
    </div>    
    <br class="clear">      
    <div class="container">

    <!-- MATERI HALAMAN 81form_formulir.php --->
        <fieldset>
        <legend>Contoh debugging, Function isset(), Mencegah akses ke hal. proses, Function empty</legend>
        <form id="pendaftaran" name="pendaftaran" action="81proses_formulir.php" method="post">
            <p> 
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama"></p>
            <p> 
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim"></p>
            <p>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email"></p>
            
            <p>Target Tahun ini</p>
                <p>
                    <input type="checkbox" name="belajar1" value="HTML" id="html">
                    <label for="html">1. Menguasai HTML</label></p>
                <p>
                    <input type="checkbox" name="belajar2" value="CSS" id="css">
                    <label for="css">2. Paham CSS</label></p>
                <p>
                    <input type="checkbox" name="belajar3" value="PHP" id="php">
                    <label for="php">3. Mastering PHP</label></p>
            <p><input type="submit" value="Proses Data" name="submit"></p>
        </form>
        </fieldset>
    
        <br>
        <p>----------------------------------------------------------------------------</p>
        <br>
    <!-- MATERI HALAMAN 82form_formulir.php --->
        <fieldset>
        <legend>Menampilkan pesan kesalahan form, Form re-population</legend>
        <form id="pendaftaran1" name="pendaftaran1" action="82proses_formulir.php" method="post">
            <p> 
                <label for="nami">Nami : </label>
                <input type="text" name="nami" id="nami"></p>
            <p> 
                <label for="nem">NEM : </label>
                <input type="text" name="nem" id="nem"></p>
            <p> 
                <label for="sekolah">Sekolah : </label>
                <input type="text" name="sekolah" id="sekolah"
                value="<?php echo $nilai_sekolah ?>" ></p> <!-- form re-populate -->
            <p> 
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan"
                value="<?php echo $nilai_jurusan ?>" ></p> <!-- form re-populate -->
            <p>Target Tahun ini : </p>
            <p>
                <input type="checkbox" name="belajer" value="PHP" id="phpid">
                <label for="phpid">Belajar PHP</label></p>
            <p><input type="submit" value="Proses Data" name="submit1"></p>
            <?php echo $pesan ?>
        </form>
        </fieldset>
    </div>

  



    </div>
</body>
<script>
    

   
</script>
</html>