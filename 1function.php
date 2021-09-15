<?php
declare(strict_types=1);
?>
<!-- STRICT MODE  
    strict mode adalah ruang lingkup kode program dengan aturan yang lebih ketat. 
    Di dalam strict mode, type declaration harus diinput dengan tipe data yang sesuai, 
    jika tidak PHP akan menampilkan pesan error.
-->
<!----------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>belajar function</title>
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
        <h1>FUNCTION DALAM PHP</h1>
    </div>    
    <br class="clear">      
    <div class="container">
<!----------------------------------------------------------------------------------->
<!-- VARIADIC FUNTION   
        Variadic Function adalah sebutan untuk fungsi yang bisa menerima banyak argumen.
     Umumnya sebuah fungsi butuh argumen yang jumlahnya sudah ditentukan. Namun dalam
     beberapa situasi, kita ingin membuat fungsi yang bisa menerima banyak argumen. 
     Jumlah argument ini bisa 0, 2, 5, bahkan 100 untuk 1 function.
* istilah variadic function kadang disebut juga sebagai variabel-length argument list, 
  yakni fungsi yang memeilki jumlah argumnet yang berubah-ubah (variable-length). 
-->

<!-- MEMBUAT VARIADIC FUNCTION DENGAN FUNGSI BAWAAN PHP  -->
    <h5>--- MEMBUAT VARIADIC FUNCTION DENGAN FUNGSI BAWAAN PHP ---</h5>
    <?php
    function penambahan(){
        $array_argumen = func_get_args(); //func_get_args(): fungsi ini akan mengembalikan nilai seluruh argumen dalam bentuk Array
        $jumlah_argumen = func_num_args(); //func_num_args(): fungsi ini akan mengembalikan jumlah argumen dalam pemanggilan fungsi, apakah 1 argumen, 3 argumen, atau 10 argumen. Hasilnya dalam bentuk angka.
        $nilai_argumen_ke_2 = func_get_arg(1); //func_get_arg(no_urut_argumen): fungsi ini akan mengembalikan nilai dari argumen pada nomor urut yang diberikan.

        echo "Array Argumen: ";
        print_r($array_argumen);
        echo "<br>";

        echo "Jumlah Argumen:  $jumlah_argumen <br>";
        echo "Nilai Argumen:  $nilai_argumen_ke_2 <br>";
    }

    penambahan(1,2);
    echo "<br>";
    penambahan(5,4,3,2,1);
    echo "<br>";
    penambahan(0,6,8,19);
    ?>

    <p>---------------------------------------------------------------------------</p>
    
    <?php
    //contoh latihan, mencari total penambahan dari semua argumen
    function jumlahkan(){
        $daftar_argumen = func_get_args(); //function variadic bawaan php
        $total = 0;

        foreach ($daftar_argumen as $value){ //looping foraech , 
            $total = $total + $value;
        }
        return $total;
    }
    
    echo jumlahkan(1,2);
    echo "<br>";
    echo jumlahkan(5,4,3,2,1);
    echo "<br>";
    echo jumlahkan(0,6,8,19);
    ?>
    

<!-- MEMBUAT VARIADIC FUNCTION DENGAN SPLAT OPERATOR 
    Splat operator adalah sebutan untuk karakter titik tiga kali, yakni '...', 
    operator ini kadang disebut juga sebagai spread syntax.
    Ketika digunakan di dalam argumen fungsi, splat operator bisa dipakai untuk menampung
    semua argument yang ditulis, kurang lebih sama seperti fungsi func_get_args().
