<?php
echo $_GET['key'];
echo "<br>";
echo password_hash($_GET['key'], PASSWORD_BCRYPT);
echo "<br>";
echo var_dump(password_verify($_GET['key'], password_hash($_GET['key'], PASSWORD_BCRYPT)));
echo "<br>";
echo var_dump(password_verify($_GET['key'], "$2y$10$3gg3RyYdacM7RbJ6P2bMAeCQDiC/cJC7VHy81O8dMwP1I2qmTTvKa"));