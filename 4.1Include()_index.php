<!-- ==================================================================================
    MEMECAH HALAMAN HTML
        Apabila anda pernah membuat website dengan HTML dan CSS saja (tanpa PHP), 
    tentunya bisa menyadari bahwa dalam setiap halaman, terdapat bagian yang selalu 
    sama dan diulang-ulang, seperti bagian header, sidebar, dan footer. 
    Pada setiap halaman, yang bertukar hanyalah konten utamanya saja. Jika kita ingin 
    menambah 1 menu, setiap halaman juga harus diubah satupersatu karena kode header 
    ada di setiap file.
        PHP menyediakan solusi untuk hal ini, yaitu dengan memecah atau membagi 
    halaman menggunakan fungsi include() dan required().
--->


<!-- ==================================================================================
    FUNCTION INCLUDE()
       Fungsi include() bisa dipakai untuk memasukkan (menginput) kode dari file lain 
    ke dalam halaman saat ini. File yang akan diinput tidak harus file .php, tapi 
    bisa juga file .html biasa.

        Argumen dari fungsi include() adalah alamat dan nama file yang ingin diinput. 
    Alamat ini harus sesuai dengan struktur folder. Misalnya dalam contoh di dibawah ini, 
    file 40Include()_header.html dan file 42Include()_footer.html harus berada di dalam 
    folder yang sama dengan file ini " 41Include()_index.php "

        Secara teknis, kita bisa menggunakan alamat absolut 
    seperti: "https://www.duniailkom/header.html" atau alamat relatif 
    seperti "folderku/filehtml/header.html". Argumen ini harus ditulis dalam tanda 
    kutip (tipe data string).

        Selain itu, bukan sebuah file HTML (header.html dan file footer.html) yg bisa 
    di include. Namun perintah include ini bisa dipakai untuk jenis file apa saja, 
    termasuk file .php, .css maupun .js.

        Pada umumnya file yang di-include adalah file PHP, karena besar kemungkinan kita 
    juga ingin menyisipkan kode PHP di bagian header dan footer.

        PHP juga tidak membatasi berapa banyak file yang di include.

        Fungsi include() juga sering dipakai untuk menginput file/kode PHP yang berisi 
    kumpulan function.

        Trik paling umum adalah, membuat sebuah fungsi untuk koneksi ke database, 
    misalnya fungsi koneksi() yang disimpan ke dalam halaman function.php. 
    Jika ada halaman lain yang ingin mengakses database, tinggal men-include file ini 
    dan kita langsung terhubung ke database.


        Perintah include() sebenarnya juga bukanlah function murni, tapi sebuah language
    construct. Oleh karena itu terdapat penulisan lain dari include, yakni tanpa tanda 
    kurung seperti contoh berikut:
        
        < ?php
            include "function.php";
            include 'header.php";
        ?>
--->


<!-- ==================================================================================
    FUNCTION include_once()
        Selain fungsi include(), PHP juga menyediakan fungsi include_once(). Perbedaan 
    mendasar pada fungsi include_once() adalah, fungsi ini memastikan file yang di 
    include hanya 1 kali.

        Ketika kita menginclude file yg sama sebanyak 2kali maka PHP akan protes dan 
    mengeluarkan pesan Fatal Error : cannot redeclare, tapi dengan menggunakan 
    function include_once(), tidak akan terjadi error.

        Selain meng-include sebuah file ke halaman lain, fungsi include_once() akan 
    memeriksa apakah file yang sama sebelumnya telah di-include. Jika sudah, tidak 
    perlu di include lagi. Artinya, file yang sama tidak akan di-include lebih dari 
    sekali.
--->


<!-- ==================================================================================
    FUNCTION required() dan required_once()
       PHP juga memiliki 2 buah fungsi lain yang mirip dengan include(), yakni required() 
    dan required_once(). Keduanya sama-sama berfungsi untuk menginput file lain ke dalam 
    kode PHP saat ini. Jadi, dimana letak perbedaannya?

        Fungsi required() akan mengeluarkan pesan Fatal Error jika file yang ingin 
    diinput tidak bisa diakses (atau filenya memang belum ada), sedangkan fungsi 
    include() hanya akan mengeluarkan Warning saja.

        Warning adalah tipe error yang rendah. Jika mendapati warning, PHP tetap lanjut 
    untuk menjalankan kode PHP berikutnya. Anda dapat melihat teks konten serta bagian 
    footer tetap tampil.

        Selain warning, terdapat "Fatal error". Fatal error adalah pesan error level 
    tinggi. Jika menemukan error ini, PHP sepenuhnya berhenti memproses halaman.

        Fungsi require() cocok dipakai untuk menginput file yang memang sangat penting, 
    yang jika tidak ditemukan PHP harus berhenti.

        Sedangkan untuk fungsi require_once(), hampir sama dengan include_once(), 
    dimana PHP akan memeriksa terlebih dahulu apakah sebelumnya file sudah di input 
    atau belum.
--->


<?php 
    //bagian Header
    require("4.0Include()_header.php"); 
    include("4.2Include()_function.php"); //menginclude file yang berisi kumpulan function
?>
    <!-- 
        dengan function include(), file 40Include()_header.html akan tersambung dgn
        file (script/halaman) ini " 41Include()_index.php " 
    --->



<div class="container">
    <h5>Pengenalan Function Include</h5>
    <?php 
      echo salam("Ronny")."<br>"; 
      echo salam("Tatang Haetami");
    ?> <!-- function salam() ini dpt langsung diakses karena pada baris 44 kita telah mengginclude file yang berisi kumpulan function -->




</div>



<?php
    //bagian footer
    include("4.3Include()_footer.php");
    // include_once("4.2Include()_function.php");
    echo koneksi("root");
?>
    <!-- 
        dengan function include(), file 43Include()_footer.html akan tersambung dgn
        file (script/halaman) ini " 41Include()_index.php " 
    --->