-->
    <h5>--- MEMBUAT VARIADIC FUNCTION DENGAN SPLAT OPERATOR ---</h5>
    <?php
    function jumlah(...$daptar_argumen){ //splat operator
        print_r($daptar_argumen);
    }
    echo jumlah(5,6,7);
    echo "<br>";
    echo jumlah(7,4,2,6,1,10,45);
    echo "<br>";
    echo jumlah(7,3,9,1,9,0,1,4,2,5);
    ?>

    <p>---------------------------------------------------------------------------</p>

    <?php
    //latihan menghitung total argumen, menggunakan looping foreach
    function tmbahkan(...$davtar_argumen){

        $hsl = 0;
        foreach ($davtar_argumen as $value){
            $hsl += $value;
        }
        return $hsl;
    }
    echo tmbahkan(3,7,5,21,5,6,);
    echo "<br>";
    echo tmbahkan(3,6,71,2,8);
    echo "<br>";
    echo tmbahkan(1,3,4);
    echo "<br>";
    ?>

    <p>---------------------------------------------------------------------------</p>
    <!-- Splat operator ini juga tidak harus untuk seluruh argumen, tapi juga bisa 
         ditempatkan di posisi lain, misalnya di argumen kedua -->
    <?php
    function salam($waktu,...$siapa){

        $nama = "";
        foreach ($siapa as $value){
            $nama = "$nama $value, ";
        }
        return "selamat $waktu $nama";
    }

    echo salam("siang","andi","risa","alex","yoga");
    echo "<br>";
    echo salam("malam","andi","risa","alex");
    echo "<br>";
    echo salam("sore","andi","risa");
    echo "<br>";
    ?>

    <p>---------------------------------------------------------------------------</p>
    <!-- splat operator ini juga bisa dipakai untuk menginput nilai argumen yang
         ditulis dalam bentuk array -->
    <?php
    function slm($waktu,...$siapa){

        $nama = "";
        foreach ($siapa as $value){
            $nama = "$nama $value, ";
        }
        return "selamat $waktu $nama";
    }

    $a = ["siang","amir","riko","kotib","kondi"];
    echo slm(...$a);
 
    ?>


<!----------------------------------------------------------------------------------->
<!-- TYPE DECLARATION  
    Type declaration atau dikenal juga sebagai type hinting adalah sebuah cara untuk
    memberitahu PHP agar sebuah argument harus memenuhi syarat tipe data tertentu. 
    Dengan type declaration, kita bisa membatasi jenis tipe data yang masuk ke dalam 
    sebuah fungsi. 
