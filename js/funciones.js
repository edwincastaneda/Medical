function emptyMainContent() {
    $("#main-content").hide().empty();
    var t = document.querySelector('#cita-noselect');
    var clone = document.importNode(t.content, true);
    document.getElementById('main-content').appendChild(clone);
    $("#main-content").fadeIn();
}

function getCitas(estado) {
    $("#list").hide().empty();
    $.ajax({
        url: "api/citas.json",
        type: "POST",
        data: {estado: estado, action:"GET"},
        async: false,
        statusCode: {
            404: function () {
                alert("404 Not Found!");
            }
        },
        success: function (data) {
            if(data.code==7){

                var t = document.querySelector('#citas-vacio');
                var clone = document.importNode(t.content, true);
                document.getElementById('list').appendChild(clone);
                $("#list").fadeIn();
                $("#main-content").hide();

            }else{
                emptyMainContent();
                obj=data.data;
                for (nkey in obj) {
                    var t = document.querySelector('#cita');
                    switch (obj[nkey]['estado']) {
                        case "Pendiente":
                            t.content.querySelector('[data-id_cita]').setAttribute("class", "cita-item pure-g pendiente");
                            break;
                        case "Atendida":
                            t.content.querySelector('[data-id_cita]').setAttribute("class", "cita-item pure-g atendida");
                            break;
                        case "Cancelada":
                            t.content.querySelector('[data-id_cita]').setAttribute("class", "cita-item pure-g cancelada");
                            break;
                        case "Re-Programada":
                            t.content.querySelector('[data-id_cita]').setAttribute("class", "cita-item pure-g reprogramada");
                            break;
                    }
                    if(obj[nkey]['avatar'].length>0){
                        t.content.querySelector('[data-avatar]').src = "data:image/jpg;base64," + obj[nkey]['avatar'];
                    }else{
                        t.content.querySelector('[data-avatar]').src = "img/avatar.jpg";
                    }
                    t.content.querySelector('[data-nombre]').textContent = obj[nkey]['nombre'];
                    t.content.querySelector('[data-fecha-hora]').textContent = obj[nkey]['fecha_hora'];
                    t.content.querySelector('[data-motivo]').textContent = obj[nkey]['motivo'];
                    t.content.querySelector('[data-id_cita]').setAttribute("data-id_cita", obj[nkey]['id']);

                    var clone = document.importNode(t.content, true);
                    document.getElementById('list').appendChild(clone);
                }
            }
            $("#list").fadeIn();
        }
    });
}

