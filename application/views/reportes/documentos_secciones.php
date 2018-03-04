
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

<div class="container-fluid">

    <ol class="breadcrumb">
        <li><a href="<?= base_url();?>panel">Dashboard</a></li>
        <li>Reportes</li>
        <li class="active">Documentos por Secciones</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Reporte de Documentos por Secciones
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p>
                Seleccione los filtros para mostrar el reporte
            </p>
        </div>
        <div class="col-lg-3">
            <select class="form-control" id="area">
                <option>Selecciona área</option>
                <?php foreach ($areas as $a): ?>
                    <option value="<?= $a->area_id; ?>"><?= $a->area; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-lg-3">
            <select class="form-control" id="seccion">
                <option value="">Seleccione sección...</option>
            </select>
        </div>

        <div class="col-lg-3">
            <a href="#" id="mostrar_reporte" class="btn btn-success">Mostrar Reporte</a>
        </div>

    </div>

    <div class="clearfix"></div><br><br>

    <div class="row">
        <div class="col-lg-12 table-responsive" id="contenido_tabla" style="display: none;">

        </div>
    </div>


    <div class="row">
        <br><br>
        <div class="col-lg-12" id="grafico_tabla" style="display: none;">
            <h4>Gráfico de Cantidad de Documentos por Secciones</h4>
            <canvas id="myChart" height="100"></canvas>
        </div>
    </div>

</div>


<script>


$('#area').on('change', function(){
    $.ajax({
        type: 'post',
        url: _URL + 'ajax/secciones_por_area/' + $(this).val(),
        success: function(response){
            $('#seccion').html(response);
        }
    });
});


$('#mostrar_reporte').on('click', function(e){

    e.preventDefault();

    $('#contenido_tabla').slideUp();
    //$('#grafico_tabla').slideUp();

    var area = $('#area').find('option:selected').val();
    var seccion = $('#seccion').find('option:selected').val();

    if(area == '' || seccion == ''){
        swal('Atención', 'Debe seleccionar área y sección para mostrar un reporte', 'warning');
    } else {
        $.ajax({
            type: 'post',
            url: _URL + 'reportes/buscar_documentos',
            data: {area:area, seccion:seccion},
            dataType: 'json',
            success: function(response){
                $('#contenido_tabla').empty().slideDown().append(response.html);
                //$('#grafico_tabla').slideDown();
            }
        });
    }

});

</script>


<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php foreach($secciones as $seccion): ?>
                "<?php echo $seccion->seccion;?>",
            <?php endforeach ?>
        ],
        datasets: [{
            label: '# de Documentos',
            data: [
                <?php foreach($secciones as $seccion): ?>
                    "<?php echo documentos_por_seccion($seccion->seccion_id);?>",
                <?php endforeach ?>
            ],
            backgroundColor: [
                <?php foreach($secciones as $seccion): ?>
                    "<?php echo random_color();?>",
                <?php endforeach ?>
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>