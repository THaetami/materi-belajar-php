<?php
  // cek apakah ukuran file melewati batas maksimal post_max_size (Kode Error 1) 
  if ($_SERVER['REQUEST_METHOD']=='POST' && empty($_FILES) && empty($_POST)) {
     $post_max = ini_get('post_max_size'); 
     $pesan_error = "Ukuran file melewati batas maksimal ({$post_max}B)";
  }

  if (isset($_POST["submit"])) {

     $username      = strip_tags(htmlentities(trim($_POST["username"])));
     $password    = strip_tags(htmlentities(trim($_POST["password"]))); 
 

      session_start();
      $_SESSION["username"] = $username;
      setcookie("nama", "Tatang Haetami");
     
      header("Location: 101materiCookie.php");
 
  }
  else {
     $username = "";
     $password = "";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form upload</title>
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
        <h1>MATERI COOKIE DAN SESSION</h1>
    </div>    
    <br class="clear">      
    <div class="container">

    <h2>Materi Cookie dan Session</h2>
    <div class="clear">

    <form id="session_cookie" action="100CookieSession.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Buku Tamu</legend>
        <p>
         <label for="username">Username:</label>
         <input type="text" name="username" id="username" value="<?php echo $username ?>"> <output id="pesan_username"></output>
        </p>
        <p>
         <label for="password">Password:</label>
         <input type="password" name="password" id="password" value="<?php echo $password ?>"> <output id="pesan_pass"></output>
        </p>
        <p><input type="checkbox" name="cek_pass" id="cek_pass"><label for="cek_pass">Tampilkan Password</label></p>
        <p>
      </fieldset>
      <br>
      <input type="submit" name="submit" value="Posting Komentar">
    </form>

    </div>
</body>
<script>
    var materi = document.getElementById("session_cookie");
    var usernameNode = document.getElementById("username");
    var pesanUsernameNode = document.getElementById("pesan_username");
    var passNode = document.getElementById("password");
    var pesanPassNode = document.getElementById("pesan_pass");
    var cekPassNode = document.getElementById("cek_pass");


    console.log(usernameNode);

    function deleteError(e) {
       e.target.style.border = "";
       e.target.nextSibling.nextSibling.innerHTML = "";
       e.target.nextSibling.nextSibling.className = "";
    }

    function cekPass(e) {
       if (cekPassNode.checked) {
          passNode.type = "text";
       }
       else {
          passNode.type = "password";
       }
    }

    function diSubmit(e) {
       //validasi username
       var usernameError = "";

       if (usernameNode.value === "") {
          usernameError = "Username harus diisi";
       }
       else if (usernameNode.value !== "admin") {
          usernameError = "Username tidak sesuai";
       }
       if (usernameError !== "") {
         pesanUsernameNode.innerHTML = usernameError;
         pesanUsernameNode.className = "error";
         usernameNode.style.border = "2px solid red";
          e.preventDefault();
       }
       else {
          pesanUsernameNode.innerHTML = "Sesuai";
          pesanUsernameNode.className = "valid";
          usernameNode.style.border = "2px solid green";
       }

      //validasi password
      var passError = "";

      if (passNode.value === "") {
         passError = "Password harus diisi";
      }
      else if (passNode.value !== "rahasia") {
         passError = "Password tidak sesuai";
      }
      if (passError !== "") {
      pesanPassNode.innerHTML = passError;
      pesanPassNode.className = "error";
      passNode.style.border = "2px solid red";
      e.preventDefault();
      }
      else {
         pesanPassNode.innerHTML = "Sesuai";
         pesanPassNode.className = "valid";
         passNode.style.border = "2px solid green";
      }
    }

    materi.addEventListener("submit",diSubmit);
    usernameNode.addEventListener("focus",deleteError);
    passNode.addEventListener("focus",deleteError);
    cekPassNode.addEventListener("click",cekPass);



   
</script>
</html>