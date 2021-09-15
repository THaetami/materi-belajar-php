
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>date & time function</title>
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
        <h1>DATE & TIME FUNCTION</h1>
    </div>    
    <br class="clear">      
    <div class="container">
<!----------------------------------------------------------------------------------->
<!-- FUNCTION time()   
   Format penulisan:

    time(void) : int

        Fungsi time() mengembalikan nilai angka integer yang disebut dengan unix timestamp.
    Unix timestamp adalah angka dalam satuan detik sejak tanggal 1 Januari 1970, pukul
    00.00.00 GMT (Greenwich Mean Time). Tanggal ini dikenal juga sebagai Unix Epoch.
    Perhitungan tanggal dan waktu seperti ini umum digunakan dalam sistem Unix dan 
    turunannya seperti Linux.
-->

<!-- MENGENAL FUNCTION TIME()  -->
    <h5>--- Mengenal Function time() ---</h5>
    <?php
      echo time(); 
    ?>


<!----------------------------------------------------------------------------------->
<!-- FUNCTION date()   
   Format penulisan:

    date(string $format[, int $timestamp = time()]) : string

        Hasil dari fungsi time() diatas sebelumnya, belum bearti apa-apa jika tidak 
    berbentuk sebuah "tanggal". Untuk menampilkan dan menformat tanggal, PHP 
    menyediakan fungsi date().

        fungsi date() butuh 1 argumen utama dan 1 argumen opsional. Argumen utama diisi
    dengan string yang akan menentukan format tampilan tanggal. Sedangkan argumen kedua
    diisi dengan angka unix timestamp. Apabila argumen kedua tidak ditulis, secara 
    default akan dipakai tanggal sekarang, yakni hasil dari fungsi time().
-->
    
<!-- MENGENAL FUNCTION date()  -->
    <br><br>
    <h5>--- Mengenal Function date() ---</h5>
    <?php
      echo date("d m Y", time());
      echo "<br>";
      echo date("d m Y"); //tanpa argumen kedua (hasilna sama saja)
    ?>
        
    <p>----------------------------------------------------------------------------</p>
        <!--
            dengan mengubah nilai argumen kedua, kita bisa mencari tanggal untuk 
            minggu depan atau kemarin:
        ---> 
    <?php
        //contoh penggunaan (memadukan fungsi time() dan date() )
      $minggu_depan = time() + (7 * 24 * 60 * 60); 
      echo date("d m Y", $minggu_depan);           
      echo "<br>";

      $kemarin = time() - (1 * 24 * 60 * 60);
      echo date("d m Y", $kemarin);
      echo "<br>";
    ?>

<!--
        String "d m Y" yang saya tulis sebagai argumen pertama fungsi date() berguna untuk 
    mengatur fomat tampilan. "d" dipaia untuk menampilkan harii dalam format 2 digit
    angka, "m" berarti utnuk menpilkan blan dalam 2 digut angka, serta "Y" untuk 
    menampilkan tahun dalam format 4 digit angka.
        Selain 3 karakter ini, masih banyak karakter lain yang bisa dipakai. Daftar 
    lengkapnya bisa anda lihat dari PHP Manual: Date Format. Berikut beberapa diantaranya:

    Format angka/nama hari:
     d  : angka hari dengan format 2 digit dan didahului angka nol: 01 hingga 31.
     j  : angka hari dengan format 2 digit dan tanpa angka nol: 1 hingga 31.
     w  : angka hari untuk satu minggu, 0 hingga 6.
     z  : angka hari untuk satu tahun, 0 hingga 365.
     D  : nama hari dengan singkatan 3 karakter bahasa inggris: Sun, Mon, hingga Sat.
     l  : nama hari dalam bahasa inggris: Sunday, Monday hingga Saturday.
     S  : awalan 2 digit karakter dalam bahasa inggris untuk nama hari: st, nd, rd, dan th.

    Format angka/nama bulan:
     m  : angka bulan dengan format 2 digit dan didahului angka nol: 01 hingga 12.
     n  : angka bulan dengan format 2 digit dan tanpa didahului angka nol: 1 hingga 12.
     M  : nama bulan dengan singkatan 3 karakter bahasa inggris: Jan, Feb, hingga Dec.
     F  : nama bulan dalam bahasa inggris: January, February, hingga December.
     t  : total jumlah hari dalam 1 bulan: 28 hingga 31.

    Format angka/nama tahun:
     L  : 1 jika tahun kabisat, 0 jika bukan tahun kabisat.
     Y  : angka tahun dengan 4 digit, seperti 1998, 2002 dan 2021.
     y  : angka tahun dengan 2 digit, seperti 98, 02, dan 21.

    Format angka untuk waktu:
     a  : am atau pm, dengan huruf kecil.
     A  : AM atau PM, dengan huruf besar.
     g  : angka jam dalam format 12 jam, tanpa awalan nol: 1 hingga 12.
     G  : angka jam dalam format 24 jam, tanpa awalan nol: 0 hingga 23.
     h  : angka jam dalam format 12 jam, dengan awalan nol: 01 hingga 12.
     H  : angka jam dalam format 24 jam, dengan awalan nol: 01 hingga 23.
     i  : angka menit dengan awalan nol: 00 hingga 59.
     s  : angka detik dengan awalan nol: 00 hingga 59. 