-->
    <h5>--- MEMBUAT FUNCTION DENGAN TYPE DECLARATION ---</h5>
    <?php
        /* Sebagai bahan praktek, saya akan membuat sebuah fungsi pangkat().
           fungsi ini berguna untuk mencari hasil pemangkatan sebuah angka; */
    function pangkat($nilai_dasar, $nilai_pangkat){
        $hasil = 1;
        for ($i = 1; $i <= $nilai_pangkat; $i++){ //perulangan (for) yg akan dijalankan sejumlah $nilai_pangkat
            $hasil = $hasil * $nilai_dasar; //setiap looping kalikan $nilai_dasar dan simpan ke dlm variable $hasil
        }
        return $hasil; 
    }

    echo pangkat(3,3)."<br>";
    echo pangkat(4,4)."<br>";
    echo pangkat(9,2)."<br>";
    ?>

    <p>---------------------------------------------------------------------------</p>
    <!-- Kita juga bisa menjalankan fungsi pangkat() untuk nilai pecahan atau float -->
    <?php
    function pangkt($nilai_dasar, $nilai_pangkat){
        $hasil = 1;
        for ($i = 1; $i <= $nilai_pangkat; $i++){ //perulangan (for) yg akan dijalankan sejumlah $nilai_pangkat
            $hasil = $hasil * $nilai_dasar; //setiap looping kalikan $nilai_dasar dan simpan ke dlm variable $hasil
        }
        return $hasil; 
    }

    echo pangkt(3.3,3)."<br>";
    echo pangkt(4.5,4)."<br>";
    echo pangkt(5.12,2)."<br>";
    ?>  

    <p>-----menggunakan type declaration-------------------------------------------</p>
    <!-- Fungsi diatas berjalan sebagaimana mestinya. Tapi sekarang saya ingin membatasi 
        bahwa fungsi pangkat() hanya bisa menerima tipe data integer saja, yakni hanya 
        bisa menerima angka bulat.
         Terdapat beberapa cara untuk membuat pembatasan seperti ini, misalnya dengan 
        memeriksa isi dari setiap argumen di dalam fungsi. PHP menyediakan fungsi 
        bawaan is_int() yang bisa dipakai untuk mencari tau apakah sebuah variabel 
        berisi tipe data integer atau tidak.
         Atau alternatif yang lebih praktis adalah menggunakan type declaration. 
        Caranya, tulis inisial tipe data sebelum penulisan argument seperti contoh 
        berikut: -->
    <?php
    function pngkt(int $nilai_dasar, int $nilai_pangkat){ 
        /* Yang dimaksud dengan type declaration adalah tambahan keyword int di awal 
           deklarasi argumen: pangkat(int $nilai_dasar, int $nilai_pangkat). Dengan 
           tambahan ini, PHP akan mengkonversi nilai untuk argument $nilai_dasar dan 
           $nilai_pangkat ke dalam tipe integer, yakni sesuai dengan tipe data int. 
****   Selain int, kita juga bisa menulis float, bool atau string tergantung kebutuhan. 
    PHP otomatis akan mengkonversi nilai argument yang dikirim sesuai dengan tipe 
   datanya. */
        $hasil = 1;
        for ($i = 1; $i <= $nilai_pangkat; $i++){ 
            $hasil = $hasil * $nilai_dasar; 
        }
        return $hasil; 
    }

    echo pngkt(3,3)."<br>";
    echo pngkt(4,4)."<br>";
    echo pngkt(5,2)."<br>";
    ?>  
    
    <p>-----cara lain penulisan type declaration-----------------------------------</p>
    <?php
    //cara lain penulisan type declaration
    function pangkad($nilai_dasar, $nilai_pangkat):float{ //keyword float dimaksud dengan type declaration
        $hasil = 1;
        for ($i = 1; $i <= $nilai_pangkat; $i++){ 
            $hasil = $hasil * $nilai_dasar; 
        }
        return $hasil; 
    }

    echo pangkad(3.3,3)."<br>";
    echo pangkad(4.5,4)."<br>";
    echo pangkad(5.12,2)."<br>";
    ?>  



<!----------------------------------------------------------------------------------->
<!-- UNION TYPE DECLARATION  
    Union type declarations merupakan fitur baru di PHP 8. Ini adalah fitur tambahan 
  untuk type declaration yang baru saja kita bahas.
    Sebelumnya dalam type declaration, argumen dan nilai kembalian fungsi bisa dibatasi 
  untuk 1 tipe data. Dengan tambahan union, tipe data tersebut bisa dibuat menjadi 2 
  jenis atau lebih.
    Melanjutkan contoh fungsi pangkat(), argumen $nilai_dasar dan $nilai_pangkat 
  hanya bisa menerima tipe data integer saja, dan akan error jika di isi tipe data lain 
  (JIKA DALAM MODE STRICT).
    Dengan fitur union type declarations, kita bisa buat batasan agar argumen menerima 
  nilai integer dan float sekaligus. Caranya, satukan penulisan tipe data dengan 
  karakter pipe " | " seperti contoh berikut: 
