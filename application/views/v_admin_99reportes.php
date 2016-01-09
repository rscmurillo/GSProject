<h1 class="page-header">
    REPORTES <small></small>
</h1>


<?php echo link_tag('complemento/morrisjs/morris.css'); ?>   


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Reportes
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Materia Prima</a>
                    </li>
                    <li><a href="#profile" data-toggle="tab">Almacen</a>
                    </li>
                    <li><a href="#messages" data-toggle="tab">Producto</a>
                    </li>
                    <li><a href="#settings" data-toggle="tab">Pedido</a>
                    </li>
                    <li><a href="#alertas" data-toggle="tab">Alertas</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <h4>Reporte de MATERIA PRIMA ENTRANTE registrada por fecha.</h4>
                        <?php $this->load->view('reportes/v_reporte_mprima'); ?>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <h4>Almacen</h4>
                        <?php $this->load->view('reportes/v_reporte_almacen'); ?>
                    </div>
                    <div class="tab-pane fade" id="messages">
                        <h4>Producto</h4>
                        <?php $this->load->view('reportes/v_reporte_producto'); ?>
                    </div>
                    <div class="tab-pane fade" id="settings">
                        <h4>Pedido</h4>
                        <?php $this->load->view('reportes/v_reporte_pedido'); ?>
                    </div>
                    <div class="tab-pane fade" id="alertas">
                        <h4>Pedido</h4>
                        <?php $this->load->view('reportes/v_reporte_alertas'); ?>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>  
<script src="<?= base_url(); ?>complemento/morrisjs/morris.min.js"></script>