--->
    <p>----------------------------------------------------------------------------</p>
    <?php
      //berikut contoh penggunaan format date() sebagai argumen pertama fungsi date()
      echo date("jS F Y");
      echo "<br>";
      echo date("l, jS F y");
      echo "<br>";
      echo date("H:i:s");
      echo "<br>";
      echo date("d - m - Y, H:i:s");
      echo "<br>";
      echo date("j F Y, h:i:s A");
      echo "<br>";
    ?>
    <!--
            walaupun namanya fungsi date (yang berarti tanggal), tapi fungsi ini juga dipakai
        untuk menformat tampilan waktu yang terdiri dai jam, menit, dan detik. selain itu
        kita bisa menulis karakter pembatas seperti "-" dan ":" agar tampilan menjadi 
        lebih rapi.
            bagaiman jika ingin menambah karakter lain? kita harus hati2 karena banyak
        karakter yang berfungsi untuk men-format tampilan. solusinya tambahkan
        scape character menggunakan tanda blackslash '\' :
    --->
    <p>----------------------------------------------------------------------------</p> 
    <?php
      echo date("\T\a\\n\g\g\a\l\: d - m - Y");
      echo "<br>";
        /* 
                khusus karakter n, harus di escape 2kali karena "\n" juga memiliki makna 
            didlm string (Newline)
                Untuk menambahkan string sebelum dan sesudah tanggal seperti fungsi 
            di atas, akan lebih rapi jika disambung dari luar fungsi date():
        */
      echo "Tanggal: ".date("d - m - Y");
      echo "<br>";
    /*
          jika kita ingin mengubah nama hari dan bulan menggunakan bahasa indonesia,
        terpaksa dibuat secara manual. 
          Caranya bisa dengan menggunakan kondisi if, case, atau bisa dengan array 
        seperti contoh dibawah ini: 
    */
      $nama_hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
      $nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", 
                     "Agustus", "September", "Oktober", "November", "Desember"];

      $hari = date("w"); //akan menghasilkan angka 0-6 sesuai nama hari, dimana 0 untuk hari minggu, 1 hari senin dst
      $tanggal = date("j"); 
      $bulan = date("n") - 1; //akan menghasilkan angka 1-12 sesuai nama bulan, karna array index dimulai dari index 0, maka hasil date("n") harus dikurangi  1 angka agar pas sebagai key array $nama_bulan
      $tahun = date("Y");

      echo "Tanggal hari ini adalah: $nama_hari[$hari], $tanggal $nama_bulan[$bulan] $tahun";
      echo "<br>";
    ?>



