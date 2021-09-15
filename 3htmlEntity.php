<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>html entity</title>
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
        <h1>HTML ENTITY</h1>
    </div>    
    <br class="clear">      
    <div class="container">

<!-- ==================================================================================
    PENGENALAN HTML ENTITIY 
        HTML entity adalah cara penulisan karakter menggunakan simbol khusus agar tidak
    diterjemahkan oleh web browser sebagai bagian dari kode HTML. Selain itu kita 
    juga bisa memakai HTML entity untuk menulis karakter lain yang tidak tersedia 
    di keyboard seperti lambang copyright "©", lambang trademark "™", atau karakter 
    mata uang seperti euro "€".
        Sebagai contoh, tanda "<" bisa diganti menjadi "&lt;", tanda ">" menjadi "&gt;" , 
    dan tanda "&" menjadi "&amp;" .
--->
    <h5>Pengenalan HTML Entity</h5>
    <?php
        $klmt = "tag <table> digunakan untuk membuat tabel di HTML"; 
        echo $klmt."<br>";
        $klmt1 = "tag <a href=\"index.php\">, digunakan untuk membuat link</a>";
        echo $klmt1."<br>";
        //tag <tabel> dan tag <href="index.php"> diatas tidak akan tampil/terbaca di web browser, alias akan dianggap atau diproses sebagai bagian dari kode HTML
    ?>

    <p>-----menggunakaan entity html------------------------------------------------</p>
    <?php
        $kalimat1 = "tag &lt;table&gt; digunakan untuk membuat tabel di HTML";
        echo $kalimat1."<br>";
        $kalimat2 = "tag &lt;a href=&quot;index.php&quot;&gt;, digunakan untuk membuat link";
        echo $kalimat2."<br>";
    ?>
    <!-- 
        daripada mengubah manual karakter khusus ini, PHP menyediakan fungsi 
        htmlspecialchars() dan htmlentities().
    --->


<!-- ==================================================================================
    FUNCTION htmlspecialchars()
        Fungsi htmlspecialchars() bisa dipakai untuk mengkonversi 4karakter khusu yang 
    menjadi 'masalah' di HTML. karakter tersebut adalah:
  * '&' (ampersand) akan diproses menjadi &amp;
  * '<' (less than) akan diproses menjadi &lt;
  * '>' (greater than) akan diproses menjadi &gt;
  * '"' (double quote) akan diproses menjadi &quot;
--->
    <br>
    <h5>FUNCTION htmlspecialchars()</h5>
    <?php
        //contoh penggunaannya:
        $kalimat3 = htmlspecialchars("tag <table> digunakan untuk membuat tabel di HTML");
        echo $kalimat3;
    ?> 
    <br>
    <?php
        $kalimat4 = htmlspecialchars("tag <a href=\"index.php\">, digunakan untuk membuat link");
        echo $kalimat4;
    ?>
    <!-- 
        Agar hasil dari fungsi htmlspecialchars() dapat terlihat, kita harus memeriksanya
        dari source code HTML yang dijalankan oleh web browser. ini karena karakter
        "<" dan "&lt;" sama-sama ditampilkan sebagai "<".   
    --->


<!-- ==================================================================================
    FUNCTION htmlspecialchars_decode()
        Walaupun jarang digunakan, tersedia fungsi untuk membalik karakter HTML entity
    kembali bentuk asalnya, yakni dengan fungsi htmlspecialchars_decode():
--->
    <br><br>
    <h5>FUNCTION htmlspecialchars_decode()</h5>
    <?php
        $kalimat5 = htmlspecialchars("tag <a href=\"index.php\">, digunakan untuk membuat link </a>");
        echo $kalimat5;
    ?> <!-- mengkonversi menjadi HTML Entity -->
    <br>
    <?php
        $kalimat5_decode = htmlspecialchars_decode($kalimat5); //akan mengkonversi HTML Entity menjadi karakter biasa
        echo $kalimat5_decode;
    ?> <!-- mengkonversi HTML Entity ke karakter biasa -->



<!-- ==================================================================================
    FUNCTION htmlentities()
        Fungsi htmlspecialchars() hanya akan mengkonversi 4 karakter saja,  
    yakni " < " , " > " , " & " dan " " ". 
        Sedangkan fungsi htmlentities() akan mengubah seluruh karakter khusus HTML.
--->
    <br><br>
    <h5>FUNCTION htmlentities()</h5>
    <?php
        $kalimat6 = "Sedang sarapan & \"minum kopi\" seharga £5.00 di café starbuck™";
        echo $kalimat6; 
    ?><br> <!-- karakter ditampilkan apa adanya -->

    <?php
        echo htmlspecialchars($kalimat6); 
    ?><br> <!-- hanya karakter (") dan (&) yg dikonversi -->

    <?php
        echo htmlentities($kalimat6); 
    ?><br> <!-- tak hanya karakter (") dan (&) yg dikonversi, karakter khusu lain seperti ( £ ), ( é ) dan ( ™ ) juga akan dijadikan HTML entity. -->
    <!--
            Tapi, kenapa kita harus repot-repot menggunakan fungsi ini? Bukankah ketiganya 
        tampil sama?
            Ini karena web browser yang saya gunakan cukup update dan bisa menampilkan 
        karakter khusus secara langsung. Untuk web browser lawas dan belum mendukung 
        karakter Unicode UTF 8, hasilnya akan tampak berbeda:
            Kasus seperti ini memang cukup jarang karena mayoritas web browser modern 
        sudah update dan mendukung karakter khusus yang ditulis langsung.
    --->


<!-- ==================================================================================
    FUNCTION html_entity_decode()
        html_entity_decode() yang bertujuan untuk mengembalikan karakter yang sudah 
    dikonversi kembali ke bentuknya semula:
--->
    <br>
    <h5>FUNCTION html_entity_decode()</h5>
    <?php
        $kalimat7 = htmlentities("Sedang sarapan & \"minum kopi\" seharga £5.00 di café starbuck™");
        echo $kalimat7;
    ?> <!-- mengkonversi menjadi HTML Entity -->
    <br>
    <?php
        $kalimat7_decode = html_entity_decode($kalimat7); //akan mengkonversi HTML Entity menjadi karakter biasa
        echo $kalimat7_decode;
    ?> <!-- mengkonversi HTML Entity ke karakter biasa -->

    </div>
</body>
<script>
</script>
</html>