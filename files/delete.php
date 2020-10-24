<?php
require("../db.php");
$sql = "DELETE FROM files WHERE name='".$_GET['file']."'";
$db->query($sql);
unlink("file/".$_GET['file']);
header("Location: .");
?>