<!----------------------------------------------------------------------------------->
<!-- FUNCTION date_default_timezone_set()   
        Ketika menjalankan fungsi date() untuk menampilkan waktu dalam bentuk jam, 
    menit dan detik, besar kemungkinan anda mendapati hasil yang berbeda dengan waktu 
    yang terdapat di komputer.
        Perbedaan waktu terjadi karena PHP memiliki pengaturan khusus terkait zona 
    waktu (timezone). Untuk melihat pengaturan ini, jalankan phpinfo() kemudian cari 
    label "Default timezone". Gunakan fitur pencarian (CRTL + F) agar mudah ditemukan.
        
        Untuk mengatur default timezone menjadi waktu di Indonesia, terdapat 2 cara: 
    mengubah pengaturan di php.ini atau menggunakan fungsi date_default_timezone_set().

        Sebelum mengubahnya, kita harus cari terlebih dahulu apa nilai yang harus diisi. 
    PHP menyediakan berbagai zona waktu untuk hampir seluruh kota di dunia. Daftar 
    lengkapnya bisa dilihat di web "PHP Manual Timezone" Atau khusus untuk zona Asia bisa 
    ke "https://www.php.net/manual/en/timezones.asia.php".

        Dari daftar di web tersebut, kita bisa menggunakan nilai "Asia/Jakarta" untuk 
    waktu WIB, "Asia/Makassar" untuk waktu WITA, dan "Asia/Jayapura" untuk waktu WIT. 
    Nilai-nilai inilah yang akan diinput ke dalam php.ini atau ke dalam 
    fungsi date_default_timezone_set().
        
        Mengubah sebuah pengaturan dari php.ini akan berdampak ke seluruh server. 
    Jika hanya ingin mengubah zona waktu untuk 1 halaman saja (atau karena satu dan 
    lain hal anda tidak bisa mengakses file php.ini), bisa menggunakan 
    fungsi date_default_timezone_set(). Zona waktu yang akan digunakan ditulis sebagai 
    argumen.
-->

<!-- MENGENAL FUNCTION date_default_timzone_set()  -->
    <br>
    <h5>--- Mengenal Function date_default_timzone_set() ---</h5>
    <?php
      //contoh penggunaannya:
      date_default_timezone_set("Asia/Jakarta"); //waktu WIB
      echo date("d - m - Y, H:i:s");
      echo "<br>";

      date_default_timezone_set("Asia/Makassar"); //waktu WITA
      echo date("d - m - Y, H:i:s");
      echo "<br>";

      date_default_timezone_set("Asia/Jayapura"); //waktu WIT
      echo date("d - m - Y, H:i:s");
      echo "<br>";
      date_default_timezone_set("Europe/Berlin");
    ?>
        <!--
            Fungsi date_default_timezone_set() akan mengatur zona waktu per halaman, 
            namun akan tertimpa jika terdapat pemanggilan kedua fungsi ini:
                
                Dalam kode program di atas saya menampilkan 3 zona waktu Indonesia 
            (WIB, WITA, dan WIT). maka zona Asia/Jayapura yg akan digunakan untuk 
            set waktu selanjutnya..
        --->



<!----------------------------------------------------------------------------------->
<!-- FUNCTION mktime()   
    Format penulisan:

    mktime([ int $hour = date("H")
           [, int $minute = date("i")
           [, int $second = date("s")
           [, int $month = date("n")
           [, int $day = date("j")
           [, int $year = date("Y")
           [, int $is_dst = -1]]]]]]] ) : int

        Tidak perlu pusing melihat format penulisan fungsi mktime() ini. Walaupun 
    panjang, cara kerjanya cukup sederhana. Fungsi mktime() mirip dengan fungsi time() 
    yang sama-sama menghasilkan nilai unix timestamp. Bedanya dalam fungsi mktime() 
    kita bisa mengatur nilai dari unix timestamp yang dihasilkan.
-->

