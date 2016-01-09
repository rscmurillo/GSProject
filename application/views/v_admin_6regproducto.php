<h1 class="page-header">
    Administrar Producto <small></small>
</h1>
<div class="row">
	<div class="col-lg-3"> 
	<div class="form-group">
		<?=form_open(base_url()."index.php/c_producto/buscar")?>
		<label><strong> Seleccione Categoria</strong></span></label>
		<?php
		$classe = 'class="form-control"';
		echo form_dropdown('categoria', $categorias,'cat',$classe);
		?>
	</div>
	</div>
	<div class="col-lg-1"> 
	</div>
	<div class="col-lg-7">
		
		
		<label><strong>Ingrese nombre de la materia prima</strong></label>
		<div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Ej. Nombre de la materia prima" name="bus">
		        <span class="input-group-btn">
		        <button type="submit" class="btn btn-success btn-md"><i class="fa fa-search"></i> Buscar</button>
		        <?=form_close() ?>
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
	

?>

<div class="row">
    <div class="col-lg-12">
    <?php
    if(isset($productos))
	{
    ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
        	<div class="row text-center">
        		<h2><strong><i class="fa fa-fw fa-database fa-1x"></i> PRODUCTOS</strong></h2>
        	</div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
        	<div class="dataTable_wrapper">
        		<table class="table table-bordered table-responsive" id="dataTables-example">
        			<thead>
                        <tr class="active">
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">PRECIO</th>
                            <th class="text-center">DESCRIPCION</th>
                            <th class="text-center">DETALLE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					foreach($productos->result_array() as $f)
					{
						echo '<tr>';
						echo '<td>'.$f['pro_nombre'].'</td>';
						echo '<td>'.$f['pro_precio'].'</td>';
						echo '<td>'.$f['pro_descripcion'].'</td>';
						?>
						<td class='text-center'>
							<a href='#' data-toggle='modal' data-target="#<?=$f['pro_codigo']?>"><i class='fa fa-paste fa-1x'></i></a>
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




<div class="row">
    <div class="col-lg-6">
    <?php
    if(isset($materiap))
	{
    ?>
    	<div class="panel panel-primary">
    		<div class="panel-heading">
            	<div class="row text-center">
            		<h2><strong><i class="fa fa-fw fa-database fa-1x"></i> MATERIAS PRIMAS</strong></h2>
            	</div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	<div class="dataTable_wrapper">
            		<table class="table table-bordered table-responsive" id="dataTables-example">
            			<thead>
                            <tr class="active">
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CANTIDAD</th>
                                <th class="text-center">UND/MED</th>
                                <th class="text-center">CANTIDAD</th>
                                <th class="success text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						foreach($materiap->result_array() as $f)
						{
							echo '<tr>';
							echo '<td>'.$f['map_nombre'].'</td>';
							echo '<td>'.$f['almm_cantidad'].'</td>';
							echo '<td>'.$f['map_un_medida'].'</td>';
							echo '<td class="text-center">';
							echo form_open('c_producto/agregar_car');
							echo '<input type="text" max="'.$f['almm_cantidad'].'" min="1" VALUE="1" size="3" name="cantidad"></input></center></td>';
							echo form_hidden('map_nombre', $f['map_nombre']);
							echo form_hidden('map_codigo', $f['map_codigo']);
							echo form_hidden('map_un_medida', $f['map_un_medida']);
							echo form_hidden('almm_codigo', $f['almm_codigo']);
							echo '</td>';
							echo '<td><center>';
							echo '<button type="submit" class="btn btn-primary"><i class="fa fa-plus fa-1x"></i> Agregar</button></center></td>';
							echo form_close();
							echo '</tr>';
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
	
    <div class="col-lg-6">
    	<?php
    	if($this->cart->total_items()!=0)
		{
		?>
    	<div class="panel panel-primary">
            <div class="panel-heading">
            	<div class="row text-center">
            		<h2><strong><i class="fa fa-fw fa-cubes fa-1x"></i> PRODUCTO</strong></h2>
            	</div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	<div class="dataTable_wrapper">
            		<table class="table table-bordered table-responsive" id="dataTables-example">
            		<thead>
            			<tr class="active">
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">CANTIDAD</th>
                            <th class="text-center">UND/MED</th>
                            <th class="danger text-center"></th>
                         </tr>
					</thead>
					<tbody>
					<?php
					foreach($this->cart->contents() as $c)
					{
						echo form_open(base_url()."index.php/c_producto/quitar_car");
						$o=$this->cart->product_options($c['rowid']);
						echo '<tr>';
						echo '<td><center>'.$c['name'].'</center></td>';
						echo '<td><center>'.$c['qty'].'</center></td>';
						echo '<td><center>'.$o['med'].'</center></td>';	
						echo '<td><center><button type="submit" name="quitar" class="btn btn-danger"><i class="fa fa-trash-o fa-1x"></i></button></center></td>';
						echo '</tr>';
						echo form_hidden('rowid', $c['rowid']);
						echo form_close();
					}
					?>
					</tbody>
            		</table>
            		<tr><center>
            		<button type="button" data-toggle="modal" data-target="#AgregarNuevo" class="btn btn-primary">REGISTRAR PRODUCTO</button>
					</center></tr>
            	</div>
            </div>
        </div> 
       
       	</div>
        <?php
    	}
		?>
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
								<h4><strong><i class="fa fa-fw fa-cubes fa-1x"></i> DATOS GENERALES DEL PRODUCTO</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_producto/registro")?>
							<div class="panel-body">
								<div class="form-group">
									<label><strong>Nombre Producto</strong></span></label>
				                    <input type="text" class="form-control" placeholder="Ej. nombre del producto" name="nom">
		                        </div>
		                        <div class="form-group">
									<label><strong>Precio</strong></span></label>
				                    <input type="number" class="form-control" placeholder="Ej. Precio del Producto" name="pre">
		                        </div>
		                        <div class="form-group">
									<label><strong>Descripción</strong></span></label>
				                    <input type="text" class="form-control" placeholder="Ej. Descripcion" name="des">
		                        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		    <div class="modal-footer">
		    	<label class="text-danger"><strong>*Para cerrar la ventana y cancelar el registro, presione (Esc)</strong></span></label>
		        <input type="submit" class="btn btn-primary" value="REGISTRAR"></input>
		        			<?=form_close()?>
		    </div>
		</div>
	</div>
</div>


<!-- ################# VER ################# -->
<?php
if($productos->num_rows() != 0)
{
	foreach($productos->result_array() as $f)
	{?>

<div class="modal fade" id="<?=$f['pro_codigo']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> <?=$f['pro_nombre']?></h4>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-green">
							<div class="panel-heading">
							<div class="row text-center">
								<h4><strong><i class="fa fa-fw fa-paste fa-1x"></i> DETALLE DEL PRODUCTO</strong></h4>
							</div>
							</div>
							<div class="panel-body">
								<table class="table table-bordered table-responsive" id="dataTables-example">
						            <thead>
						                <tr class="active">
						                    <th class="text-center">NOMBRE</th>
						                    <th class="text-center">CANTIDAD</th>
						                    <th class="text-center">UNIDAD DE MEDIDA</th>
						                </tr>
						            </thead>
						            <tbody> 
									<?php
									if (!empty($lista)) 
									{
										foreach($lista[$f['pro_codigo']]->result_array() as $v)
										{?>
										<tr>
											<td class="text-center"><?= $v['map_nombre']?></td>
											<td class="text-center"><?= $v['prm_cantidad']?></td>
											<td class="text-center"><?= $v['map_un_medida']?></td>
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
