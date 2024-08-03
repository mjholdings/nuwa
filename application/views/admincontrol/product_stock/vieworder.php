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

			<div class="card-body">
				<h4 class="mb-4"><?= __('Đơn nhập') ?> : (<?= orderId($order['id']) ?>)</h4>
				<p><i class="mdi mdi-calendar-text"></i> <?= __('admin.date') ?> : <?php echo date("m-j-Y h:i A", strtotime($order['created_at'])); ?></p>

				<h5 class="mt-3"><?= __('admin.product_info') ?></h5>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th colspan="2"><?= __('admin.name') ?></th>
								<th><?= __('admin.unit_price') ?></th>
								<th><?= __('admin.quantity') ?></th>
								<th><?= __('admin.total_discount') ?></th>
								<th><?= __('admin.total') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($products as $key => $product) { ?>
								<tr colspan="2">
									<td width="50px"><img src="<?= $product['image'] ?>" class="img-fluid" onerror="this.onerror=null;this.src='<?= base_url('assets/images/no_image_available.png') ?>';"></td>
									<td>
										<h5><?php
											$combinationString = "";
											if (isset($product['variation']) && !empty($product['variation'])) {
												$variation = json_decode($product['variation']);
												foreach ($variation as $key => $value) {
													if ($key == 'colors') {
														$combinationString .= ($combinationString == "") ? explode("-", $value)[1] : "," . explode("-", $value)[1];
													} else {
														$combinationString .= ($combinationString == "") ? $value : "," . $value;
													}
												}
											}
											?>
											<?= $product['product_name'] ? $product['product_name'] : '<i class="text-muted">' . __('admin.product_not_available') . '</i>' ?> <?= ($combinationString != "") ? "(" . $combinationString . ")" : "" ?>
										</h5>
										<?php if (isset($venders[$product['product_id']])) { ?>
											<b><?= __('admin.vendor_name') ?></b> : <?php echo $venders[$product['product_id']]['firstname'] . " " . $venders[$product['product_id']]['lastname'] ?>
											<br>
											<b><?= __('admin.vendor_email') ?></b> : <?php echo $venders[$product['product_id']]['email']; ?>
											<br>
											<b><?= __('admin.vendor_commission') ?></b> : <?php echo c_format($venders[$product['product_id']]['vendor_commission']); ?>
										<?php } ?>
										<?php if ($product['commission']) { ?>
											<br>
											<hr>
											<b><?= __('admin.name') ?></b> : <?php echo $product['refer_name']; ?>

											<br>
											<b><?= __('admin.email') ?></b> : <?php echo $product['refer_email']; ?>

											<br>
											<b><?= __('admin.affiliate_commission') ?></b> : <?php echo c_format($product['commission']); ?>
										<?php } ?>

										<?php

										if ($product['admin_commission']) { ?>
											<br>
											<hr>
											<b><?= __('admin.action_commission_settings') ?></b> : <?php echo c_format($product['admin_commission']); ?>
										<?php } ?>

										<?php if ($product['coupon_discount'] > 0) { ?>
											<p class="couopn-code-text">
												<?= __('admin.code') ?> : <span class="c-name"> <?= $product['coupon_code'] ?></span> <?= __('admin.Applied') ?>
											</p>
										<?php } ?>
										<?php if ($order['status'] == 1 && $product['product_type'] == 'downloadable' && $product['downloadable_files']) { ?>
											<div class="download">
												<?php foreach ($product['downloadable_files'] as $downloadable_filess) { ?>
													<a href="<?php echo base_url('store/downloadable_file/' . $downloadable_filess['name'] . '/' . $downloadable_filess['mask']) ?>" class="btn btn-link btn-sm" target="_blank"><?php echo $downloadable_filess['mask'] ?></a>
												<?php } ?>
											</div>
										<?php } ?>
									</td>
									<td><?php echo c_format($product['price']); ?></td>
									<td><?php echo c_format(json_decode($product['variation'])->price); ?></td>
									<td><?php echo $product['quantity']; ?></td>
									<td><?php
										if ($product['commission_type'] == 'fixed') {
											echo __('admin.fixed');
										} else {
											echo $product['commission_type'];
										}
										?></td>
									<td><?php echo c_format($product['commission']);  ?></td>
									<td>
										<?php echo isset($totals['discount_total']) ? c_format($totals['discount_total']['value']) : ''; ?>
									</td>
									<td><?php echo c_format($product['total']); ?></td>
								</tr>
							<?php } ?>
							<?php foreach ($totals as $key => $total) { ?>
								<tr>
									<td colspan="7"></td>
									<td><?= $total['text'] ?></td>
									<td><b><?php echo c_format($total['value']); ?></b></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

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
								<th><?= __('admin.mode') ?></th>
								<th><?= __('admin.transaction_id') ?></th>
								<th><?= __('admin.payment_status') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($payment_history as $key => $value) { ?>
								<tr>
									<td><?php
										if ($value['payment_mode'] == 'Bank Transfer') {
											echo __('admin.bank_transfer');
										} elseif ($value['payment_mode'] == 'Cash On Delivery') {
											echo __('admin.cash_on_delivery');
										} elseif ($value['payment_mode'] == 'OPay') {
											echo __('admin.opay');
										} elseif ($value['payment_mode'] == 'Paypal') {
											echo __('admin.paypal');
										} elseif ($value['payment_mode'] == 'Razorpay') {
											echo __('admin.razorpay');
										} elseif ($value['payment_mode'] == 'Flutterwave') {
											echo __('admin.flutterwave');
										} else {
											echo str_replace("_", " ", $value['payment_mode']);
										}
										?></td>
									<td><?php echo $order['txn_id']; ?></td>
									<td><?php
										if ($value['paypal_status'] == 'Processed') {
											echo __('admin.processed');
										} else {
											echo $value['paypal_status'];
										}
										?></td>
								</tr>
							<?php } ?>
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


<div class="row">
	<div class="col-lg-12 col-sm-12 align-self-center">
		<div class="card bg-white mb-3">

			<div class="card-body new-user">
				<div class="row text-start">
					<div class="col-sm-12">
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
							<button name="submit" class="btn btn-primary mt-3" type="submit"><?= __('admin.submit') ?></button>
						</form>
					</div>
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