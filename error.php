<?php
if(isset($_GET["type"])) {
    $t = $_GET['type'];
    if($t == "DBCONERR") {
        echo "FEHLER BEI DER DATENBANK";
    }
} else {
    header("Location: index.php");
}
?>