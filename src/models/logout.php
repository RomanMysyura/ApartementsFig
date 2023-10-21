<?php
session_start();

session_unset();

session_destroy();

setcookie("username", "", time() - 3600, "/");
setcookie("user_id", "", time() - 3600, "/");

header("Location: index.php?r=login");
exit();
?>