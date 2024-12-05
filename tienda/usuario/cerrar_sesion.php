<?php
    session_start();
    session_destroy();
    header("location:../usuario/iniciar_sesion.php");
    exit;
?>