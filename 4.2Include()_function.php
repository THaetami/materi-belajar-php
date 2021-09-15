 <!--
     FILE YG BERISI KUMPULAN FUNCTION
     ini adalah file HTML (bagian function) yang akan disambungkan dengan 
     file 41Include()_index.php menggunakan function include() dari PHP
 -->
<br>
<?php
    function salam($nama){
        return "Selamat datang $nama";
    }
    // function author($name){
    //     return "copyright 2021 $name";
    // }
    function koneksi($user){
        return "Koneksi ke MySQL dengan user $user Berhasil";
    }
?>
