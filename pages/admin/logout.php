<?php
unset($_COOKIE['CookieUser']);
setcookie('CookieUser', null, -1, '/');
header("Location: /");
?>