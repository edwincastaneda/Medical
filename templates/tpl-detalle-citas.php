<!-- NO SELECCIONADO-->

<template id="cita-noselect">
    <div class="cita-content-empty center">
        <h1>Seleccione una cita para ver su contenido</h1>
    </div> 
</template>


<!-- CITA SELECCIONADA -->
<template id="detalle_cita">
    <div class="cita-content-header pure-g" data-id_cita>
        <div class="pure-u-1">
            <img class="cita-avatar expediente-avatar" data-avatar alt="" height="70" width="70" src="">
            <div class="pure-u-3-4">
                <h1 class="cita-content-title" data-nombre-titulo></h1>
                <p class="cita-content-subtitle">
                    <span data-estado></span>Fecha y hora de Cita: <span data-fecha-hora-cita> </span>
                </p>
            </div>
        </div>

        <div class="cita-content-controls pure-u-1">
            <button class="secondary-button pure-button cita" data-id_cita-cita>Cita</button>
            <button class="secondary-button pure-button expediente" data-id_expediente>Expediente</button>
            <button class="secondary-button pure-button historial" data-id_expediente-historial>Historial</button>
            <button class="secondary-button pure-button diagnosticar" data-id_cita-diagnosticar>Diagnosticar</button>
        </div>
    </div>
    <div class="cita-content-body" id="contenido-detalle-cita">
        <div id="ultimo-hallazgo">
            <h3>Motivo de la cita:</h3>
            <p data-motivo></p>
        </div>
        <form class="pure-form pure-form-stacked">
            <fieldset>
                <legend><strong>Información del Paciente</strong>
                </legend>
                <div class="pure-g">
                    <div class="pure-u-1">
                        <label>Nombres:</label>
                        <input class="pure-u-1" type="text" readonly="" data-nombres>
                    </div>
                    <div class="pure-u-1">
                        <label>Apellidos:</label>
                        <input class="pure-u-1" type="text" readonly="" data-apellidos>
                    </div>
                    <div class="pure-u-1-4">
                        <label>Sexo:</label>
                        <input class="pure-u-1" type="text" readonly="" data-sexo>
                    </div>
                    <div class="pure-u-1-4">
                        <label>Edad:</label>
                        <input class="pure-u-1" type="text" readonly="" data-edad>
                    </div>
                    <div class="pure-u-1-4">
                        <label>Estado Civil:</label>
                        <input class="pure-u-1" type="text" readonly="" data-estado-civil>
                    </div>
                    <div class="pure-u-1-4">
                        <label>Telefono:</label>
                        <input class="pure-u-1" type="text" readonly="" data-telefono>
                    </div>
                    <div class="pure-u-1 pure-u-md-1-1">
                        <label>Dirección:</label>
                        <textarea class="pure-u-1" readonly="" rows="5" data-direccion></textarea>
                    </div>
                    <div class="pure-u-1 pure-u-md-1-1" id="nueva_fecha">
                    <div class="pure-u-1-3">
                        <label>Nueva fecha y hora:</label>
                        <input class="pure-u-1" id="datetimepicker" type="text" data-fecha-cita-input>
                    </div>
                    </div>


                </div>
            </fieldset>
			<div class="pure-u-1">
			<button type="button" class="pure-button button-error" data-cancelar-cita><i class="fa fa-ban"></i> Cancelar</button>
			<button type="button" class="pure-button button-secondary" data-reprogramar-cita><i class="fa fa-clock-o"></i> Reprogramar</button>
			</div>
        </form>
    </div>
</template>