<!-- MENGENAL FUNCTION mktime()  -->
    <br>
    <h5>--- Mengenal Function mktime() ---</h5>
    <?php
        /* sebagai contoh, untuk mencari nilai unix timestamp untuk tanggal 24 Desember 
           2028 pukul 12 lebih 45 menit 35 detik, kita bisa menggunakan kode berikut */
      
      echo mktime(12, 45, 35, 12, 24, 2028); //hasilna 1861242335
      echo "<br>";
        
        /* perhatikan kembali bagaimana penggunaan format penulisan argumen untuk fungsi
           mktime().  
                    mktime(jam, menit, detik, bulan, tanggal, tahun); */

      //nilai unix timestamp ini selanjutnya bisa diinput ke dalam fungsi date():
      $tgl = mktime(12, 45, 35, 12, 24, 2028);
      echo date("d M Y H:i:s", $tgl);
      echo "<br>";
      
      
      //atau bisa juga diinput langsung sebagai argumen kedua dari fungsi date():
      echo date("d M Y H:i:s", mktime(12, 45, 35, 12, 24, 2028)); 
      echo "<br>";
      echo date("d M Y H:i:s", mktime(16, 30, 00, 8, 8, 1945));
      echo "<br>";
      echo date("l, jS F y, H:i:s", mktime(18, 30, 25, 9, 11, 1997));
      echo "<br>";
    //   echo date("d M Y H:i:s", mktime());
    
      /* penggunaan mktime() seperti ini baru berguna jika kita men-generate hasil timestamp
         secara otomatis, misalnya diambil dari database */
    ?>



<!----------------------------------------------------------------------------------->
<!-- FUNCTION getdate()   
    Format penulisan:

    getdate([int $timestamp = time()]) : array

        Fungsi getdate() akan menghasilkan komponen waktu dalam bentuk array. Fungsi ini
    bisa diisi dengan 1 argumen opsional berupa nilai unix timestamp. Jika tidak ditulis,
    nilai akan diambil dari fungsi time(), yakni waktu saat ini.
-->

<!-- MENGENAL FUNCTION getdate()  -->
    <br>
    <h5>--- Mengenal Function getdate() ---</h5>
    <?php
        /* agar seluruh element array hasil pemanggilan fungsi getdate() bisa terlihat, 
           saya akan memakai fungsi print_r(). berikut contoh penggunaannya: */
      date_default_timezone_set("Asia/Jakarta");
      $saat_ini = getdate();

      echo "<pre>";
      print_r($saat_ini);
      echo "</pre>";
      echo "<br>";
           //Array yg dihasilkan adalah associative array dengan berbagai key.

      //kita bisa menampilkan nilainnya menggunakan penulisan array seperti berikut:
      date_default_timezone_set("Asia/Jakarta");
      $merdeka = getdate(mktime(10, 20, 45, 8, 17, 1945));

      echo "Tanggal: {$merdeka["mday"]}-{$merdeka["mon"]}-{$merdeka["year"]}";
      echo "<br>";
      echo "Pukul: {$merdeka["hours"]}:{$merdeka["minutes"]}:{$merdeka["seconds"]}";
      echo "<br>";
        /* komponen tanggal seperti ini juga bisa diambil menggunakan fungsi date().
           namun jika menggunakan date(), kita harus memanggilnya sebanyak 3kali, yakni
           menampilkan tanggal, bulan, dan tahun.  dengan menggunakan fungsi gatedate(),
           pemanggilan fungsi cukup 1 kali saja.
                fungsi getdate() cocok digunakan jika kita butuh memproses setiap element
            tanggal. Namun, apabila hanya ingin menampilkan saja secara keseluruhan, 
            fungsi date() masih lebih praktis.
        */
    ?>



<!----------------------------------------------------------------------------------->
<!-- FUNCTION strtotime()   
    Format penulisan:

    strtotime(string $time[, int $now = time()] ) : int

    Sesuai dengan namanya, fungsi strtotime() bisa dipakai untuk mengkonversi string
    menjadi waktu. Atau lebih tepatnya mengubah string menjadi nilai unix timestamp.
-->

