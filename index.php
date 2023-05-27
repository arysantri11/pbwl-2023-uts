<?php
session_start();

require_once "inc/Koneksi.php";
require_once "vendor/autoload.php";

// memanggil package filp whoops
$whoops = new Whoops\Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
$whoops->register();

if (isset($_SESSION['user'])) {
      $namaAwal = explode(" ", $_SESSION['user']['user_nama']);
      $_SESSION['user']['user_namaAwal'] = $namaAwal[0];
} else {

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BKM Nurul Hayat | 2023</title>

      <link rel="shortcut icon" href="layouts/assets/img/kubah-mesjid.png" type="image/x-icon">
      <link rel="stylesheet" href="layouts/assets/css/style.css">
</head>

<body>

      <aside>

            <header>
                  <?php if (isset($_SESSION['user'])) { ?>
                  <img src="layouts/assets/img/pp-wa.jpg" class="brand">
                  <div class="user">
                        <?= $_SESSION['user']['user_nama']?><br>
                        <span style="font-size: 12px; font-weight: normal;">( <?= $_SESSION['user']['user_level']?> )</span>
                  </div>
                  <?php } ?>
            </header>

            <?php
            require 'navbar_tampil.php';
            ?>

      </aside>

      <main>
            <article>
                  <?php

                  if (isset($_GET['hal'])) {
                        require $_GET['hal'] . ".php";
                  } elseif (isset($_SESSION['user'])) {
                        require "main.php";
                  } else {
                        require "login.php";
                  }
                  ?>
            </article>

            <footer>
                  Copyright &copy; 2023. Designed by Ary
            </footer>
      </main>

</body>

</html>