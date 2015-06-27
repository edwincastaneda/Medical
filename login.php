<?php
include_once('parametros.php');

$DB = new DBPDO();

$sql = "SELECT * FROM usuarios WHERE usuario='" . $_POST['usuario'] . "' AND contrasena='" . md5($_POST['contrasena']) . "'";
$usuarios = $DB->fetch($sql);
if (!empty($usuarios)) {
    setcookie("id_usuario", $usuarios['id']);
    setcookie("nombre_usuario", $usuarios['nombre']);
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}
?>