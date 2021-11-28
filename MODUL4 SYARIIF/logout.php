<?php
session_start();
session_unset();
session_destroy();

setcookie('color', $navbar, time() - 3200);
setcookie('email', $email, time() - 3200);
setcookie('password', $pwd, time() - 3200);

header("location: index.php?id='logout'");
exit;
?>