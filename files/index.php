<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCloud</title>
</head>
<body>
    <?php
    require("navbar.php");
    ?>
    <div class="container">
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Löschen</th>
                    <th scope="col">Runterladen</th>
                </tr>
            </thead>
            <tbody>

                <?php
                require "../db.php";
                $sql = "SELECT * FROM files";
                $result = $db->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><th scope='row'>".$row['name']."</th><td><a href='delete.php?file=".$row['name']."'>Löschen</a></td><td><a href='file/".$row['file']."' download>Runterladen</a></td></tr>";
                    }
                } else {
                    echo "<tr><th scope='row' colspan='3'>Noch nix ):</th></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>