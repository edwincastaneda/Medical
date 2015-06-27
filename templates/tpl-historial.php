<!-- HISTORIAL -->
<template id="historial">
    <form class="pure-form pure-form-stacked historial-loop">
        <fieldset>
            <legend><strong>Fecha de Cita:</strong> <span data-fecha></span>
            </legend>
            <div class="pure-g">
                <div class="pure-u-1-1">
                   <label>Diagnostico:</label>
                    <textarea class="pure-u-1-1" readonly="" rows="10" data-diagnostico></textarea>
                </div>
                <div class="pure-u-1-1">
                   <label>Tratamiento:</label>
                    <textarea class="pure-u-1-1" readonly="" rows="10" data-tratamiento></textarea>
                </div>
            </div>
        </fieldset>
        
        <button type="button" class="pure-button button-small left prev" data-loop-prev><i class="fa fa-angle-left"></i>  Página <span id="prev"></span></button>
        <button type="button" class="pure-button button-small right next" data-loop-next>Página <span id="next"></span>  <i class="fa fa-angle-right"></i></button>
    </form>
</template>


<!-- DIAGNOSTICAR -->
<template id="diagnosticar">
    <form class="pure-form pure-form-stacked historial-loop">
        <fieldset>
            <legend><strong>Fecha de Cita:</strong> <span data-fecha></span>
            </legend>
            <div class="pure-g">
                <div class="pure-u-1-1">
                   <label>Diagnostico:</label>
                    
                    <textarea class="pure-u-1-1" name="diagnostico" rows="10" data-diagnostico></textarea>
                </div>
                <div class="pure-u-1-1">
                   <label>Tratamiento:</label>
                    <textarea class="pure-u-1-1" name="tratamiento" rows="10" data-tratamiento></textarea>Aqui me quede colocando los names para enviar informacion....
                </div>
            </div>
        </fieldset>
        <button type="button" class="pure-button button-small left prev" data-loop-prev>Página <span id="prev"></span></button>
        <button type="button" class="pure-button button-small right next" data-loop-next>Página <span id="next"></span></button>
    </form>
</template>