<!-- MENGENAL FUNCTION strtotime()  -->
    <br>
    <h5>--- Mengenal Function strtotime() ---</h5>
    <?php
      $tinggil = getdate(strtotime("01 September 2017")); //pke function getday()
      echo "Hari {$tinggil["weekday"]}, tanggal {$tinggil["mday"]}";
      echo "<br>";

      $tnggl = strtotime("10 September 2021");
      echo $tnggl."<br>"; //

      echo date("d F Y", $tnggl)."<br>"; //

      //yang unik dari fungsi strtotime() adalah, string yang bisa diinput amat beragam. 
      $taanggal = strtotime("last day of next month");
      echo date("d F Y", $taanggal)."<br>"; //

      $tanggall = strtotime("first sunday of mar 2016");
      echo date("d F Y", $tanggall)."<br>"; //

      $tgll = strtotime("1 week ago");
      echo date("jS F y", $tgll)."<br>"; //

      $tggl = strtotime("3 days ago");
      echo date("jS F Y", $tggl)."<br>"; //

      $tgggl = strtotime("+1 week 2 days 4 hours 2 seconds");
      echo date("d F y", $tgggl)."<br>"; //

      $taanggall = strtotime("tomorrow");
      echo date("d F y", $taanggall)."<br>"; //
        /*
            ketika hasilnya adalah unix Epoch, yakni 01 Januari 1970, maka ini 
            dipastikan ada sesuatu yang salah dengan fungsi date().
        */
    ?>
    <p>----------------------------------------------------------------------------</p>
    <?php 
      //yang perlu diperhatikan, fungsi strtotime() kadang ambigu. perhatikan 2 contoh dibawah ini:
      echo date("d M Y", strtotime("11-10-2020")); //pemisah '-' format: tanggal/bulan/tahun 
      echo "<br>";
      echo date("d M Y", strtotime("11/10/2020")); //pemisah '/' format: bulan/tanggal/tahun 
        
        //bagi kita di indonesia, format yang biasa dipakai adalah: tanggal-bulan-tahun
    ?>

    <p>----------------------------------------------------------------------------</p>
    <!--
        Sampai disini kita telah mempelajari 2 buah function untuk mengatur unix timestamp,
        yakni mktime() dan strtotime(). Keduanya bisa dipakai tergantung situasi dan akan
        menghasilkan nilai yang sama:
    ---> 
    <?php
      echo date("d M Y", mktime(0, 0, 0, 8, 17, 2020))."<br>"; //17 aug 2020
      echo date("d M Y", strtotime("17-8-2020"))."<br>"; //17 aug 2020

      echo date("d M Y, H:i:s", mktime(10, 30, 59, 4, 21, 2020))."<br>"; //21 Apr 2020, 10:30:59
      echo date("d M Y, H:i:s", strtotime("21-04-2020 10:30:59"))."<br>"; //21 Apr 2020, 10:30:59
    ?>
        <!--
            anda bebas menggunakan tanggal dengan fungsi mktime() atau strtotime().
            kebanyakan akan menggunakan fungsi strtotime() karena lebih fleksibel.
            Tapi hati-hati dengan HASI AMBIGU SEPERTI PERBEDAAN TANDA '-' DAN '/'
        ---> 




