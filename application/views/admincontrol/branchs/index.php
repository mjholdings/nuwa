</style>
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-header">
				<div class="pull-right">
					<a href="<?= base_url('admincontrol/addbranch/')  ?>" class="btn btn-primary add-new" id="<?= $lang['id'] ?>"><?= __("admin.add_new") ?></a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<table class="table">
							<thead>
								<tr>
									<th><?= __("admin.sn") ?></th>
									<th><?= __("admin.branch_name") ?></th>
                  <th><?= __("admin.address") ?></th>
									<th><?= __("admin.phone") ?></th>
									<th><?= __("admin.location") ?></th>									
									<th width="180px"><?= __("admin.action") ?></th>
								</tr>
							</thead>
							<tbody id="user-groups">
								<?php foreach($branchs as $branch): ?>                  
									<tr>
										<td><?= $branch["id"] ?></td>										
										<td><?= $branch["name"] ?></td>
										<td style="word-wrap: break-word;"><?= $branch["address"] ?></td>										
										<td><?= $branch["phone"] ?></td>										
										<td style="width:100;word-wrap: break-all;"><?= $branch["location"] ?></td>																				
										<td>
										<a href="<?= base_url('admincontrol/addbranch/'.$branch->id)  ?>" class="btn btn-warning bg-warning text-dark" data-toggle="tooltip" data-original-title="<?= __('admin.update') ?>"><?= __('admin.update') ?></a>
										<button data-toggle="tooltip" data-original-title="<?= __("admin.delete") ?>" class="btn btn-danger detele-button" data-id="<?=$group->id?>"><?= __("admin.delete") ?></button>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div>

<script type="text/javascript">

	$(document).on('change', ".btn_lang_toggle", function(){
		let skip_change = false;
		let id = $(this).data('lang_id');
		let column = $(this).data('column');
		let checked = $(this).prop('checked');

		if (checked == true) {
			var status = 1;
		}else{
			var status = 0;
		}

		$.ajax({
			url: "<?= base_url('admincontrol/group_status_toggle')?>",
			type: "POST",
			dataType: "json",
			data: {
				id:id,
				status:status,
				column:column
			},
			success: function (response) {	
				window.location.reload();
			}
		});
	});	

	$(".detele-button").on('click',function(){
		$('.tooltip').remove();
		$this = $(this);


		if(!confirm('<?= __('admin.are_you_sure') ?>')) {
			return false
		}
		
		
		$.ajax({
			url:'<?= base_url("admincontrol/delete_branch") ?>',
			type:'POST',
			dataType:'json',
			data:{id:$this.attr("data-id")},
			beforeSend:function(){
				$this.prop("disabled",true);
			},
			complete:function(){
				$this.prop("disabled",false);
			},
			success:function(json){
				
				if(json.status==1)
				{
					window.location.reload();	
				}else{
					Swal.fire('Warning', json.message, 'warning');
				}
				
			},
		})
	});

	setTimeout(function(){ $('.alert-dismissable').remove(); }, 5000);

</script>