-->
    <h5>-- UNION TYPE DECLARATION --</h5>
    <?php
    function angkat(int|float $nilai_dsr, int $nilai_pnkt) {
        $hsl = 1;
        for ($i = 1; $i <= $nilai_pnkt; $i++){
            $hsl = $hsl * $nilai_dsr;
        }
        return $hsl;
    }

    echo angkat(3,3)."<br>";
    echo angkat(4.8,3)."<br>";
    echo angkat(5.1,3)."<br>";
    echo angkat(6,3)."<br>";
    ?>
    <!-- 
        Dalam contoh di atas, fungsi angkat() bisa mengembalikan nilai dalam bentuk 
        tipe integer atau float.
        Kita juga bisa membuat union dengan nilai null jika situasinya butuh kondisi 
        tersebut:
                    function foo(int|null $bar,...) { .. }

        Dengan deklarasi di atas, parameter $bar bisa menerima angka bulat atau nilai 
        null. 
        Penulisan gabungan tipe data dengan nilai null ini ternyata cukup sering 
        dipakai sehingga PHP menyediakan format penulisan khusus. Caranya, tambah satu 
        karakter tanda tanya "?" sebelum penulisan tipe data seperti 
        contoh berikut:
                            function foo(?int $bar,...) {
                                //...
                            }

        Kode ?int $bar sama artinya dengan int|null $bar, dimana parameter $bar bisa 
        menerima integer atau nilai null. Ini juga bisa ditulis sebagai tipe kembalian 
        fungsi:
                    function foo($bar,...): ?int {
                        //...
                    }
        
        Penulisan di atas berarti function foo() boleh mengembalikan suatu nilai 
        bertipe int atau nilai null. Selain itu juga tersedia juga keyword mixed 
        sebagai type hint:
                            function foo(mixed $bar,...) {
                                //...
                            }
        
        Type hint mixed ini artinya "bisa menerima semua tipe data yang ada di PHP", 
        termasuk juga nilai null. Atau lebih tepatnya sama dengan union type berikut:

        function foo(string|int|float|bool|null|array|object|callable|resource $bar) {
            //...
        }

    -->    



<!----------------------------------------------------------------------------------->
<!-- NAMED ARGUMENTS 
        Named arguments adalah istilah untuk menyebut cara pengiriman nilai dari argumen 
    ke parameter function dengan menulis nama argumen, tidak sekedar nilainya saja. Named
    arguments ini sering juga disebut sebagai keyword arguments.
        Dengan menggunakan named arguments, kita tidak harus bergantung kepada urutan 
    argumen pada saat memanggil sebuah fungsi. Urutan argumen bisa ditulis acak selama 
    nama argumen sama dengan nama parameter.
--> 
    <h5>-- NAMED ARGUMENTS --</h5>
    <?php
    function pangkadd($nilai_dasar, $nilai_pangkat){
        $hasil = 1;
        for ($i = 1; $i <= $nilai_pangkat; $i++){
            $hasil *= $nilai_dasar;
        }
        return $hasil;
    }

    echo pangkadd(5,3)."<br>";
    echo pangkadd(nilai_dasar:7,nilai_pangkat:2)."<br>";
    echo pangkadd(nilai_pangkat:3,nilai_dasar:4)."<br>";
    ?>




<!----------------------------------------------------------------------------------->
<!-- ANONYMOUS FUNCTION (LAMBDA) 
        Anonymous function adalah fitur bahasa pemrograman dimana kita bisa membuat 
    sebuah fungsi yang tidak memiliki nama. Fitur ini biasa digunakan untuk fungsi 
    hanya sekali pakai, dimana kita yakin fungsi itu tidak diperlukan di tempat lain 
    (hanya di 1 tempat saja). Anonymous function dikenal juga dengan istilah lambda.
--> 
    <!-- salah satu fitur function anonymous adalah untuk callback..
            callback dipakai untuk menyebut function yang ditempatkan sebagai argument. 
        Salah satu contoh function yang butuh callback adalah fungsi array_walk() bawaan PHP.
            Function array_walk() dipakai untuk memproses isi sebuah array. Fungsi ini 
        butuh 2 argument, dimana argument pertama berupa array asal, dan argument kedua 
        berupa callback.
        Berikut contoh penggunaannya:    
    -->
    <h5>-- ANONYMOUS FUNTION : --</h5>
    <p>-----contoh digunakan untuk callback-----------------------------------------</p>
    <?php
    $siswa = ["satu" => "Andri", "dua" => "Joko", "tiga" => "Sukma", "empat" => "Rina"];

    function tampil($a, $b){
        echo "Element ke $b berisi $a <br>";
    }

    array_walk($siswa, "tampil"); 
    ?>



