<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Branches</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Branch List</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addBranchModal">Add Branch</button>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Default</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="branchTableBody">
                <!-- Data sẽ được load ở đây bởi Ajax -->
            </tbody>
        </table>
    </div>

    <!-- Modal để thêm chi nhánh -->
    <div class="modal fade" id="addBranchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Branch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $this->load->view('branchs/add_branch'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal để sửa chi nhánh -->
    <div class="modal fade" id="updateBranchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Branch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $this->load->view('branchs/update_branch'); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Load dữ liệu chi nhánh khi trang được tải
            loadBranchData();

            // Hàm để load dữ liệu chi nhánh
            function loadBranchData() {
                $.ajax({
                    url: '<?= base_url('admincontrol/get_branches') ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var branchTableBody = $('#branchTableBody');
                        branchTableBody.empty();
                        $.each(data, function(index, branch) {
                            branchTableBody.append('<tr><td>' + branch.id + '</td><td>' + branch.name + '</td><td>' + branch.address + '</td><td>' + branch.phone + '</td><td>' + branch.location + '</td><td>' + (branch.is_default ? 'Yes' : 'No') + '</td><td><button class="btn btn-warning btn-edit" data-id="' + branch.id + '">Edit</button> <button class="btn btn-danger btn-delete" data-id="' + branch.id + '">Delete</button></td></tr>');
                        });
                    }
                });
            }

            // Thêm chi nhánh
            $('#addBranchForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('admincontrol/add_branch') ?>',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            $('#addBranchModal').modal('hide');
                            loadBranchData();
                        }
                    }
                });
            });

            // Lấy thông tin chi nhánh để cập nhật
            $('#branchTableBody').on('click', '.btn-edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?= base_url('admincontrol/get_branch/') ?>' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#updateBranchForm [name="id"]').val(data.id);
                        $('#updateBranchForm [name="name"]').val(data.name);
                        $('#updateBranchForm [name="address"]').val(data.address);
                        $('#updateBranchForm [name="phone"]').val(data.phone);
                        $('#updateBranchForm [name="location"]').val(data.location);
                        $('#updateBranchForm [name="is_default"]').prop('checked', data.is_default);
                        $('#updateBranchModal').modal('show');
                    }
                });
            });

            // Cập nhật chi nhánh
            $('#updateBranchForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#updateBranchForm [name="id"]').val();
                $.ajax({
                    url: '<?= base_url('admincontrol/update_branch/') ?>' + id,
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            $('#updateBranchModal').modal('hide');
                            loadBranchData();
                        }
                    }
                });
            });

            // Xóa chi nhánh
            $('#branchTableBody').on('click', '.btn-delete', function() {
                if (confirm('Are you sure you want to delete this branch?')) {
                    var id = $(this).data('id');
                    $.ajax({
                        url: '<?= base_url('admincontrol/delete_branch/') ?>' + id,
                        method: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            if (response) {
                                loadBranchData();
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>