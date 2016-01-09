<h1 class="page-header">
    ALERTAS <small>Pedidos y Materias Primas</small>
</h1>


<?php

//print_r($alertas->result_array());

?>




<?php
 if(isset($alertas))
{
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
            <div class="row text-center">
            	<h2><strong><i class="fa fa-fw fa-tags fa-1x"></i> ALERTAS</strong></h2>
            </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-responsive" id="dataTables-example">
                        <thead>
                            <tr class="active">
						  		<th class="text-center">FECHA ENTREGA</th>
                                <th class="text-center">PEDIDO</th>
                                <th class="text-center">DETALLE</th>
                            </tr>
                        </thead>
                        <tbody> 

					<?php
					if($alertas->num_rows() != 0)
					{
						foreach($alertas->result_array() as $f)
						{?>
						<tr>
							<td><?= $f['ped_fecha_entrega']?></td>
							<td><?= $f['cli_nombre']?></td>
							<td>
							<table class="table table-bordered table-responsive" id="dataTables-example">
				              	<thead>
				                  <tr class="active">
				                      <th class="text-center">MATERIA PRIMA</th>
				                      <th class="text-center">CANTIDAD FALTANTE</th>
				                  </tr>
				               </thead>
							<tbody> 
							<?php
							foreach($detalles[$f["ped_codigo"]]->result_array() as $d)
							{
								echo "<tr>";
								echo "<td>".$d["map_nombre"]."</td>";
								echo "<td>".$d["ale_falta"]." ".$d["map_un_medida"]."</td>";
								echo "</tr>";
							}
							//print_r($detalles[$f["ped_codigo"]]);
							?>
							</tbody>
                    			</table>
							</td>
					<?php
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
<?php
}
?>
