<?php
//PARAMETROS
//$_COOKIE["id_usuario"]=1;
//$_POST['id_expediente']=1;
//$_POST['action']="UPDATE";
if (!$api_activated || !isset($api_activated)) {
    die("ACCESO RESTRINGIDO!");
} else { 
    if($_POST['action']=="GET"){

        if(isset($_POST['id_expediente'])){     

            $sql = "SELECT * FROM expedientes WHERE id=".$_POST['id_expediente']." AND id_usuario=".$_COOKIE["id_usuario"];

            $expediente = $DB->fetch($sql);

            if (!empty($expediente)) {
                $data = array(
                    '1er_nombre' =>             utf8_encode($expediente['1er_nombre']),
                    '2do_nombre' =>             utf8_encode($expediente['2do_nombre']),
                    '1er_apellido' =>           utf8_encode($expediente['1er_apellido']),
                    '2do_apellido' =>           utf8_encode($expediente['2do_apellido']),
                    'apellido_casada' =>        utf8_encode($expediente['apellido_casada']),
                    'fecha_nacimiento' =>       $expediente['fecha_nacimiento'],
                    'sexo' =>                   $expediente['sexo'],
                    'estado_civil' =>           $expediente['estado_civil'],
                    'telefono' =>               $expediente['telefono'],
                    'direccion' =>              utf8_encode ($expediente['direccion']),
                    'avatar' =>             $expediente['avatar'],
                    'grupo_sanguineo' =>        $expediente['grupo_sanguineo'],
                    'alergias' =>               utf8_encode($expediente['alergias']),
                    'medicinas' =>              utf8_encode($expediente['medicinas']),
                    'tratamiento_medico' =>     utf8_encode($expediente['tratamiento_medico']),
                    'enfermedad_cronica' =>     utf8_encode($expediente['enfermedad_cronica']),
                    'enfermedad_relevante' =>   utf8_encode($expediente['enfermedad_relevante']),
                    'observaciones' =>          utf8_encode($expediente['observaciones'])
                );


            }
        }
    }
    
    if($_POST['action']=="UPDATE"){
    
    $sql = "UPDATE expedientes SET ".
        "1er_nombre='".utf8_decode($_POST['1er_nombre'])."', ".
        "2do_nombre='".utf8_decode($_POST['2do_nombre'])."', ".
        "1er_apellido='".utf8_decode($_POST['1er_apellido'])."', ".
        "2do_apellido='".utf8_decode($_POST['2do_apellido'])."', ".
        "apellido_casada='".utf8_decode($_POST['apellido_casada'])."', ".
        "fecha_nacimiento='".$_POST['fecha_nacimiento']."', ".
        "sexo='".$_POST['sexo']."', ".
        "estado_civil='".$_POST['estado_civil']."', ".
        "telefono='".$_POST['telefono']."', ".
        "direccion='".utf8_decode($_POST['direccion'])."', ".
        "fotografia='".$_POST['fotografia']."', ".
        "grupo_sanguineo='".$_POST['grupo_sanguineo']."', ".
        "alergias='".utf8_decode($_POST['alergias'])."', ".
        "medicinas='".utf8_decode($_POST['medicinas'])."', ".
        "tratamiento_medico='".utf8_decode($_POST['tratamiento_medico'])."', ".
        "enfermedad_cronica='".utf8_decode($_POST['enfermedad_cronica'])."', ".
        "enfermedad_relevante='".utf8_decode($_POST['enfermedad_relevante'])."', ".
        "observaciones='".utf8_decode($_POST['observaciones'])."' ".
        "WHERE id_usuario=".$_COOKIE["id_usuario"]." AND id=".$_POST['id_expediente'];
        
        if($DB->execute($sql)){
            $data = array(
                'id' =>     $_POST['id_expediente'],
                'mensaje' =>     "Expediente actualizado!"
            );
        }
    }
}
?>