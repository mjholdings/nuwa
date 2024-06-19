<form id="updateBranchForm">
    <input type="hidden" name="id">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" name="phone" required>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" name="location" required>
    </div>
    <div class="form-group">
        <label for="is_default">Default</label>
        <input type="checkbox" class="form-control" name="is_default" value="1">
    </div>
    <button type="submit" class="btn btn-primary">Update Branch</button>
</form>
