<table class="table table-bordered table-responsive" id="dataTables-example">
  	<thead>
      <tr class="active">
          <th class="text-center">CODIGO</th>
          <th class="text-center">MATERIA PRIMA</th>
          <th class="text-center">TOTAL FALTANTE</th>
      </tr>
   </thead>
	<tbody> 
	<?php
		foreach($alertasReportes->result_array() as $f)
		{
			echo "<tr>";
			echo "<td class='text-center'>".$f["map_codigo"]."</td>";
			echo "<td class='text-center'>".$f["map_nombre"]."</td>";
			echo "<td class='text-center'>".$f["total"]."</td>";
			echo "</tr>";
		}
	?>
	</tbody>
</table>

