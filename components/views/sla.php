
<?php 
// echo "<pre>";
// print_r($sla);
// echo "</pre>";
// exit;
 ?>
<table class="detail-view table table-bordered table-condensed" id="yw0">
	<tbody>
		<tr class="odd">
                    <th><?php echo Yii::t('ticketsModule.contentForm','EXPECTED.REACTION') ?></th>
			<td><?php echo $sla[0]->format('H:i d-m-Y'); ?></td>
		</tr>
		<tr class="even">
			<th><?php echo Yii::t('ticketsModule.contentForm','WAITING.CLOSURE') ?></th>
			<td><?php echo $sla[1]->format('H:i d-m-Y'); ?></td>
		</tr>
		<?php if($sla[2] !== 'none'):?>
		<tr class="even">
			<th><?php echo Yii::t('ticketsModule.contentForm','IN.WORK') ?></th>
			<td><?php 
			 echo ($sla[2] === 'none') ?  '' :  $sla[2]->format('H:i d-m-Y')  ?></td>
		</tr>
	<?php endif; ?>
		<?php 
		
		if($sla[3] !== 'none'):?>
		<tr class="even">
			<th><?php echo Yii::t('ticketsModule.contentForm','RESOLVED') ?></th>
			<td><?php echo $sla[3]->format('H:i d-m-Y'); ?></td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>