<!----------------------------------------------------------------------------------->
<!-- CASE STUDY: MENGHITUNG SELISIH TANGGAL 
-->
    <br>
    <h5>--- Case Study Menghitung Selisih Tanggal ---</h5>
    <?php
      $tgl1 = strtotime("2-05-2020"); //menghasilkan unix timestamp dalam satuan detik
      $tgl2 = strtotime("7-05-2020"); //menghasilkan unix timestamp dalam satuan detik

      $selisih_tgl = abs($tgl2-$tgl1); //abs() untuk membulatkan (unix timestamp)
      echo $selisih_tgl; //432000
      echo "<br>";

      $satu_hari = 24*60*60; //jumlah unix timestamp dalam 1hari = 86400
      $selisih_hari = $selisih_tgl/$satu_hari;

      echo $selisih_hari; //5
    ?>

    <p>----------------------------------------------------------------------------</p>
    <?php
      //latihan selanjutnya
      $tgl3 = strtotime("9-6-2019"); //unix timestamp = 1560013200 
      $tgl4 = strtotime("12-10-2020"); //unix timestamp = 1602435600 
     

      $slsih_tgl = abs($tgl4 - $tgl3); // 1602435600 - 1560013200 
      echo $slsih_tgl; //selisih unix timestamp $tgl4 dan $tgl3 = 42422400
      echo "<br>";

      //$satu_hari = 24*60*60; //jumlah unix timestamp dalam 1hari = 86400
      $satu_bulan = 30*24*60*60; //jumlah unix timestamp dalam 1bulan dgn asumsi tiap bulan 30hari = 2592000
      $satu_tahun = 365*24*60*60; //jumlah unix timestamp dalam 1tahun dgn asumsi tiap tahun 365hari = 31536000
   

      $selisih_tahun = floor($slsih_tgl/$satu_tahun); // 42422400 / 31536000 = 1,3638 , karna ada floor() maka dibulatkan jadi 1  
      $selisih_bulan = floor(($slsih_tgl - ($selisih_tahun * $satu_tahun)) / $satu_bulan); // (42422400 - (1 * 31536000)) / 2592000 = 4,3666 , karna ada floor() maka dibulatkan jadi 4
      $slsih_hari = floor(($slsih_tgl - ($selisih_tahun * $satu_tahun) - ($selisih_bulan * $satu_bulan)) / $satu_hari); // ((42422400 - (1 * 31536000)) - (4 * 2592000)) / 86400  = 6

      echo "Selisih tanggal adalah $selisih_tahun tahun, $selisih_bulan bulan, $slsih_hari hari"; // 1tahun, 4bulan, 6hari
    ?>

    <p>----------------------------------------------------------------------------</p>
    <?php
    //latihan membuat function cari selisih tanggal
    function cari_selisih_tanggal($tanggal_awal,$tanggal_akhir) {
        $tanggal1 = strtotime($tanggal_awal);
        $tanggal2 = strtotime($tanggal_akhir);

        $selisih_tanggal = abs($tanggal2 - $tanggal1);
        $sehari = 24*60*60;
        $sebulan = 30*24*60*60;
        $setahun = 365*24*60*60;

        $selisih["tahun"] = floor($selisih_tanggal / $setahun);
        $selisih["bulan"] = floor(($selisih_tanggal - ($selisih["tahun"] * $setahun)) / $sebulan);
        $selisih["hari"] = floor(($selisih_tanggal - ($selisih["tahun"] * $setahun) - ($selisih["bulan"] * $sebulan)) / $sehari);

        return $selisih;
    }

    $hasil = cari_selisih_tanggal("12-10-2016","27-10-2016");

    echo "{$hasil["tahun"]} tahun, {$hasil["bulan"]} bulan, {$hasil["hari"]} hari"."<br>";

    $hasil1 = cari_selisih_tanggal("12-10-1995","12-10-2016");

    echo "{$hasil1["tahun"]} tahun, {$hasil1["bulan"]} bulan, {$hasil1["hari"]} hari"."<br>";

    $hasil2 = cari_selisih_tanggal("11-09-1997","now");

    echo "{$hasil2["tahun"]} tahun, {$hasil2["bulan"]} bulan, {$hasil2["hari"]} hari"."<br>";
    ?>



<!----------------------------------------------------------------------------------->
<!-- DateTime Object  
        Untuk membuat sebuah datetime object, gunakan fungsi date_create() seperti contoh 
    berikut ini:
                    < ?php
                    $tunggul = date_create("17-08-2020");
                    echo $tunggul;
                    ?> 
                    //Fatal error: Uncaught Error: Object of class DateTime could not be converted to string 

    Argumen untuk fungsi date_creat() sama seperti fungsi strtotime(), jadi kita bisa
    mengisinya dengan string lain seperti "tommorow" atau "next week".

    Error pada contoh diatas terjadi karena saya menampilkan isi dari variable $tunggul 
    dengan perintah echo. Di dalam PHP, sebuah object tidak bisa langsung diakses seperti 
    ini. Untuk menampilkan nilai datetime object, bisa memakai fungsi datetime_format():
