
<?php 
// echo "<pre>";
// print_r($sla);
// echo "</pre>";
// exit;
 ?>
<table class="detail-view table table-bordered table-condensed" id="yw0">
	<tbody>
		<tr class="odd">
			<th>Ожидаемая реакция до </th>
			<td><?php echo $sla[0]->format('H:i d-m-Y'); ?></td>
		</tr>
		<tr class="even">
			<th>Ожидание закрытия в</th>
			<td><?php echo $sla[1]->format('H:i d-m-Y'); ?></td>
		</tr>
		<tr class="even">
			<th>Зяли в работу</th>
			<td><?php echo $sla[2]->format('H:i d-m-Y') ?></td>
		</tr>
		<tr class="even">
			<th>Решение</th>
			<td><?php echo $sla[3]->format('H:i d-m-Y')?></td>
		</tr>
	</tbody>
</table>