<?php

use App\User as User;

if (isset($_POST['btn_login'])) {
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];

    $user = new User();
    $dataUser = $user->userByUsername($username);

    // var_dump($dataUser);

    if($dataUser == false) {
        echo "<script>alert('Username tidak ditemukan!');window.location = 'index.php?hal=login';</script>";
    } else {
        if ($dataUser['user_password'] == $password) {
            $_SESSION['user'] = $dataUser;

            echo "<script>alert('Login berhasil!');window.location = 'index.php';</script>";
        } else {
            echo "<script>alert('Password anda salah!');window.location = 'index.php?hal=login';</script>";
        }
    }
}
?>

<h2 class="text-center">Login</h2>

<form action="" method="post" class="form-crud">
    <div class="form-input">
        <label for="user_username">Username</label>
        <input type="text" name="user_username" id="user_username" autofocus required>
    </div>  
    <div class="form-input">
        <label for="user_password">Password</label>
        <input type="text" name="user_password" id="user_password" required>
    </div><br>
    <div class="form-input">
        <input class="btn-submit" type="submit" name="btn_login" value="MASUK">
    </div>
</form>