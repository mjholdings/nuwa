<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="pull-right">
                    <a href="<?= base_url('adminbranch/form/') ?>" class="btn btn-primary add-new"><?= __("admin.add_new") ?></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?= __("admin.sn") ?></th>
                                    <th><?= __("admin.name") ?></th>
                                    <th><?= __("admin.address") ?></th>
                                    <th><?= __("admin.phone") ?></th>
                                    <th><?= __("admin.location") ?></th>
                                    <th width="180px"><?= __("admin.action") ?></th>
                                </tr>
                            </thead>
                            <tbody id="branch-list">
                                <?php foreach($branches as $key=> $branch){ ?>
                                    <tr>
                                        <td><?= (++$key) ?></td>
                                        <td><?= $branch->name ?></td>
                                        <td><?= $branch->address ?></td>
                                        <td><?= $branch->phone ?></td>
                                        <td><?= $branch->location ?></td>
                                        <td>
                                            <a href="<?= base_url('adminbranch/form/'.$branch->id) ?>" class="btn btn-warning bg-warning text-dark" data-toggle="tooltip" data-original-title="<?= __('admin.update') ?>"><?= __('admin.update') ?></a>
                                            <button data-toggle="tooltip" data-original-title="<?= __("admin.delete") ?>" class="btn btn-danger delete-button" data-id="<?=$branch->id?>"><?= __("admin.delete") ?></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>

<script type="text/javascript">
    $(".delete-button").on('click', function(){
        if (!confirm('<?= __('admin.are_you_sure') ?>')) {
            return false;
        }
        
        $.ajax({
            url: '<?= base_url("adminbranch/delete") ?>',
            type: 'POST',
            dataType: 'json',
            data: {id: $(this).attr("data-id")},
            success: function(response){
                if (response.status == 1) {
                    window.location.reload();
                } else {
                    alert(response.message);
                }
            }
        });
    });
</script>
