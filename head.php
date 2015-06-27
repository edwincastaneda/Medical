<?php 
include_once( 'parametros.php'); 
include_once( 'class/class.DBPDO.php'); 
$DB=new DBPDO(); 


putenv('LC_ALL=es_ES');
setlocale(LC_ALL, 'es_ES');

bindtextdomain("medical", "./locale");

// Seleccionar dominio
textdomain("medical");

?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo _("Sistema Medico Básico"); ?>>
              <link rel="icon" type="image/png" href="img/favicon.png" />
        <title>
            <?php if (isset($_COOKIE[ "id_usuario"]) && isset($_COOKIE[ "nombre_usuario"])) { 
    echo $_COOKIE[ "nombre_usuario"];
}else{
    echo _("Medical - Login");
} ?>

        </title>
        <link rel="stylesheet" href="css//cssnormalize.css" type="text/css">

        <link rel="stylesheet" href="css/pure-min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!--[if lte IE 8]>
<link rel="stylesheet" href="css/layouts/email-old-ie.css">
<![endif]-->
        <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/medical.css">
        <!--<![endif]-->

        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="css/jquery.datetimepicker.css">
    </head>