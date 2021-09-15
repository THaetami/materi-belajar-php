<?php
//MEMBUAT TAG HTML DARI ARRAY PHP
$almt_link = ["home.php" ,"kategori.php", "artikel.php", "shop.php", "login.php"];
$jdl_link = ["Link ke Halaman Home", "Link ke Halaman Kategori", 
             "Link ke Halaman Artikel", "Link ke Halaman Shop", 
             "Link ke Halaman Login"];

//latihan selanjutnya (menggunakan looping)
$link_adrres = ["home.php" ,"kategori.php", "artikel.php", "shop.php", "login.php"];
$tajuk_link = ["Home", "Kategori", "Artikel", "Shop", "Login"];
?>

<?php
//Menampilkan Associative Array PHP
$siswa = ["siswa1" => array ("Joko","Medan","12 Agustus 1998"),
          "siswa2" => array ("Rini","Jakarta","22 Juli 1999"),
          "siswa3" => array ("Alex","Bandung","9 Januari 2000"),
          "siswa4" => array ("Joy","Samarinda","4 Maret 1998"),
          "siswa5" => array ("Santi","Palembang","12 Desember 1999"),]
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menggabungkan HTML dan PHP</title>
    <link href="csslatihan.css" rel="stylesheet">
    <style>
        /* .lat ul { list-style: none; width: 13%; margin-bottom: 10px; }
        .lat li a { border-bottom: 2px solid #FFF; padding-left: 10px; background-color: green; color: white; line-height: 20px; font-size: 0.8em; text-decoration: none; display: block; }
        .lat li a:hover { background-color: #0AED0A; color: black; } */
    </style>
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
        <h1>Menggabungkan HTML dan PHP</h1>
    </div>    
    <br class="clear">      
    <div class="container">

<!-- =================================================================================
    MEMBUAT TAG HTML DARI PHP -->
    <h5>Membuat Tag HTML dari PHP</h5>
    <?php
    //contoh tag HTML digenerate dari PHP
    echo "<a href=home.php>Link ke Halaman Home</a>"."<br>"; //penulisan atribut tanpa double qoute seperti ini memang valid dan tidak salah, akan tetapi wajib hukumnya jika atribut HTML terdiiri dari beberapa kata yang dipisah dengan spasi, misalnya class = "satu dua tiga"
    echo "<a href='home.php'>Link ke Halaman Home</a>"."<br>";
    echo '<a href="home.php">Link ke Halaman Home</a>'."<br>"; //perintah echo menggunakan tanda kutip satu, memiliki kelemahan yakni kehilangan kemampuan untuk menampilkan variable secara langsung; 
    echo "<a href=\"home.php\">Link ke Halaman Home</a>"."<br>"; //menggunakan escape carakter
    ?>
        <!-- memisahkan tag HTML dengan bagian yang harus dibuat dari PHP   -->
    <a href="<?php echo "home.php"; ?>"><?php echo "Link ke Halaman Home"."<br>" ?></a>
    <br>

    
<!-- ==================================================================================
     MEMBUAT TAG HTML DARI VARIABLE PHP 
    latihan selanjutnya membuat isi tag HTML dari sebuah variable PHP.
-->
    <h5>Membuat Tag HTML dari Variable PHP</h5>
    <?php
    $alamat_link = "home.php"; //biasanya ini ditulis di atas tag pembuka HTML
    $judul_link = "Link ke Halaman Home"; //biasanya ini ditulis di atas tag pembuka HTML
    ?>
    <a href="<?php echo $alamat_link ?>"><?php echo $judul_link ?></a>
    <br><br>
    <!-- 
         Ini adalah gaya penulisan PHP di dalam HTML, dimana saya menggunakan 2 kali
        perintah echo untuk menampilkan setiap variable secara terpisah.
         Ketika kode PHP bergabung dengan HTML seperti ini, biasanya bagian PHP berada
        di sisi paling atas halaman, yakni tag pembuka HTML: <!DOCTYPE html>..
     -->


     
<!-- ==================================================================================
     MEMBUAT TAG HTML DARI ARRAY PHP 
    Tidak ada masalah dengan menampilkan variabel ke dalam tag HTML, tapi bagaimana 
    dengan cara menampilkan hasil dari sebuah array? Kita akan masuk ke latihan 
    berikutnya.