<!----------------------------------------------------------------------------------->
<!-- CLOSURE  
    Closure adalah anonymous function yang bisa mengakses variabel di luar scope-nya.
        Dalam beberapa materi sebelum ini kita telah membahas perbedaan antara global 
    scope dan local scope, dimana sebuah function memiliki "dunianya sendiri". Dari 
    dalam function kita tidak bisa mengakses variabel yang didefinisikan di luar 
    function, dan ini juga berlaku untuk anonymous function:
--> 
    <h5>-- CLOUSER : --</h5>
    <?php
    $a = 'Andi';

    $salam = function(){
        global $a;
        echo "Selamat siang $a <br>";
    };

    $salam();
        /** memang dengan tambahan keyword global kita bisa mengakses variable ($a)
        *   yg berada diluar local scope function, namun penggunaan keyword global ini
        *   membawa konsekuensi baru. Jika di dalam function variable $a ini isinya
        *   dimodif, itu juga akan mengubah isi variable $a secara global,
        *   perhatikan contoh dibawah ini;;  
        **/

    $b = "Amir";

    $salum = function(){
        global $b;
        echo "Selamat siang $b <br>"; //Amir
        $b = 'Fika'; //variable $b diluar scope function diubah
        echo "Selamat siang $b <br>"; //Fika
    };

    $salum();
    echo "Selamat siang $b <br>"; //Fika
    ?>
    <!-- 
         Apakah ada cara lain untuk mengirim isi variabel diluar function scope  
         tanpa harus membuat 'resiko' nilainya bisa diubah? 
         Salah satu solusi kita bisa saja saya menginput variable tsb sebagai argumen. 
         Tapi PHP menyediakan cara yang lebih elegant, yakni dengan keyword use. 
         Berikut contoh penggunaannya:
    -->
    
    <?php
    $c = 'Andi';

    $salim = function() use ($c){ //ini adalah closure
        echo "Selamat Siang $c <br>";
        $c = 'Juned';
        echo "Selamat Siang $c <br>";
    };

    $salim();
    echo "Selamat Siang $c";
    
    ?>



<!----------------------------------------------------------------------------------->
<!-- ARROW FUNCTION
   arrow functions, yakni cara singkat untuk menulis anonymous functions dan closure.
--> 
    <h5>-- ARROW FUNCTION : --</h5>

    <?php
    $d = fn() => "selamat siang";

    echo $d();
    echo "<br>";
    /** 
     *  function seperti ini tidak butuh tanda kurung kurawal sebagai block function,
     *      Isi dari function juga hanya bisa 1 statment saja sampai ditemukan tanda 
     *  titik koma sebagai penutup baris, 
     *      Tanda panah "=>" secara tidak langsung bermakna seperti perintah return, 
     *  sehingga harus disambung dgn suatu nilai, tidak bisa disambug dgn perintah lain 
     *  seperti echo.  
    **/
    ?>

    <!-- Arrow function bisa menerima argumen atau parameter yg didefinisikan dalam
        tanda kurung setelah keyword "fn" seperti contoh berikut:
    -->
    <?php
    $salem = fn($a,$b) => "Selamat $a $b";

    echo $salem("malam","sari");
    echo "<br>";
    /**
     * Karena penulisan arrow function tidak ada tanda kurung kurawal, 
     * ini berarti tidak ada blok kode program terpisah. Dengan demikian kode di dalam 
     * arrow function tetap bisa mengakses variabel dari luar 
     * (tidak butuh perintah use seperti layaknya closure):
    **/
    ?>


    </div>
</body>
<script>
</script>
</html>