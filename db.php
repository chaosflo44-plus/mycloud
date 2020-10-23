<?php
$db = new mysqli("127.0.0.1", "root", "", "cloud");
if($db->connect_errno) {
    header("Location: error.php?type=DBCONERR");
}
?>