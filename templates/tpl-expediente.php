<!-- EXPEDIENTE -->
<template id="expediente">
    <form class="pure-form pure-form-stacked form_expediente">
        <fieldset>
            <legend class="puntero accordion" data-accordion="1"><strong>Datos Personales <span class="mas"></span></strong>
            </legend>
            <div class="pure-g ocultar" id="accordion-1">
               <input name="id_expediente" type="hidden" data-id_expediente>
                <div class="pure-u-1-2">
                    <label>Nombres:</label>
                    <input class="pure-u-1" type="text" name="1er_nombre" placeholder="Primero" data-1er_nombre>
                </div>
                <div class="pure-u-1-2">
                    <label>&nbsp;</label>
                    <input class="pure-u-1" type="text" name="2do_nombre" placeholder="Segundo" data-2do_nombre>
                </div>

                <div class="pure-u-1-3">
                    <label>Apellidos:</label>
                    <input class="pure-u-1" type="text" name="1er_apellido" placeholder="Primero" data-1er_apellido>
                </div>
                <div class="pure-u-1-3">
                    <label>&nbsp;</label>
                    <input class="pure-u-1" type="text" name="2do_apellido" placeholder="Segundo" data-2do_apellido>
                </div>
                <div class="pure-u-1-3">
                    <label>&nbsp;</label>
                    <input class="pure-u-1" type="text" name="apellido_casada" placeholder="De casada" data-apellido_casada>
                </div>


                <div class="pure-u-1-4">
                    <label>Sexo:</label>
                    <select class="pure-u-1" name="sexo" data-sexo>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="pure-u-1-4">
                    <label>Fecha de Nacimiento:</label>
                    <input class="pure-u-1" type="text" name="fecha_nacimiento" data-fecha_nacimiento>
                </div>
                <div class="pure-u-1-4">
                    <label>Estado Civil:</label>
                    <select class="pure-u-1" name="estado_civil" data-estado_civil>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viudo">Viudo</option>
                        <option value="Unido">Unido</option>
                    </select>
                </div>
                <div class="pure-u-1-4">
                    <label>Telefono:</label>
                    <input class="pure-u-1" name="telefono" type="text" data-telefono>
                </div>
                <div class="pure-u-1 pure-u-md-1-1">
                    <label>Dirección:</label>
                    <textarea class="pure-u-1" name="direccion" rows="5" data-direccion></textarea>
                </div>

            </div>
            <legend class="puntero accordion" data-accordion="2"><strong>Datos Clinicos <span class="menos"></span></strong>
            </legend>
            <div class="pure-g" id="accordion-2">
                <div class="pure-u-1-4">
                    <label>Grupo Sanguineo:</label>
                    <select class="pure-u-1" name="grupo_sanguineo" data-grupo_sanguineo>
                        <option value="O-">O-</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
                    </select>
                </div>
                <div class="pure-u-1 pure-u-md-1-1">
                    <label>Alergias:</label>
                    <textarea class="pure-u-1" name="alergias" rows="5" data-alergias></textarea>
                </div>
                <div class="pure-u-1 pure-u-md-1-1">
                    <label>Medicinas:</label>
                    <textarea class="pure-u-1" name="medicinas" rows="5" data-medicinas></textarea>
                </div>

                <div class="pure-u-1 pure-u-md-1-1">
                    <label>Tratamiento Medico:</label>
                    <textarea class="pure-u-1" name="tratamiento_medico" rows="5" data-tratamiento_medico></textarea>
                </div>
                
                <div class="pure-u-1 pure-u-md-1-1">
                    <label>Enfermedad Cronica:</label>
                    <textarea class="pure-u-1" name="enfermedad_cronica" rows="5" data-enfermedad_cronica></textarea>
                </div>
                
                <div class="pure-u-1 pure-u-md-1-1">
                    <label>Enfermedades Relevantes:</label>
                    <textarea class="pure-u-1" name="enfermedad_relevante" rows="5" data-enfermedad_relevante></textarea>
                </div>
                
                <div class="pure-u-1 pure-u-md-1-1">
                    <label>Observaciones:</label>
                    <textarea class="pure-u-1" name="observaciones" rows="5" data-observaciones></textarea>
                </div>

            </div>
        </fieldset>
       <div class="pure-u-1">
            <button type="button" class="pure-button button-success" data-actualizar-expediente><i class="fa fa-floppy-o"></i> Guardar Cambios</button>
        </div>
    </form>
</template>