function getDetalleCitas(id_cita) {
    $("#main-content").hide().empty();
    $.ajax({
        url: "api/detalle_citas.json",
        type: "POST",
        data: {id_cita: id_cita},
        async: false,
        statusCode: {
            404: function () {
                alert("404 Not Found!");
            }
        },
        success: function (data) {
            obj=data.data;
            var t = document.querySelector('#detalle_cita');
            //console.log(obj);
            //t.content.querySelector('[data-avatar]').src = "fotos/" + obj['fotografia'];
            if(obj['avatar'].length>0){
                t.content.querySelector('[data-avatar]').src = "data:image/jpg;base64," + obj['avatar'];
            }else{
                t.content.querySelector('[data-avatar]').src = "img/avatar.jpg";
            }
            t.content.querySelector('[data-nombre-titulo]').textContent = obj['nombres']+" "+obj['apellidos'];
            t.content.querySelector('[data-fecha-hora-cita]').textContent = obj['fecha_hora'];
            t.content.querySelector('[data-motivo]').textContent = obj['motivo'];
            t.content.querySelector('[data-nombres]').setAttribute("value", obj['nombres']);
            t.content.querySelector('[data-apellidos]').setAttribute("value", obj['apellidos']);
            t.content.querySelector('[data-sexo]').setAttribute("value", obj['sexo']);
            t.content.querySelector('[data-edad]').setAttribute("value", obj['edad']);
            t.content.querySelector('[data-estado-civil]').setAttribute("value", obj['estado_civil']);
            t.content.querySelector('[data-telefono]').setAttribute("value", obj['telefono']);
            t.content.querySelector('[data-direccion]').textContent= obj['direccion'];
            t.content.querySelector('[data-id_cita]').setAttribute("data-id_cita", obj['id']);
            t.content.querySelector('[data-id_cita-cita]').setAttribute("data-id_cita-cita", obj['id']);
            t.content.querySelector('[data-id_expediente]').setAttribute("data-id_expediente", obj['id_expediente']);
            t.content.querySelector('[data-id_expediente-historial').setAttribute("data-id_expediente-historial", obj['id_expediente']);
            t.content.querySelector('[data-id_cita-diagnosticar]').setAttribute("data-id_cita-diagnosticar", obj['id']);
            t.content.querySelector('[data-fecha-cita-input]').setAttribute("value", obj['fecha_hora']);



            t.content.querySelector('[data-cancelar-cita]').setAttribute("data-cancelar-cita", id_cita);
            t.content.querySelector('[data-reprogramar-cita]').setAttribute("data-reprogramar-cita", id_cita);

            t.content.querySelector('[data-cancelar-cita]').style.display = "none";
            t.content.querySelector('[data-reprogramar-cita]').style.display = "none";
            t.content.querySelector('[data-id_cita-diagnosticar]').style.display = "none";
            t.content.querySelector('#nueva_fecha').style.display = "none";

            switch (obj['estado']) {
                case "Pendiente":
                    t.content.querySelector('[data-estado]').setAttribute("class", "estado-pendiente");
                    t.content.querySelector('[data-cancelar-cita]').style.display = "inline-block";
                    t.content.querySelector('[data-id_cita-diagnosticar]').style.display = "inline-block";
                    break;
                case "Atendida":
                    t.content.querySelector('[data-estado]').setAttribute("class", "estado-atendida");
                    break;
                case "Cancelada":
                    t.content.querySelector('[data-estado]').setAttribute("class", "estado-cancelada");
                    t.content.querySelector('[data-reprogramar-cita]').style.display = "inline-block";
                    //t.content.querySelector('[data-fecha-hora-cita-input]').style.display = "inline-block";
                    t.content.querySelector('#nueva_fecha').style.display = "inline-block";
                    break;
                case "Re-Programada":
                    t.content.querySelector('[data-estado]').setAttribute("class", "estado-reprogramada");
                    t.content.querySelector('[data-cancelar-cita]').style.display = "inline-block";
                    t.content.querySelector('[data-id_cita-diagnosticar]').style.display = "inline-block";

                    break;
            }


            var clone = document.importNode(t.content, true);
            document.getElementById('main-content').appendChild(clone);

            $("#main-content").fadeIn();
            dateTimeControls();
        }
    });
}

function getHistorial(id_expediente, inicio){
    $("#contenido-detalle-cita").hide().empty();
    $.ajax({
        url: "api/historial.json",
        type: "POST",
        data: {id_expediente: id_expediente,
               action:"GET",
               inicio: inicio
              },
        async: false,
        statusCode: {
            404: function () {
                alert("404 Not Found!");
            }
        },
        success: function (data) {
            obj=data.data;
            console.log(obj);
            var t = document.querySelector('#historial');
            t.content.querySelector('[data-fecha]').textContent = obj['fecha_hora'];
            t.content.querySelector('[data-diagnostico]').textContent = obj['diagnostico'];
            t.content.querySelector('[data-tratamiento]').textContent = obj['tratamiento'];
            t.content.querySelector('[data-loop-prev]').setAttribute("data-loop-prev", obj['prev']);
            t.content.querySelector('[data-loop-next]').setAttribute("data-loop-next", obj['next']);

            if(obj['next']=="no"){
                t.content.querySelector('[data-loop-next]').style.display = 'none';
            }else{
                t.content.querySelector('#next').textContent=obj['next']+1;
                t.content.querySelector('[data-loop-next]').style.display = 'block';
                
            }

            if(obj['prev']=="no"){
                t.content.querySelector('[data-loop-prev]').style.display = 'none';
            }else{
                t.content.querySelector('#prev').textContent=obj['prev']+1;
                t.content.querySelector('[data-loop-prev]').style.display = 'block';
            }

            var clone = document.importNode(t.content, true);
            document.getElementById('contenido-detalle-cita').appendChild(clone);


            $("#contenido-detalle-cita").show();
        }
    });
}

