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
      $nama = "Dewi & Thia";
      $alamat = "Bandung";
      $umur = "23";

      $query_string = "?nama={$nama}&alamat={$alamat}&umur={$umur}";
    ?>
    <a href="70queryString_proses.php<?php echo $query_string; ?>">Link menuju Halaman Proses</a>
    
    <!--
        ketika hasilnya dilihat dari web browser, hasil data yang ditampilkan untuk
        variable nama hanya 1, yakni "Dewi". Padahal saya mengirim 2buah nama didalam
        query string: "Dewi & Thia". Apa yang terjadi?
            Ini karena penggunaan ampersand (&)  yg terdapat dalam string ("Dewi & Thia).
        seperti yang sudah kita pelajari, tanda "&" juga dipakai sebagai karakter 
        pembatas query string. Ketika menemukan query string '?nama=Dewi & Thia'.
        PHP bingung dan menganggap tanda '&' sebagai pemisah nilai, bukan sebagai bagian 
        dari string. 
            Untuk mengatsi masalah ini, kita harus mengubah karakter '&' menjadi 
        'karakter lain' agar tidak dianggap sebagai pembatas query string. PHP 
        menyediakan fungsi urlencode() dan rawurlencode().
    ---> 



<!----------------------------------------------------------------------------------->
<!-- Function urlencode() & rawurlencode()
        Fungsi urlencode() dan rawurlencode() berguna untuk mengubah  karakter khusus
    di dalam query string menjadi 'karakter lain' agar bisa diproses sebagai nilai 
    varible. Karakter khusus ini disebut sebagai URL Reserved Character.
        Selain tanda "&" terdapat beberapa karakter lain yang bisa menjadi masalah pada
    saat ditulis dalam query string.

    Berikut daftar karakter URL Reserved Character.
    [!]  [*]  [']  [(]  [)]  [;]  [:]  [@]  [&]  [=]  [+]  [$]  [,]  [/]  [?]  [#]  
    [[]  []]

        Agar karakter2 diatas dapat dianggap sebagai bagian dari varibel, kita harus 
    mengkonversinya menjadi percent-encoded. Percent-encoded dibuaat dari gabungan
    karakter %, kemudian diikuti dengan nomor ASCII atau 26 heksadesimal. Dengan 
    demikian, percent-encode untuk karakter '&' adalah %26.

    ! = %21     # = %23     & = %26     ' = %27     ( = %28     ) = %29     * = %2A

    + = %2B     , = %2C     / = %2F     : = %3B     = = %3D     ? = %3F     @ = %40
    
    [ = %5B     ] = %5D             


    Menggunakan PHP, kita tidak perlu menulis karakter ini secara manual. Fungsi 
    urlencode() dan rawurlencode() akan melakukan secara otomatis.

        Perbedaan mendasar antara kedua fungsi ini adalah pada saat menerjemahkan karakter
    'spasi' Fungsi urlencode() akan mengkonversi karakter spasi menjadi tanda tambah
    (+). Sedangkan fungsi rawurlencode() akan mengkonversi karakter spasi menjadi
    percent-encode "%20" .

-->

<!-- Mengenal urluncode()  -->
    <br><br>
    <h5>--- Mengenal urluncode() dan rawurlencode---</h5>
    <p>contoh urlencode</p>
    <?php
      $nama = urlencode("Aming & Agus");
      $alamat = urlencode("Bandung & Semarang");
      $umur = urlencode("23");

      $query_string = "?nama={$nama}&alamat={$alamat}&umur={$umur}";
    ?>
    <a href="70queryString_proses.php<?php echo $query_string; ?>">Link menuju Halaman Proses</a>
    
    <p>-----------------------------------------------------------------------------</p>
    <p>contoh rawurlencode</p>
    <?php
      $nama = rawurlencode("Omar & Nina");
      $alamat = rawurlencode("Rangkas & Serang");
      $umur = rawurlencode("30");

      $query_string = "?nama={$nama}&alamat={$alamat}&umur={$umur}";
    ?>
    <a href="70queryString_proses.php<?php echo $query_string; ?>">Link menuju Halaman Proses</a>
    
    <!--
        Sama seperti fungsi urldecode(), PHP juga menyediakan fungsi rawulrdecode() untuk
        mengembalikan percent-encoded dke dalam bentuk asalnya (proses decoding).

            Seperti yang sudah kita lihat, perbedaan urlencode() dan rawurlencode() 
        hanya pada saat memproses karakter spasi. Keduannya diproses dengan sempurna oleh
        web browser.

            Sebaiknya fungsi rawurlencode() digunakan untuk memproses alamat URL seebelum 
        tanda "?", yakni bagian query string, sebaiknya menggunakan fungsi urlencode()
        
    ---> 

    <p>---------------------------------------------------------------------------</p>
    
    <?php
      $alamat_folder = rawurlencode("70queryString_proses.php");
      $nama = urlencode("Ria amelia & Echa Putri");
      $alamat = urlencode("Jakarta Selatan");
      $umur = urlencode("25 & 34");
      $url = "{$alamat_folder}?nama={$nama}&alamat={$alamat}&umur={$umur}";

      echo $url."<br>";
    ?>

    <a href="<?php echo $url; ?>">Link Rahasia</a>



    </div>
</body>
<script>
</script>
</html>