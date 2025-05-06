<?php
    include "database.php";

    $login_message = "";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $login_message = "Masukkan username dan password.";
        }else{
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            header("Location: index.html");
            exit;
        }else{
            $login_message = "Username atau password anda salah</br>Coba Lagi";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include "layout/header.html" ?>
   
    <div class="pihapi">
    <h3>LOGIN</h3>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="login">OK</button>
    </form>


<?php if(!empty($login_message)) echo "<p>$login_message</p>"; ?>
</div>
    <?php include "layout/footer.html" ?>
    
</div>
</body>
</html>

