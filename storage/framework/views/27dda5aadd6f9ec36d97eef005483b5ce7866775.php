<h3>Part Code: 
<?php foreach($data as $value): ?>
	<?php echo e($value['code']); ?>

<?php endforeach; ?>
</h3>
<h3>Part Name: 
<?php foreach($po_details as $povalue): ?>
	<?php echo e($povalue->Name); ?>

<?php endforeach; ?>
</h3>
<h3>Customer: <?php echo e($povalue->Customer); ?></h3>
<table border="1" cellpadding="0" cellspacing="0" style="width: 500px;">
	<thead>
		<tr>
			<th scope="col">R3Answer</th>
			<th scope="col">Qty</th>
			<th scope="col">Time</th>
			<th scope="col">Re</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($answers as $answer): ?>
		<tr>
			<td><?php echo e($answer->r3answer); ?></td>
			<td style="text-align: right"><?php echo e($answer->qty); ?></td>
			<td style="text-align: right"><?php echo e($answer->time); ?></td>
			<td><?php echo e($answer->re); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<p>NEW: &nbsp; <?php echo e($value['new1']); ?> &nbsp; <?php echo e($value['new2']); ?></p>
<p>WHAT IS THE REASON:&nbsp; <?php echo e($value['reason']); ?></p>
<p>NOTE:&nbsp; <?php echo e($value['note']); ?></p>