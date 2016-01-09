<h1 class="page-header">
    Administrar Pedido <small></small>
</h1>
<div class="row">
<div class="col-lg-8">
	
	<label><strong>Ingrese nombre del cliente para la busqueda</strong></label>
	<div class="input-group">
    <input type="text" class="form-control" placeholder="Ej. Nombre de la materia prima" name="bus">
        <span class="input-group-btn">
	        <button type="submit" class="btn btn-success btn-md"><i class="fa fa-search"></i> Buscar</button>
		    <a href="<?= base_url(); ?>index.php/c_pedido/pedidonuevo" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Registrar Nuevo</a>
        </span>
    </input>
        
	</div>
</div>
<div class="col-lg-4">
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
	

?>

<div class="row">
    <div class="col-lg-12">
    <?php
    if(isset($pedidos))
	{
    ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
        	<div class="row text-center">
        		<h2><strong><i class="fa fa-fw fa-database fa-1x"></i> PEDIDOS</strong></h2>
        	</div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
        	<div class="dataTable_wrapper">
        		<table class="table table-bordered table-responsive" id="dataTables-example">
        			<thead>
                        <tr class="active">
                            <th class="text-center">CLIENTE</th>
                            <th class="text-center">FECHA</th>
					   <th class="text-center">FECHA DE ENTREGA</th>
                            <th class="text-center">CANTIDAD TOTAL</th>
                            <th class="text-center">PRECIO TOTAL</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">DETALLE</th>
                            <th class="text-center">ENVIAR</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					foreach($pedidos->result_array() as $f)
					{
						echo '<tr>';
						echo '<td>'.$f['cli_nombre'].'</td>';
						echo '<td>'.$f['ped_fecha'].'</td>';
						echo '<td>'.$f['ped_fecha_entrega'].'</td>';
						echo '<td>'.$f['ped_cant_total'].'</td>';
						echo '<td>'.$f['ped_prec_total'].'</td>';
						echo '<td>'.$f['ped_estado'].'</td>'; ?>
						<td class='text-center'>
							<a href='#' data-toggle='modal' data-target="#<?=$f['ped_codigo']?>"><i class='fa fa-paste fa-1x'></i></a>
						</td>
						<td class='text-center'>
							<?php 
							if($f['ped_estado'] == 'PENDIENTE')
							{
								echo form_open(base_url()."index.php/c_pedido/produccion");
								echo '<button type="submit" class="btn btn-success btn-md"><i class="fa fa-share fa-1x"></i> Produccion</button>';
								echo form_hidden('ped_codigo', $f['ped_codigo']);
								echo form_close();
							}
							if($f['ped_estado'] == 'FALTA MATERIAL')
							{
								echo form_open(base_url()."index.php/c_pedido/reenviar");
								echo '<button type="submit" class="btn btn-warning btn-md"><i class="fa fa-share fa-1x"></i> Re-Enviar</button>';
								echo form_hidden('ped_codigo', $f['ped_codigo']);
								echo form_close();
							}
							if($f['ped_estado'] == 'PRODUCCION')
							{
								echo '<button type="submit" class="btn btn-info btn-md"><i class="fa fa-share fa-1x"></i> COMPLETADO</button>';
							}
							?>
						</td>
					<?php
					}?>
                    </tbody>
        		</table>
        	</div>
       </div> 
	</div>
	<?php
	}
	?>
    </div>
</div>

<!-- ################# VER ################# -->
<?php
if($pedidos->num_rows() != 0)
{
	foreach($pedidos->result_array() as $f)
	{?>

<div class="modal fade" id="<?=$f['ped_codigo']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> <?=$f['cli_nombre']?></h4>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-green">
							<div class="panel-heading">
							<div class="row text-center">
								<h4><strong><i class="fa fa-fw fa-paste fa-1x"></i> DETALLE DEL PEDIDO</strong></h4>
							</div>
							</div>
							<div class="panel-body">
								<table class="table table-bordered table-responsive" id="dataTables-example">
						            <thead>
						                <tr class="active">
						                    <th class="text-center">NOMBRE</th>
						                    <th class="text-center">CANTIDAD</th>
						                </tr>
						            </thead>
						            <tbody> 
									<?php
									if (!empty($lista)) 
									{
										foreach($lista[$f['ped_codigo']]->result_array() as $v)
										{?>
										<tr>
											<td class="text-center"><?= $v['pro_nombre']?></td>
											<td class="text-center"><?= $v['detp_cantidad']?></td>
										</tr>
										<?php
										}
									}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
            	<label class="text-danger"><strong>*Para cerrar la ventana, presione (Esc)</strong></span></label>
            </div>
        </div>
    </div>
</div>
	<?php
	}
}
?> 
<!-- ################# FIN - VER ################# -->
