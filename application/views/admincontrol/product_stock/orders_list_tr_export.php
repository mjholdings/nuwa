<?php foreach ($getallorders as $import_order) { ?>
	<tr>
		<td class="txt-cntr"><?php echo $import_order['id']; ?></td>
		<td class="txt-cntr"><?php echo $import_order['created_at']; ?></td>
		<td class="txt-cntr"><?php echo $import_order['firstname'] . ' ' . $import_order['lastname']; ?></td>
		<td class="txt-cntr"><?php echo $import_order['branch_name']; ?></td>
		<td class="txt-cntr order-status"><?php echo c_format($import_order['total']); ?></td>
		<td>
			<a href="<?= base_url('admincontrol/stock_vieworder_export/' . $import_order['id']) ?>" class="btn btn-primary btn-sm"><?= __('admin.details') ?></a>
			<a type="button" data-id="<?= $import_order['id'] ?>" class="btn btn-danger btn-sm btn-trash"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php } ?>