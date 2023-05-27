<?php

if (isset($_SESSION['user'])) {
    session_unset();

    echo "<script>alert('Anda telah logout!');window.location = 'index.php?hal=login';</script>";
} else {
    session_unset();
    
    header("Location: index.php?hal=login");
}


?>