-->
    <h5>Membuat Tag HTML dari Array PHP</h5>
    <?php
    echo "<a href=\"$almt_link[0]\">$jdl_link[0]</a>"."<br>";
    echo "<a href=\"$almt_link[1]\">$jdl_link[1]</a>"."<br>";
    ?>
     <!-- dibawah ini merupakan bentuk PHP di dalam HTML -->
    <a href="<?php echo $almt_link[2] ?>"><?php echo $jdl_link[2] ?></a>
    <br>
    <a href="<?php echo $almt_link[3] ?>"><?php echo $jdl_link[3] ?></a>
    <br>
    <a href="<?php echo $almt_link[4] ?>"><?php echo $jdl_link[4] ?></a>
    <br>

    <p>-----menggunakan looping----------------------------------------------------</p>
    <!-- latihan selanjutnya (menggunakan looping) -->
    <?php
    for ($i=0; $i < count($link_adrres); $i++){ //fungsi count untuk menghitung jumlah element dlm suatu array
        echo "<a href=\"$link_adrres[$i]\">$tajuk_link[$i]</a>";
        echo "<br>";
    }
    ?>

    <p>-----menggunakan looping (cara penulisan lainnya)-------------------------</p>
    <!-- alternatif cara penulisan lainnya -->
    <div class="clear">
    <div class="lat">
        <ul>
            <?php
            for ($i=0; $i < count($link_adrres); $i++){
            ?>
                <li>
                <a href="<?php echo $link_adrres[$i] ?>"><?php echo strtoupper($tajuk_link[$i]) ?></a> <!-- strtoupper() digunakan untuk mengkonversi teks string menjadi huruf besar -->
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <br>


    <h5>Menampilkan Associative Array PHP</h5>
    <?php
    //menampilkan Asssociative Array PHP
    echo $siswa["siswa1"][0];
    echo $siswa["siswa1"][1];
    echo $siswa["siswa1"][2];
    echo "<br>";
    //bagaimana cara menyatukan 3baris menjadi 1baris?
    echo $siswa["siswa2"][0].$siswa["siswa2"][1].$siswa["siswa2"][2]; //menggunakan concatination
    echo "<br>";
    //bagaimana jika ingin ada karakter pembatas diantara ketiga element array?
    echo $siswa["siswa3"][0]."-".$siswa["siswa3"][1]."-".$siswa["siswa3"][2]; //menambah string "-"
    echo "<br>";
    //cara kedua untuk menampilkan associative array, yakni menggunakan kurung kurawal { dan } untuk memebedakan antara array dgn string. dibawah contohnya:
    echo "{$siswa["siswa4"][0]}-{$siswa["siswa4"][1]}-{$siswa["siswa4"][2]}";
    echo "<br>";
    ?>

    <br>
    <p>-----latihan menampilkan menggunakan looping foreach------------------------</p>
    <?php
      foreach ($siswa as $value){
          echo "<p>{$value[0]}-{$value[1]}-{$value[2]}</p>";
      }
    ?>

    <br>
    <p>-----latihan menampilkan Associative Array ke dalam tabel HTML -------------</p>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
        </tr>
        <?php
          $i = 1;
          foreach ($siswa as $nilai){
            echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>{$nilai[0]}";
                    echo "<td>{$nilai[1]}";
                    echo "<td>{$nilai[2]}";
            echo "</tr>";
            $i++;
          }
        ?>
    </table>

    <br>
    <p>-----latihan dengan CSS ----------------------------------------------------</p>
    <div class="lat1">
        <table class="lat2">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
            </tr>
            <?php
            $i = 1;
            foreach ($siswa as $nilai){
                echo "<tr>";
                            echo "<td>".str_pad($i,2,0,STR_PAD_LEFT)."</td>";
                            echo "<td>".strtoupper($nilai[0])."</td>";
                            echo "<td>".ucfirst($nilai[1])."</td>";
                            echo "<td>{$nilai[2]}</td>";
                echo "</tr>";
                $i++;
            }
            ?>
        </table>
    </div>

    </div>
</body>
<script>
</script>
</html>