function updateCitas(estado, id_cita, fecha_hora) {
    $.ajax({
        url: "api/citas.json",
        type: "POST",
        data: {estado: estado, id_cita: id_cita, action:"UPDATE", fecha_hora:fecha_hora},
        async: false,
        statusCode: {
            404: function () {
                alert("404 Not Found!");
            }
        },
        success: function (data) {
            alert(data.data);
            location.reload();
        }
    });
}

function getExpediente(id_expediente){
    $("#contenido-detalle-cita").hide().empty();
    $.ajax({
        url: "api/expedientes.json",
        type: "POST",
        data: {id_expediente: id_expediente, action:"GET"
              },
        async: false,
        statusCode: {
            404: function () {
                alert("404 Not Found!");
            }
        },
        success: function (data) {
            obj=data.data;
            console.log(obj);
            var t = document.querySelector('#expediente');
            t.content.querySelector('[data-id_expediente]').setAttribute("value",id_expediente);
            t.content.querySelector('[data-1er_nombre]').setAttribute("value",obj['1er_nombre']);
            t.content.querySelector('[data-2do_nombre]').setAttribute("value",obj['2do_nombre']);
            t.content.querySelector('[data-1er_apellido]').setAttribute("value",obj['1er_apellido']);
            t.content.querySelector('[data-2do_apellido]').setAttribute("value",obj['2do_apellido']);
            t.content.querySelector('[data-apellido_casada]').setAttribute("value",obj['apellido_casada']);
            t.content.querySelector('[data-fecha_nacimiento]').setAttribute("value",obj['fecha_nacimiento']);
            t.content.querySelector('[data-telefono]').setAttribute("value",obj['telefono']);
            t.content.querySelector('[data-direccion]').textContent=obj['direccion'];
            //t.content.querySelector('[data-fotografia]').setAttribute("value",obj['fotografia']);
            t.content.querySelector('[data-alergias]').textContent=obj['alergias'];
            t.content.querySelector('[data-medicinas]').textContent=obj['medicinas'];
            t.content.querySelector('[data-tratamiento_medico]').textContent=obj['tratamiento_medico'];
            t.content.querySelector('[data-enfermedad_cronica]').textContent=obj['enfermedad_cronica'];
            t.content.querySelector('[data-enfermedad_relevante]').textContent=obj['enfermedad_relevante'];
            t.content.querySelector('[data-observaciones]').textContent=obj['observaciones'];

            var clone = document.importNode(t.content, true);
            document.getElementById('contenido-detalle-cita').appendChild(clone);


            $("#contenido-detalle-cita").show();

            //selected options
            $('[data-sexo] option[value="'+obj['sexo']+'"]').attr('selected','selected');
            $('[data-estado_civil] option[value="'+obj['estado_civil']+'"]').attr('selected','selected');
            $('[data-grupo_sanguineo] option[value="'+obj['grupo_sanguineo']+'"]').attr('selected','selected');
        }
    });
}

function updateExpedientes() {
    var vars=$( ".form_expediente" ).serialize();
    $.ajax({
        url: "api/expedientes.json",
        type: "POST",
        data: vars+"&action=UPDATE",
        async: false,
        statusCode: {
            404: function () {
                alert("404 Not Found!");
            }
        },
        success: function (data) {
            obj=data.data;
            alert(obj['mensaje']);
            getDetalleCitas($("[data-id_cita-cita]").attr("data-id_cita-cita"));
            getExpediente(obj['id']);
        }
    });
}

