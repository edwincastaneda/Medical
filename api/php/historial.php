<?php
//PARAMETROS
/*
$_COOKIE["id_usuario"]
$_POST['id_expediente']
$_POST['inicio']
$_POST['action']="INSERT";
*/

if (!$api_activated || !isset($api_activated)) {
    die("ACCESO RESTRINGIDO!");
} else { 
    if($_POST['action']=="GET"){
        if(isset($_POST['id_expediente'])){

            $sql="SELECT COUNT(*) as total FROM citas WHERE id_expediente=".$_POST['id_expediente'];  
            $count = $DB->fetch($sql);   

            $sql = "SELECT C.fecha_hora, C.diagnostico, C.tratamiento ". 
                        "FROM citas C, expedientes E ".
                        "WHERE C.id_expediente=E.id ".
                        "AND C.id_expediente=".$_POST['id_expediente']." ".
                        "AND C.id_usuario=".$_COOKIE["id_usuario"]." ".
                        "ORDER BY C.fecha_hora ".
                        "DESC LIMIT 1 OFFSET ".$_POST['inicio'];


            if(($_POST['inicio'])==($count['total']-1)){
                $next="no";
            }else{
                $next=$_POST['inicio']+1;
            }

            if($_POST['inicio']==0){
                $prev="no";    
            }else{
                $prev=$_POST['inicio']-1;
            }

            $historial = $DB->fetch($sql);
            if (!empty($historial)) {
                $data = array(
                    'fecha_hora' =>   $historial['fecha_hora'],
                    'diagnostico' =>  $historial['diagnostico'],
                    'tratamiento' =>  $historial['tratamiento'],
                    'id' =>           $historial['id'],
                    'next' =>         $next,
                    'prev' =>         $prev
                );
            }
        }
    }
    if($_POST['action']=="INSERT"){

        $sql="INSERT INTO historial
	           VALUES
	           ('', 
	            '".$_POST['id_cita']."', 
	            '".$_POST['diagnostico']."', 
	            '".$_POST['tratamiento']."', 
	            '".$_COOKIE["id_usuario"]."'
	           );
               ";  
        
        if($DB->execute($sql)){
            $data = array(
                'id' =>     $DB->lastInsertId(),
                'mensaje' =>     "Expediente actualizado!"
            ); 
        }

    }
}
?>