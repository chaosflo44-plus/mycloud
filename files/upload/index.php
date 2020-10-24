<?php
require("../../db.php");
if(isset($_POST["submit"])) {
    $tname = $_FILES['file']['tmp_name'];
    $uploads_dir = '../file/';
    if(move_uploaded_file($tname, $uploads_dir.$_FILES['file']['name'])) {
        $sql = "INSERT INTO files (name, file) VALUES ('".$_FILES['file']['name']."', 'file/".$_FILES['file']['name']."')";
        if($db->query($sql)) {
            $success = "File uploaded!";
        } else {
            $message = "DATABASE ERROR";
        }
    } else {
        $message = "Error Uploading File";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCloud</title>
    <style>
        #file-txt {
            margin-left: 10px;
            font-family: sans-serif;
            color: #aaa;
        }
    </style>
</head>
<body>
    <?php
    require("navbar.php");
    ?>
    <br>
    <div class="container">
        <?php
        if(isset($message)) {
            echo '<div class="alert alert-danger" role="alert">';
                echo $message;
            echo "</div>";
        }
        ?>
        <?php
        if(isset($success)) {
            echo '<div class="alert alert-success" role="alert">';
                echo $success;
            echo "</div>";
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" id="real-file" hidden="hidden" name="file" multiple>
            <button type="button" class="btn btn-primary" id="browse-btn">Browse</button>
            <span id="file-txt">No File Choosen</span><br><br>
            <button type="submit" name="submit" class="btn btn-success">Upload</button>
        </form>
    </div>

    <script>
        const realFileBtn = document.getElementById("real-file");
        const browseBtn = document.getElementById("browse-btn");
        const fileTxt = document.getElementById("file-txt");

        browseBtn.addEventListener("click", function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener("change", function() {
            if(realFileBtn.value) {
                fileTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            } else {
                fileTxt.innerHTML = "No File Choosen";
            }
        });
    </script>
</body>
</html>