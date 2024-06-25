<!-- Modal HTML -->
<div class="modal fade" id="storeLocationModal" tabindex="-1" role="dialog" aria-labelledby="storeLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeLocationModalLabel">Vui lòng chọn cửa hàng gần bạn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Danh sách chi nhánh -->
                <div id="branch-list" class="list-group">
                    <?php foreach ($branch_list as $branch): ?>
                        <div class="branch-item list-group-item d-flex justify-content-between align-items-center">
                            <div class="branch-info">
                                <div class="branch-name"><?php echo $branch->name; ?></div>
                                <div class="branch-address"><?php echo $branch->address; ?></div>
                            </div>
                            <button class="btn btn-outline-primary select-branch-btn" data-branch-id="<?php echo $branch->id; ?>" data-branch-name="<?php echo $branch->name; ?>">Chọn</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
