<?php
//PARAMETROS
/*
$_COOKIE["id_usuario"]
$_POST['id_cita']
*/

if (!$api_activated || !isset($api_activated)) {
    die("ACCESO RESTRINGIDO!");
} else {
    function calcula_edad($fecha_nacimiento) {
        list($ano, $mes, $dia) = explode("-", $fecha_nacimiento);
        $ano_diferencia = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
        return $ano_diferencia;
    }

    $sql = "SELECT C.id, E.fotografia, E.1er_nombre, E.2do_nombre, E.1er_apellido, E.2do_apellido, E.apellido_casada, E.fecha_nacimiento, E.sexo, E.estado_civil, E.avatar, " .
        "E.telefono, E.direccion, C.id_expediente, " .
        "C.fecha_hora, C.motivo, C.estado " .
        "FROM citas C, expedientes E " .
        "WHERE C.id_usuario=" . $_COOKIE["id_usuario"] .
        " AND E.id=C.id_expediente " .
        "AND C.id=" . $_POST['id_cita'];

    $citas = $DB->fetch($sql);
    if (!empty($citas)) {
        $nombres = $citas['1er_nombre'] . " " . $citas['2do_nombre'];
        $apellidos = $citas['1er_apellido'] . " " . $citas['2do_apellido'] . " " . $citas['apellido_casada'];
        
        $data = array(
            'avatar' =>     $citas['avatar'],
            'imagen' =>         $citas['imagen'],
            'nombres' =>        utf8_encode ($nombres),
            'apellidos' =>      utf8_encode ($apellidos),
            'fecha_hora' =>     $citas['fecha_hora'],
            'motivo' =>         utf8_encode ($citas['motivo']),
            'estado' =>         $citas['estado'],
            'id' =>             $citas['id'],
            'sexo' =>           $citas['sexo'],
            'edad' =>           calcula_edad($citas['fecha_nacimiento']),
            'estado_civil' =>   $citas['estado_civil'],
            'telefono' =>       $citas['telefono'],
            'direccion' =>      utf8_encode ($citas['direccion']),
            'id_expediente' =>  $citas['id_expediente']
        );
    }
}
?>