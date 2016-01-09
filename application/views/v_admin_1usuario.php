<h1 class="page-header">
    Administrar Usuario <small></small>
</h1>
<div class="row">
	<div class="col-lg-9">
		<?=form_open(base_url()."index.php/c_usuario/buscar")?>
		<div class="form-group input-group">
		
            <input type="text" class="form-control" placeholder="Ej. Nombre del Usuario" name="bus">
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
if(isset ($usuarios))
{
	if($usuarios->num_rows == 0)
		{
		echo '<div class="row">';
		echo '<div class="col-lg-12">';
		    echo '<div class="alert alert-danger alert-dismissable">';
		        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        echo '<center><i class="fa fa-warning"></i> <strong>Aviso..!! </strong> No existe ningun USUARIO registrado.';
		    echo '</center></div>';
		echo '</div>';
		echo '</div>';
		}
}
?>

<script>

function eliminar_registro(a, b, c, d)
{
	document.getElementById('codEliminar').value = a;
	document.getElementById('codEliminarOculto').value = a;
	document.getElementById('nomEliminar').value = b;
	document.getElementById('apeEliminar').value = c;
	document.getElementById('carEliminar').value = d;
	$('')
}

function modificar_registro(a, b, c, d, e, f, g, h)
{
	document.getElementById('codModificar').value = a;
	document.getElementById('codModificarOculto').value = a;
	document.getElementById('nomModificar').value = b;
	document.getElementById('apeModificar').value = c;
	document.getElementById('telModificar').value = d;
	document.getElementById('dirModificar').value = e;
	document.getElementById('logModificar').value = f;
	document.getElementById('pasModificar').value = g;
	document.getElementById('carModificar').value = h;
}

</script>
<?php
 if(isset($usuarios))
{
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <div class="row text-center">
            	<h2><strong><i class="fa fa-fw fa-users fa-1x"></i> USUARIOS</strong></h2>
            </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-responsive" id="dataTables-example">
                        <thead>
                            <tr class="active">
                                <th class="text-center">NOMBRES</th>
                                <th class="text-center">APELLIDOS</th>
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">DIRECCION</th>
                                <th class="text-center">LOGIN</th>
                                <th class="text-center">PASSWORD</th>
                                <th class="text-center">CARGO</th>
                                <th class="success text-center">EDITAR</th>
                                <th class="danger text-center">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody> 

<?php
	if($usuarios->num_rows() != 0)
	{
		foreach($usuarios->result_array() as $f)
		{?>
		<tr>
			<td><?= $f['usu_nombre']?></td>
			<td><?= $f['usu_apellido']?></td>
			<td><?= $f['usu_telefono']?></td>
			<td><?= $f['usu_direccion']?></td>
			<td><?= $f['usu_login']?></td>
			<td><?= $f['usu_password']?></td>
			<td><?= $f['usu_cargo']?></td>
			<td class='text-center'>
				<a href='#' data-toggle='modal' data-target='#Modificar' onclick="modificar_registro('<?= $f['usu_codigo']?>','<?= $f['usu_nombre']?>','<?= $f['usu_apellido']?>','<?= $f['usu_telefono']?>','<?= $f['usu_direccion']?>','<?= $f['usu_login']?>','<?= $f['usu_password']?>','<?= $f['usu_cargo']?>')"><i class='fa fa-pencil fa-1x'></i></a>
			</td>
			<td class='text-center'>
				<a href='#' data-toggle='modal' data-target='#Eliminar' onclick="eliminar_registro('<?= $f['usu_codigo']?>','<?= $f['usu_nombre']?>','<?= $f['usu_apellido']?>','<?= $f['usu_cargo']?>')"><i class='fa fa-trash-o fa-1x'></i></a>
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
								<h4><strong><i class="fa fa-fw fa-users fa-1x"></i> DATOS DEL USUARIO</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_usuario/registro")?>
							<div class="panel-body">
								<div class="form-group">
									<label><strong>Nombres</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Maria" name="nom">
                                </div>
                                <div class="form-group">
									<label><strong>Apellidos</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Rojas" name="ape">
                                </div>
                                <div class="form-group">
									<label><strong>Telefono</strong></span></label>
		                            <input type="number" class="form-control" placeholder="Ej. 4577226" name="tel">
                                </div>
                                <div class="form-group">
									<label><strong>Direccion</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Av. Heroinas" name="dir">
                                </div>
                                <div class="form-group">
									<label><strong>Nombre de Usuario</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. mari034" name="log">
                                </div>
                                <div class="form-group">
									<label><strong>Contraseña</strong></span></label>
		                            <input type="password" class="form-control" placeholder="Minimo 8 caracteres" name="pas">
                                </div>
                                <div class="form-group">
									<label><strong>Cargo</strong></span></label>
									<select class="form-control" name="car">
									  <option>Administrador</option>
									  <option>Encargado de Almacen</option>
									  <option>Encargado de Produccion</option>
									</select>
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
								<h4><strong><i class="fa fa-fw fa-users fa-1x"></i> ¿ESTA SEGURO EN ELIMINAR EL REGISTRO?</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_usuario/eliminar")?>
							<div class="panel-body">
								<div class="form-group input-group">
									<span class="input-group-addon"><strong>Codigo del Usuario</strong></span>
		                            <input type="text" class="form-control text-center" id="codEliminar" disabled>
		                            <input type="hidden" name="cod" id="codEliminarOculto">
                                </div>
                                <div class="form-group input-group">
									<span class="input-group-addon"><strong>Nombre del Usuario</strong></span>
		                            <input type="text" class="form-control text-center" id="nomEliminar" disabled>
                                </div>
                                <div class="form-group input-group">
									<span class="input-group-addon"><strong>Apellido del Usuario</strong></span>
		                            <input type="text" class="form-control text-center" id="apeEliminar" disabled>
                                </div>
                                <div class="form-group input-group">
									<span class="input-group-addon"><strong>Cargo</strong></span>
		                            <input type="text" class="form-control text-center" id="carEliminar" disabled>
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
								<h4><strong><i class="fa fa-fw fa-users fa-1x"></i> DATOS DE LA MODIFICACION</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_usuario/modificar")?>
							<div class="panel-body">
								<div class="form-group input-group">
									<span class="input-group-addon"><strong>Codigo del Usuario</strong></span>
		                            <input type="text" class="form-control text-center" id="codModificar" disabled>
		                            <input type="hidden" name="cod" id="codModificarOculto">
                                </div>
                                <div class="form-group">
									<label><strong>Nombre</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Nombre" id="nomModificar" name="nom">
                                </div>
                                <div class="form-group">
									<label><strong>Apellido</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Apellido" id="apeModificar" name="ape">
                                </div>
                                <div class="form-group">
									<label><strong>Teléfono</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Telefono" id="telModificar" name="tel">
                                </div>
                                <div class="form-group">
									<label><strong>Direccion</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Direccion" id="dirModificar" name="dir">
                                </div>
                                <div class="form-group">
									<label><strong>Nombre de Usuario</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Usuario" id="logModificar" name="log">
                                </div>
                                <div class="form-group">
									<label><strong>Contraseña</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Contraseña" id="pasModificar" name="pas">
                                </div>
                                <div class="form-group">
									<label><strong>Cargo</strong></span></label>
		                            <input type="text" class="form-control" placeholder="Ej. Cargo" id="carModificar" name="car" readonly>
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

