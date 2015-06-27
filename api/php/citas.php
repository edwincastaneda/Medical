<?php
//PARAMETROS
/*
$_COOKIE["id_usuario"]
$_COOKIE["id_cita"]
$_POST['estado']
$_POST['action']
*/

if (!$api_activated || !isset($api_activated)) {
    die("ACCESO RESTRINGIDO!");
} else {

    if($_POST['action']=="GET"){
        $sql = "SELECT C.id, E.fotografia, E.1er_nombre, E.2do_nombre, E.1er_apellido, E.2do_apellido, E.apellido_casada, C.fecha_hora, C.motivo, C.estado, E.avatar " .
            "FROM citas C, expedientes E " .
            "WHERE C.id_usuario=" . $_COOKIE["id_usuario"] .
            " AND E.id=C.id_expediente";

        if ($_POST['estado'] == 2) {
            $sql .= " AND C.estado='Pendiente'";
        }
        if ($_POST['estado'] == 3) {
            $sql .= " AND C.estado='Atendida'";
        } 
        if ($_POST['estado'] == 4) {
            $sql .= " AND C.estado='Cancelada'";
        }
        if ($_POST['estado'] == 5) {
            $sql .= " AND C.estado='Re-Programada'";
        }

        $sql .= " ORDER BY C.fecha_hora DESC";

        $citas = $DB->fetchAll($sql);

        foreach ($citas as $row) {
            $nombre = $row['1er_nombre'] . " " . $row['2do_nombre'] . " " . $row['1er_apellido'] . " " . $row['2do_apellido'] . " " . $row['apellido_casada'];
            $data[] = array(
                'fotografia' => $row['fotografia'],
                'nombre' =>     utf8_encode($nombre),
                'avatar' =>     $row['avatar'],
                'fecha_hora' => $row['fecha_hora'],
                'motivo' =>     utf8_encode($row['motivo']),
                'estado' =>     $row['estado'],
                'id' =>         $row['id']
            );
        }
    }


    if($_POST['action']=="UPDATE"){
        $estados = array(
            "Atendida",
            "Cancelada",
            "Pendiente",
            "Re-Programada"
        );

        $sql = "UPDATE citas SET estado='".$estados[$_POST['estado']]."', fecha_hora='".$_POST['fecha_hora']."' WHERE id_usuario=".$_COOKIE["id_usuario"]." AND id=".$_POST['id_cita'];
        $DB->execute($sql);
        $data = "La cita ha sido ".$estados[$_POST['estado']]."!";
    }
}
?>