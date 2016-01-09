<h1 class="page-header">
    Administrar Almacen <small></small>
</h1>
<div class="row">
	<div class="col-lg-9">
		<?=form_open(base_url()."index.php/c_almacen/buscar")?>
		<div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Ej. Nombre de la materia prima" name="bus">
            <span class="input-group-btn">
            <input type="submit" class="btn btn-success btn-md" value="Buscar"><i class="fa fa-search"></i></input>
            </span>
        </div>
        <?=form_close() ?>
	</div>
</div>

<hr>
 
<?php
if(isset ($mensaje))
	{
	echo '<div class="row">';
    echo '<div class="col-lg-12">';
        echo '<div class="alert alert-success alert-dismissable">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '<center><i class="fa fa-check-circle"></i> <strong>Exito..!! </strong> '.nl2br($mensaje);
        echo '</center></div>';
    echo '</div>';
	echo '</div>';
	}
if(isset ($error))
	{
	echo '<div class="row">';
    echo '<div class="col-lg-12">';
        echo '<div class="alert alert-danger alert-dismissable">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '<center><i class="fa fa-warning"></i> <strong>Aviso..!! </strong> '.$error;
        echo '</center></div>';
    echo '</div>';
	echo '</div>';
	}
if(isset ($almacen))
{
	if($almacen->num_rows == 0)
		{
		echo '<div class="row">';
		echo '<div class="col-lg-12">';
		    echo '<div class="alert alert-danger alert-dismissable">';
		        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        echo '<center><i class="fa fa-warning"></i> <strong>Aviso..!! </strong> No existe ninguna materia prima registrada en ALMACEN.';
		    echo '</center></div>';
		echo '</div>';
		echo '</div>';
		}
}
?>

<script>

function eliminar_registro(a, b)
{
	document.getElementById('codEliminar').value = a;
	document.getElementById('codEliminarOculto').value = a;
	document.getElementById('nomEliminar').value = b;
}

function modificar_registro(a, b)
{
	var f = new Date();
	var fecha= (f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
	document.getElementById('nomAgregar').value = b;
	document.getElementById('codAgregarOculto').value = a;
	document.getElementById('fecAgregar').value = fecha;
}

</script>
<?php
 if(isset($almacen))
{
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <div class="row text-center">
            	<h2><strong><i class="fa fa-fw fa-database fa-1x"></i> ALMACEN</strong></h2>
            </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-responsive" id="dataTables-example">
                        <thead>
                            <tr class="active">
                                <th class="text-center">MATERIA PRIMA</th>
                                <th class="text-center">CANTIDAD</th>
                                <th class="text-center">UND/MED</th>
                                <th class="success text-center">AGREGAR</th>
                                <th class="danger text-center">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody> 

<?php
if($almacen->num_rows() != 0)
{
	foreach($almacen->result_array() as $f)
	{?>
	<tr>
		<td><?= $f['map_nombre']?></td>
		<td><?= $f['almm_cantidad']?></td>
		<td><?= $f['map_un_medida']?></td>
		<td class='text-center'>
			<a href='#' data-toggle='modal' data-target='#Modificar' onclick="modificar_registro('<?= $f['almm_codigo']?>','<?= $f['map_nombre']?>')"><i class='fa fa-plus fa-1x'></i></a>
		</td>
		<td class='text-center'>
			<a href='#' data-toggle='modal' data-target='#Eliminar' onclick="eliminar_registro('<?= $f['almm_codigo']?>','<?= $f['map_nombre']?>')"><i class='fa fa-trash-o fa-1x'></i></a>
		</td>
	</tr>
	<?php }
}
}
?>    
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>



<!-- ################# ELIMINAR ################# -->
<div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-times"></i> Eliminar Registro</h4>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-red">
							<div class="panel-heading">
							<div class="row text-center">
								<h4><strong><i class="fa fa-fw fa-tags fa-1x"></i> ¿ESTA SEGURO EN ELIMINAR EL REGISTRO?</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_categoria/eliminar")?>
							<div class="panel-body">
								<div class="form-group input-group">
									<span class="input-group-addon"><strong>Codigo del Proveedor</strong></span>
		                            <input type="text" class="form-control text-center" id="codEliminar" disabled>
		                            <input type="hidden" name="cod" id="codEliminarOculto">
                                </div>
                                <div class="form-group input-group">
									<span class="input-group-addon"><strong>Nombre del Proveedor</strong></span>
		                            <input type="text" class="form-control text-center" id="nomEliminar" disabled>
                                </div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
            	<label class="text-danger"><strong>*Para cerrar la ventana y cancelar la ELIMINACION, presione (Esc)</strong></span></label>
                <input type="submit" class="btn btn-danger" value="Eliminar"></button>
                			<?=form_close()?>
            </div>
        </div>
    </div>
</div>
<!-- ################# FIN - ELIMINAR ################# -->

<!-- ################# AGREGAR ################# -->
<div class="modal fade" id="Modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Agregar Almacen</h4>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-green">
							<div class="panel-heading">
							<div class="row text-center">
								<h4><strong><i class="fa fa-fw fa-tags fa-1x"></i> INGRESO DE MATERIA PRIMA</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_almacen/agregar")?>
							<div class="panel-body">
								<div class="form-group input-group">
									<span class="input-group-addon"><strong>Materia Prima</strong></span>
		                            <input type="text" class="form-control text-center" id="nomAgregar" disabled>
		                            <input type="hidden" name="cod" id="codAgregarOculto">
                                </div>
                                <div class="form-group input-group">
									<span class="input-group-addon"><strong>Fecha de Ingreso</strong></span>
		                            <input type="text" class="form-control text-center" id="fecAgregar" name="fec" readonly>
		                            
                                </div>
                                <div class="form-group">
									<label><strong>Cantidad</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Descripcion" id="desModificar" name="can">
                                </div>
                                <div class="form-group">
									<label><strong>Cantidad por Lote</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Descripcion" id="desModificar" name="canl">
                                </div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
            	<label class="text-danger"><strong>*Para cerrar la ventana y cancelar la MODIFICACION, presione (Esc)</strong></span></label>
                <input type="submit" class="btn btn-success" value="Modificar"></button>
                			<?=form_close()?>
            </div>
        </div>
    </div>
</div>
<!-- ################# FIN - MODIFICAR ################# -->