function setHistorial() {
    var vars=$( ".form_diagnostico" ).serialize();
    $.ajax({
        url: "api/historial.json",
        type: "POST",
        data: vars+"&action=INSERT",
        async: false,
        statusCode: {
            404: function () {
                alert("404 Not Found!");
            }
        },
        success: function (data) {
            obj=data.data;
            alert(obj['mensaje']);
            getDetalleCitas($("[data-id_cita-cita]").attr("data-id_cita-cita"));
            getHistorial(obj['id'],0);
        }
    });
}

function showDiagnosticar() {
    $("#contenido-detalle-cita").hide().empty();
    var t = document.querySelector('#diagnosticar');
    var clone = document.importNode(t.content, true);
    document.getElementById('contenido-detalle-cita').appendChild(clone);
    $("#contenido-detalle-cita").fadeIn();
}

$(function(){

    getCitas(1);


    /* MENUS*/
    $(".mnu-todas").on("click", function () {
        getCitas(1);
    });
    $(".mnu-pendientes").on("click", function () {
        getCitas(2);
    });
    $(".mnu-atendidas").on("click", function () {
        getCitas(3);
    });
    $(".mnu-canceladas").on("click", function () {
        getCitas(4);
    });
    $(".mnu-reprogramadas").on("click", function () {
        getCitas(5);
    });


    /* CITAS */
    $('body').on('click', '.pendiente', function() {
        getDetalleCitas($(this).attr("data-id_cita"));
    });

    $('body').on('click', '.atendida', function() {
        getDetalleCitas($(this).attr("data-id_cita"));
    });

    $('body').on('click', '.cancelada', function() {
        getDetalleCitas($(this).attr("data-id_cita"));
    });

    $('body').on('click', '.reprogramada', function() {
        getDetalleCitas($(this).attr("data-id_cita"));
    });


    /* BOTONES DETALLE DE CITA */
    $('body').on('click', '.cita', function() {
        getDetalleCitas($(this).attr("data-id_cita-cita"));
    });
    $('body').on('click', '.historial', function() {
        getHistorial($(this).attr("data-id_expediente-historial"),0);
    });
    $('body').on('click', '.expediente', function() {
        getExpediente($(this).attr("data-id_expediente"));
    });
    $('body').on('click', '.diagnosticar', function() {
        showDiagnosticar();
    });

    /* BOTONES NEXT-PREV */
    $('body').on('click', '.next', function() {
        getHistorial($(".historial").attr("data-id_expediente-historial"),$(this).attr("data-loop-next"));
    });
    $('body').on('click', '.prev', function() {
        getHistorial($(".historial").attr("data-id_expediente-historial"),$(this).attr("data-loop-prev"));
    });

    /* ACTUALIZA CITAS*/
    $('body').on('click', '[data-cancelar-cita]', function() {
        var id_cita=$(this).attr("data-cancelar-cita");
        var fecha_original=$("[data-fecha-hora-cita]").html();
        updateCitas(1,id_cita,fecha_original);
    });

    $('body').on('click', '[data-reprogramar-cita]', function() {
        var id_cita=$(this).attr("data-reprogramar-cita");
        var fecha_nueva=$("[data-fecha-cita-input]").val();
        updateCitas(3,id_cita,fecha_nueva);
    });

    /* ACTUALIZA EXPEDIENTE */
    $('body').on('click', '[data-actualizar-expediente]', function() {
        updateExpedientes($(this).attr("data-actualizar-expediente"));
    });



    /* ACCORDION */
    $('body').on('click', '.accordion', function() {
        var id=$(this).attr("data-accordion");
        var estado=$("#accordion-"+id ).is(':visible');
        if(estado){
            $( "#accordion-"+id ).slideUp();
            $("[data-accordion="+id+"] span").removeClass( "menos" );
            $("[data-accordion="+id+"] span").addClass( "mas" );
        }else{
            $( "#accordion-"+id ).slideDown();
            $("[data-accordion="+id+"] span").removeClass( "mas" );
            $("[data-accordion="+id+"] span").addClass( "menos" );
        }

    });



});