<h1 class="page-header">
    Administrar Categoria <small></small>
</h1>
<div class="row">
	<div class="col-lg-9">
		<?=form_open(base_url()."index.php/c_categoria/buscar")?>
		<div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Ej. Nombre del categoria" name="bus">
            <span class="input-group-btn">
            <input type="submit" class="btn btn-success btn-md" value="Buscar"><i class="fa fa-search"></i></input>
            <?=form_close() ?>
            <button type="button" data-toggle="modal" data-target="#AgregarNuevo" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Registrar Nuevo</button>
            </span>
        </div>
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
if(isset ($categorias))
{
	if($categorias->num_rows == 0)
		{
		echo '<div class="row">';
		echo '<div class="col-lg-12">';
		    echo '<div class="alert alert-danger alert-dismissable">';
		        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        echo '<center><i class="fa fa-warning"></i> <strong>Aviso..!! </strong> No existe ninguna CATEGORIA registrado.';
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

function modificar_registro(a, b, c)
{
	document.getElementById('codModificar').value = a;
	document.getElementById('codModificarOculto').value = a;
	document.getElementById('nomModificar').value = b;
	document.getElementById('desModificar').value = c;
}

</script>
<?php
 if(isset($categorias))
{
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <div class="row text-center">
            	<h2><strong><i class="fa fa-fw fa-tags fa-1x"></i> CATEGORIAS</strong></h2>
            </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-responsive" id="dataTables-example">
                        <thead>
                            <tr class="active">
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">DESCRIPCION</th>
                                <th class="success text-center">EDITAR</th>
                                <th class="danger text-center">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody> 

<?php
if($categorias->num_rows() != 0)
{
	foreach($categorias->result_array() as $f)
	{?>
	<tr>
		<td><?= $f['cat_nombre']?></td>
		<td><?= $f['cat_descripcion']?></td>
		<td class='text-center'>
			<a href='#' data-toggle='modal' data-target='#Modificar' onclick="modificar_registro('<?= $f['cat_codigo']?>','<?= $f['cat_nombre']?>','<?= $f['cat_descripcion']?>')"><i class='fa fa-pencil fa-1x'></i></a>
		</td>
		<td class='text-center'>
			<a href='#' data-toggle='modal' data-target='#Eliminar' onclick="eliminar_registro('<?= $f['cat_codigo']?>','<?= $f['cat_nombre']?>')"><i class='fa fa-trash-o fa-1x'></i></a>
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


<!-- ################# AGREGAR NUEVO ################# -->
<div class="modal fade" id="AgregarNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Registrar Nuevo</h4>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
							<div class="row text-center">
								<h4><strong><i class="fa fa-fw fa-tags fa-1x"></i> DATOS DEL CATEGORIA</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_categoria/registro")?>
							<div class="panel-body">
								<div class="form-group">
									<label><strong>Nombre</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Nombre" name="nom">
                                </div>
                                <div class="form-group">
									<label><strong>Descripcion</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Descripcion" name="des">
                                </div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
            	<label class="text-danger"><strong>*Para cerrar la ventana y cancelar el registro, presione (Esc)</strong></span></label>
                <input type="submit" class="btn btn-primary" value="Registrar"></input>
                			<?=form_close()?>
            </div>
        </div>
    </div>
</div>
<!-- ################# FIN - AGREGAR NUEVO ################# -->

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

<!-- ################# MODIFICAR ################# -->
<div class="modal fade" id="Modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Modificar Registro</h4>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-green">
							<div class="panel-heading">
							<div class="row text-center">
								<h4><strong><i class="fa fa-fw fa-tags fa-1x"></i> DATOS DE LA MODIFICACION</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_categoria/modificar")?>
							<div class="panel-body">
								<div class="form-group input-group">
									<span class="input-group-addon"><strong>Codigo del Proveedor</strong></span>
		                            <input type="text" class="form-control text-center" id="codModificar" disabled>
		                            <input type="hidden" name="cod" id="codModificarOculto">
                                </div>
                                <div class="form-group">
									<label><strong>Nombre</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Nombre" id="nomModificar" name="nom">
                                </div>
                                <div class="form-group">
									<label><strong>Descripcion</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Descripcion" id="desModificar" name="des">
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



