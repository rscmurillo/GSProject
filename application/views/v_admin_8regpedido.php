<h1 class="page-header">
    Administrar Pedido <small></small>
</h1>
<div class="row">
<div class="col-lg-6">
	<label><strong>Ingrese nombre del producto para la busqueda</strong></label>
	<div class="input-group">
    <input type="text" class="form-control light-table-filter" data-table="order-table" placeholder="Filtro">    </input>
	</div>
</div>
<div class="col-lg-4">
</div>
</div>

<hr>

<script type="text/javascript">
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>

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
	<div class="col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			<div class="row text-center">
				<h4><strong><i class="fa fa-fw fa-tags fa-1x"></i> PRODUCTOS</strong></h4>
			</div>
			</div>
		
			<div class="panel-body">
			<div class="datagrid">
			<table class="order-table table">
				<thead>
				<tr class="titulo"> 
					<td>
						NOMBRE
					</td>
					<td >
						CANTIDAD
					</td>
					<td>
						AGREGAR
					</td>
				</tr>
			</thead>
			<tbody>
			<?php
			
				foreach($productos->result_array() as $f)
				{
					echo "<tr>";
						echo form_open(base_url()."index.php/c_pedido/addpro");
						echo "<th>".$f['pro_nombre']."</th>";
						echo '<th><input type="number" value="1" class="" name="can" required>  </input></th>';
						echo form_hidden('cod', $f['pro_codigo']);
						echo form_hidden('pre', $f['pro_precio']);
						echo form_hidden('nom', $f['pro_nombre']);
						echo '<th><button type="submit" class="btn btn-primary"><i class="fa fa-plus fa-1x"></i> Agregar</button></center></th>';
						echo form_close();
					echo "</tr>";
				}
			?>
			</tbody>
			</table>
		</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
    	<?php
    	if($this->cart->total_items()!=0)
		{
		?>
    	<div class="panel panel-primary">
            <div class="panel-heading">
            	<div class="row text-center">
            		<h4><strong><i class="fa fa-fw fa-cubes fa-1x"></i> DETALLE DEL PEDIDO</strong></h4>
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
                            <th class="text-center">PRECIO</th>
                            <th class="text-center">PRECIO TOTAL</th>
                            <th class="danger text-center"></th>
                         </tr>
					</thead>
					<tbody>
					<?php
						foreach($this->cart->contents() as $c)
						{
							echo form_open(base_url()."index.php/c_pedido/delpro");
							$o=$this->cart->product_options($c['rowid']);
							echo '<tr>';
							echo '<td><center>'.$c['name'].'</center></td>';
							echo '<td><center>'.$c['qty'].'</center></td>';
							echo '<td><center>'.$c['price'].'</center></td>';	
							echo '<td><center>'.$c['price']*$c['qty'].'</center></td>';
							echo '<td><center><button type="submit" name="quitar" class="btn btn-danger"><i class="fa fa-trash-o fa-1x"></i></button></center></td>';
							echo '</tr>';
							echo form_hidden('rowid', $c['rowid']);
							echo form_close();
						}
					?>
					</tbody>
            		</table>
            		<tr><center>
            		<button type="button" data-toggle="modal" data-target="#Pedido" class="btn btn-primary">REGISTRAR PEDIDO</button>
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
<div class="modal fade" id="Pedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Registrar Nuevo Pedido</h4>
		    </div>
			 <div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
							<div class="row text-center">
								<h4><strong><i class="fa fa-fw fa-cubes fa-1x"></i> DATOS GENERALES DEL PEDIDO</strong></h4>
							</div>
							</div>
							<?=form_open(base_url()."index.php/c_pedido/registro")?>
							<div class="panel-body">
								<div class="form-group">
<div class="form-group col-lg-6 text-center">
									<label class="text-center"><strong>CLIENTE</strong></label>
									<?php
									$classe = 'class="form-control"';
									echo form_dropdown('cliente', $clientes,'cat',$classe);
									?>
 </div>
<div class="form-group col-lg-6 text-center">
	<label class="text-center"><strong>FECHA DE ENTREGA</strong></label>
<input type="date" class="form-control text-center" name="fechaentrega">
		                        </div>
									
		                        	</div>
		                        <?php
									$t = $this->cart->total();
									$ti = $this->cart->total_items();
								?>
								<div class="form-group col-lg-4 text-center">
									<label class="text-center"><strong>FECHA</strong></label>
				                    <input type="text" class="form-control text-center" name="fec" value="<?php echo date('Y-m-d'); ?>" readonly>
		                        </div>
		                        <div class="form-group col-lg-4 text-center">
									<label class="text-center"><strong>TOTAL</strong></label>
				                    <input type="text" class="form-control text-center" name="ptot" value="<?= $t?>" readonly>
		                        </div>
		                        <div class="form-group col-lg-4 text-center">
									<label><strong>TOTAL ITEMS</strong></label>
				                    <input type="text" class="form-control text-center" name="ctot" value="<?= $ti?>" readonly>
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
