<table class="table table-bordered table-responsive" id="dataTables-example">
    <thead>
        <tr class="active">
	  		<th class="text-center">FECHA ENTRADA DE MATERIA PRIMA</th>
            <th class="text-center">DETALLE DE MATERIA PRIMA</th>
        </tr>
    </thead>
    <tbody> 

<?php
if($materiaprima->num_rows() != 0)
{
	foreach($materiaprima->result_array() as $f)
	{?>
	<tr>
		<td class='text-center'><?= $f['imap_fecha_ingreso']?></td>
		<td class='text-center'>
		<table class="table table-bordered table-responsive" id="dataTables-example">
          	<thead>
              <tr class="active">
                  <th class="text-center">MATERIA PRIMA</th>
                  <th class="text-center">CANTIDAD</th>
                  <th class="text-center">CANTIDAD BOLSA</th>
                  <th class="text-center">TOTAL</th>
                  <th class="text-center">PRECIO</th>
                  <th class="text-center">UNIDAD DE MEDIDA</th>
              </tr>
           </thead>
		<tbody> 
		<?php
			foreach($detalles[$f['imap_fecha_ingreso']]->result_array() as $d)
			{
				echo "<tr>";
				echo "<td class='text-center'> ".$d["map_nombre"]."</td>";
				echo "<td class='text-center'>".$d["imap_cantidad"]."</td>";
				echo "<td class='text-center'>".$d["imap_cant_bolsa"]."</td>";
				echo "<td class='text-center'>".($d["imap_cant_bolsa"]*$d["imap_cantidad"])."</td>";
				echo "<td class='text-center'>".$d["map_precio"]."</td>";
				echo "<td class='text-center'>".$d["map_un_medida"]."</td>";
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
