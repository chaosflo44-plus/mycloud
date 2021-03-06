<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedpw = password_hash($password, PASSWORD_BCRYPT);
    require("db.php");
    $db->query($sql);
    echo $db->error;
    $db->query("INSERT INTO `users` (`username`, `password`) VALUES (`".$username."`, `".$hashedpw."`)");
    $_SESSION['cloud_username'] = $username;
}
if(isset($_SESSION["cloud_username"])) {
    header("Location: files/");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCloud</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <center><img src="img/logo.png"></center>
        <br>
        <center><h2 style="color: white;">Setup</h2></center>
        <br>
        <br>
        <br>
        <?php
        if(isset($message)) {
            echo '<div class="alert alert-danger" role="alert">';
                echo $message;
            echo "</div>";
        }
        ?>
        <div class="alert alert-primary" role="alert">
            You need to have the Database Setup First!
        </div>
        <form method="POST">
            <div class="form-group row">
                <label for="inputText3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="inputText3" required>
                </div>
                </div>
                <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Passwort</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="inputPassword3" required>
                </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Setup</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>