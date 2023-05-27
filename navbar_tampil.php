<?php

use App\Navbar as Navbar;

$nav = new Navbar;
?>

<nav>
      <ul>
            <?php 
            if (isset($_SESSION['user'])) {
                  if ($_SESSION['user']['user_level'] == 'ADMIN') {
                        echo $nav->admin();
                  } 

                  if ($_SESSION['user']['user_level'] == 'PEMBINA') {
                        echo $nav->admin();
                  }

                  if ($_SESSION['user']['user_level'] == 'KETUA') {
                        echo $nav->admin();
                  }

                  if ($_SESSION['user']['user_level'] == 'SEKRETARIS') {
                        echo $nav->sekretaris();
                  }

                  if ($_SESSION['user']['user_level'] == 'BENDAHARA') {
                        echo $nav->bendahara();
                  }

                  if ($_SESSION['user']['user_level'] == 'USER') {
                        echo $nav->user();
                  }
            } else { ?>
                  <li>
                        <a href="index.php?hal=login">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                              </svg> Login
                        </a>
                  </li>
            <?php } ?>
      </ul>
</nav>