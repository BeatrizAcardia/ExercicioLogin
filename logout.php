<?php
    setcookie("login", 0, time()-3600, "/");
    header('Location: index.php'); //Redireciona o usuário para a página home.php
?>