<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				<div class="d-flex justify-content-between">
					<h5 class="m-0"><?= __('CHI TIẾT ĐƠN NHẬP') ?></h5>
					<div>
						<a id="toggle-uploader" href="<?php echo base_url(); ?>admincontrol/orderaction/<?php echo $order['id']; ?>/sendemail" class="btn btn-light btn-sm "><i class="mdi mdi-email-outline"></i> &nbsp;<?= __('admin.send_email') ?></a>
						<a id="toggle-uploader" href="<?php echo base_url(); ?>admincontrol/orderaction/<?php echo $order['id']; ?>/print" target='_blank' class="btn btn-light btn-sm "><i class="mdi mdi-printer"></i> &nbsp;<?= __('In đơn') ?></a>
						<button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-danger btn-sm">
							<i class="mdi mdi-delete"></i> &nbsp;<?= __('Xóa đơn') ?>
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="card-body">

			<h4 class="mb-4"><?= __('Đơn nhập') ?> : (<?= orderId($order['id']) ?>)</h4>
			<p><i class="mdi mdi-calendar-text"></i> <?= __('admin.date') ?> : <?php echo date("m-j-Y h:i A", strtotime($order['created_at'])); ?></p>

			<div class="row">
	<div class="col-lg-8">
		<div class="card mb-3">
			<div class="card-header border-0">
				<h5 class="mb-0 pb-0"><?= __('Thông tin kho hàng') ?></h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th><?= __('Mã kho') ?></th>
								<th><?= __('Tên kho') ?></th>
								<th><?= __('Địa chỉ') ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $order['branchid'] ?></td>
								<td><?php echo $order['branch_name']; ?></td>
								<td><?php echo $order['address']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php if ($order['payment_method'] == 'bank_transfer') { ?>
					<div class="form-group">
						<label class="control-label"><b><?= __('admin.bank_transfer_instruction') ?></b></label>
						<pre class="well"><?php echo $paymentsetting['bank_transfer_instruction'] ?></pre>
					</div>
				<?php } ?>

				<?php if ($order['comment']) { ?>
					<div class="form-group">
						<label class="control-label"><b><?= __('admin.order_view_comment') ?></b></label>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th><?= __('store.title') ?></th>
										<th><?= __('store.comment') ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($order['comment'] as $key => $value) { ?>
										<tr>
											<td><?= $value['title'] ?></td>
											<td><?= $value['comment'] ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				<?php } ?>

				<?php if ($order['files']) { ?>
					<div class="form-group">
						<label class="control-label"><b><?= __('admin.order_attechments_download') ?></b></label>
						<div><?php echo $order['files'] ?></div>
					</div>
				<?php } ?>
				<?php if ($order['order_country']) { ?>
					<div class="form-group">
						<label class="control-label"><b><?= __('admin.order_done_from') ?></b></label>
						<div>
							<?php echo $order['order_country']; ?><?php echo $order['order_country_flag']; ?>
						</div>
					</div>
				<?php  } ?>

				<?php if ($orderProof) { ?>
					<div class="form-group">
						<label class="control-label"><b><?= __('store.payment_proof') ?></b>
							<a href="<?= $orderProof->downloadLink ?>" target='_blank'>: <?= __('store.download') ?></a>
						</label>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

</div>


			<h5 class="mt-3"><?= __('admin.product_info') ?></h5>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th colspan="2"><?= __('admin.name') ?></th>
							<th><?= __('admin.unit_price') ?></th>
							<th><?= __('admin.quantity') ?></th>
							<th><?= __('admin.total') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $total_order = 0;
						foreach ($order['products'] as $product) { ?>
							<?php $product_featured_image = base_url('assets/images/product/upload/thumb/' . $product['product_featured_image']); ?>
							<tr colspan="2">
								<td width="50px"><img src="<?= $product_featured_image ?>" class="img-fluid" onerror="this.onerror=null;this.src='<?= base_url('assets/images/no_image_available.png') ?>';"></td>
								<td>
									<h5>
										<?= $product['product_name'] ? $product['product_name'] : '<i class="text-muted">' . __('admin.product_not_available') . '</i>' ?> <?= ($combinationString != "") ? "(" . $combinationString . ")" : "" ?>
									</h5>
								</td>
								<td><?php echo c_format($product['product_price']); ?></td>
								<td><?php echo $product['stock_quantity']; ?></td>
								<td><?php echo c_format($product['product_price'] * $product['stock_quantity']);
									$total_order += $product['product_price'] * $product['stock_quantity']; ?></td>
							</tr>
						<?php } ?>
						<tr>
							<td colspan="3"></td>
							<td><?= 'Tổng giá trị nhập hàng: ' ?></td>
							<td><b><?php echo c_format($total_order); ?></b></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="myModal" role="dailog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h4 class="text-center"><?= __('admin.are_you_sure') ?></h4>
				<br><br>
				<center>
					<a href="<?php echo base_url(); ?>admincontrol/orderaction/<?php echo $order['id']; ?>/delete/0" class="btn btn-danger"><?= __('admin.delete_order') ?></a>
					<a href="<?php echo base_url(); ?>admincontrol/orderaction/<?php echo $order['id']; ?>/delete/1" class="btn btn-danger"><?= __('admin.delete_order_with_commitions') ?></a>
					<div class="clearfix"></div><br>
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?= __('admin.cancel') ?></button>
				</center>
			</div>
		</div>
	</div>
</div>