-->

<!-- MENGENAL DateTime Object  -->
    <br>
    <h5>--- Mengenal DateTime Object ---</h5>
    <?php
      $tonggol = date_create("20-10-2013");
      echo date_format($tonggol, "jS M y")."<br>";

      $tenggel = date_create("04/14/1998");
      echo date_format($tenggel,"l, dS F Y")."<br>";

      $tngil = date_create("next week");
      echo date_format($tngil,"d M Y")."<br>";
    ?>



<!----------------------------------------------------------------------------------->
<!-- function date_diff() 
        Sama seperti fungsi cari_selisih_tanggal() yang sudah di rancang sebelumnya, 
    fungsi date_diff() juga butuh 2 buah argumen yang harus diisi dengan tanggal. 
    Bedanya, tanggal ini harus berupa datetime object. Selain itu fungsi date_diff() 
    akan mengembalikan hasil dalam bentuk object, bukan array. Berikut contoh 
    penggunaannya:
-->

<!-- MENGENAL function date_diff()  -->
    <br>
    <h5>--- Mengenal function date_diff() ---</h5>
    <?php
      $tgl6 = date_create("17-2-2007");
      $tgl7 = date_create("19-8-2020");

      $beda = date_diff($tgl7, $tgl6);

      echo "<pre>";
      print_r($beda);
      echo "</pre>";
      echo "<br>";
      /*
        untuk sementara, anda bisa menganggap bahwa object ini tidak lain sebuah 
        associative array, sebagaimana layaknya array, saya menggunakan fungsi print_r()
        untuk menampilkan isi dari object ini.
            Hasil dari fungsi date_diff() sangat lengkap dan detail. untuk menampilkan
        selisih tanggal kita bisa mengakses nilai "d", "m", dan "y" 
      */
      
      
      //contoh pengaksesan nilai2/property ini;
      $tgl8 = date_create("1-8-1945");
      $tgl9 = date_create("25-1-2023");

      $beda0 = date_diff($tgl9, $tgl8);

      echo $beda0-> y;
      echo "<br>";
      echo $beda0-> m;
      echo "<br>";
      echo $beda0-> d;
      echo "<br>";
      echo "selisih waktu adalah {$beda0-> h}jam : {$beda0-> s}menit : {$beda0-> i}detik";
      echo "<br>";
      /*
        saya menggunakan tanda panah "->" untuk mengakses property dlm object ini,
        property ini juga bisa diakses langsung dari dalam string.
      */
    ?>


<!----------------------------------------------------------------------------------->
<!-- Case Study: Refactoring Fungsi cari_selisih_tanggal() -->
    <br>
    <h5>--- Case Study: Refactoring Fungsi cari_selisih_tanggal() ---</h5>
    <?php
    //latihan
    function car1_selisih_tanggal($tglawal, $tglakhir){
        $awal = date_create($tglawal);
        $akhir = date_create($tglakhir);

        $s3lisih_tgl = date_diff($akhir, $awal);

        $s3lisih_tgl->y;
        $s3lisih_tgl->m;
        $s3lisih_tgl->d;

        return $s3lisih_tgl;
    }

    $hsl = car1_selisih_tanggal("12-10-1996","19-1-2017");
    echo "selisih tanggal adalah = {$hsl->y}tahun, {$hsl->m}bulan, {$hsl->d}hari";
    echo "<br>";

    $hsl = car1_selisih_tanggal("12-10-2020","27-10-2020");
    echo "selisih tanggal adalah = {$hsl->y}tahun, {$hsl->m}bulan, {$hsl->d}hari";
    echo "<br>";

    $hsl = car1_selisih_tanggal("12-10-1995","now");
    echo "selisih tanggal adalah = {$hsl->y}tahun, {$hsl->m}bulan, {$hsl->d}hari";
    echo "<br>";
    ?>

    </div>
</body>
<script>
</script>
</html>