<?php
    include "database.php";

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)) {
            $register_message = "Buatlah username dan password terlebih dahulu.";
        } else {
            $check_sql = "SELECT * FROM users WHERE username = '$username'";
            $check_result = $db->query($check_sql);
        
        if($check_result->num_rows > 0){
            $register_message = "Akun sudah terdaftar. <a href='login.php'>Login</a>";
        } else {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($db->query($sql)) {
            header("Location: login.php");
            exit;
        } else {
            $register_message = "Gagal membuat akun. Coba lagi.";
        }
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

    <div class="pihapii">
    <h3>REGISTER</h3>
    <?php if(!empty($register_message)) echo "<p>$register_message</p>"; ?>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="register">OK</button>
    </form>
    </div>
    <?php include "layout/footer.html" ?>
    
</body>
</html>

