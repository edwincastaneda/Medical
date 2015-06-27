<?php 

$atendidas=0; 
$pendientes=0; 
$canceladas=0; 
$reprogramadas=0; 
$todas=0; 

$sql="SELECT COUNT(*) AS total, estado FROM citas GROUP BY estado"; 
$citas=$DB->fetchAll($sql); 

foreach ($citas as $row) { 
    switch($row['estado']){ 
        case "Atendida": $atendidas=$row['total']; 
		$todas=$todas+$row['total'];
        break; 
        case "Pendiente": $pendientes=$row['total']; 
		$todas=$todas+$row['total'];
        break; 
        case "Cancelada": $canceladas=$row['total'];
		$todas=$todas+$row['total'];		
        break; 
        case "Re-Programada": $reprogramadas=$row['total']; 
		$todas=$todas+$row['total'];
        break; 
    }  
} 
?>

<div id="nav" class="pure-u">
    <a href="#" class="nav-menu-button"><i class="fa fa-bars"></i></a>

    <div class="nav-inner">
        <!--<button class="primary-button pure-button">Medical</button>-->
        <img src="img/logo.png" width="120">
        <div class="pure-menu">
            <ul class="pure-menu-list">
                <li class="pure-menu-heading"><?php echo _("Dates");?></li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu mnu-todas"><?php echo _("All");?> <span class="citas-count">(<?php if(isset($todas)){echo $todas;}?>)</span></span>
                </li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu mnu-pendientes"><?php echo _("Awaiting");?> <span class="citas-count">(<?php if(isset($pendientes)){echo $pendientes;}?>)</span></span>
                </li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu mnu-atendidas"><?php echo _("Taked");?> <span class="citas-count">(<?php if(isset($atendidas)){echo $atendidas;}?>)</span></span>
                </li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu mnu-canceladas"><?php echo _("Canceled");?> <span class="citas-count">(<?php if(isset($canceladas)){echo $canceladas;}?>)</span></span>
                </li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu mnu-reprogramadas">Re-Programadas <span class="citas-count">(<?php if(isset($reprogramadas)){echo $reprogramadas;}?>)</span></span>
                </li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu"><i class="fa fa-calendar"></i> Agendar</span>
                </li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu"><i class="fa fa-search"></i> Consultar</span>
                </li>
                <li class="pure-menu-heading">Expedientes</li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu"><i class="fa fa-user-plus"></i> Nuevo</span>
                </li>
                <li class="pure-menu-item">
                    <span class="pure-menu-link mnu"><i class="fa fa-search"></i> Consultar</span>
                </li>
                <li class="pure-menu-heading">Sistema</li>
                <li class="pure-menu-item">
                    <a href="logout.php" class="pure-menu-link"><i class="fa fa-power-off"></i> Salir</a>
                </li>
            </ul>
        </div>
    </div>
</div>