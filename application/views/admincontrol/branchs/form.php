<div class="row">
	<div class="col-12">
		<div class="card mb-3">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4><?= __('admin.manage_branch') ?></h4>
				<a class="btn btn-primary" href="<?= base_url('admincontrol/listbranchs/')  ?>"><?= __('admin.cancel') ?></a>
			</div>
			<div class="card-body">
				<form id="admin-form">
					<input type="hidden" name="branch_id" value="<?= (!empty($branch)?(int)$branch->id:'') ?>">
					<div class="row justify-content-center">
						<div class="col-sm-6">
							<div class="form-group">
								<label><?= __('admin.branch_name') ?></label>
								<input placeholder="<?= __('admin.enter_your_branch_name') ?>" name="branch_name" value="<?= !empty($branch)?$branch->name:''; ?>" class="form-control" type="text">
							</div>
						</div>
					</div>
                    <div class="row justify-content-center">
						<div class="col-sm-6">
							<div class="form-group">
								<label><?= __('admin.branch_phone') ?></label>
								<input placeholder="<?= __('admin.enter_your_branch_phone') ?>" name="branch_phone" value="<?= !empty($branch)?$branch->phone:''; ?>" class="form-control" type="text">
							</div>
						</div>
					</div>                    
					<div class="row justify-content-center">
						<div class="col-sm-6">
							<div class="form-group">
								<label><?= __('admin.branch_address') ?></label>
								<textarea rows="8" placeholder="<?= __('admin.enter_your_branch_address') ?>" name="branch_address" class="form-control"><?= !empty($branch)?$branch->address:''; ?></textarea>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-sm-6">
							<div class="form-group">
								<label><?= __('admin.branch_location') ?></label>
								<textarea rows="8" placeholder="<?= __('admin.enter_your_branch_location') ?>" name="branch_location" class="form-control"><?= !empty($branch)?$branch->location:''; ?></textarea>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-sm-12">
							<div class="form-group">
								<button type="button" class="btn btn-primary btn-submit"><?= __('admin.submit') ?></button>
								<span class="loading-submit"></span>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div> 
	</div> 
</div>


<script type="text/javascript">

// Handle form submission
document.querySelector(".btn-submit").addEventListener('click', function(evt){
    
    evt.preventDefault();    
    
    // Initial setup for loading state
    setupLoadingState();
    
    // Fetch form and form data
    var form = document.querySelector("#admin-form");
    var formData = new FormData(form);    

    // Perform the AJAX request
    var xhr = new XMLHttpRequest();
    configureXhr(xhr, form);

    xhr.open('POST', '<?= base_url('admincontrol/admin_branch_form') ?>', true);
    xhr.send(formData);
});


// Setup initial loading state
function setupLoadingState() {
    var submitBtn = document.querySelector(".btn-submit");
    var loadingSubmit = document.querySelector('.loading-submit');
    
    submitBtn.innerHTML = "Loading...";
    loadingSubmit.style.display = "block";
}


// Configure the XMLHttpRequest
function configureXhr(xhr, form) {
    xhr.upload.onprogress = updateProgress;
    xhr.onloadstart = function() { 
        document.querySelector('.loading-submit').innerHTML = "Saving";
    };
    xhr.onloadend = resetLoadingState;
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            handleResponse(JSON.parse(xhr.responseText), form);
        }
    };
}

// Update progress
function updateProgress(e) {
    var percentComplete = Math.round((e.loaded * 100) / e.total);
    document.querySelector('.loading-submit').innerHTML = `${percentComplete}% Loading`;
}

// Reset loading state
function resetLoadingState() {
    var submitBtn = document.querySelector(".btn-submit");
    var loadingSubmit = document.querySelector('.loading-submit');
    
    submitBtn.innerHTML = "Submit";
    loadingSubmit.style.display = "none";
}

// Handle the response from the server
function handleResponse(result, form) {
    if (result['location']) {
        window.location = result['location'];
        return;
    }

    if (result['errors']) {
        displayErrors(result['errors'], form);
    }
}

// Display form errors
function displayErrors(errors, form) {
    Object.entries(errors).forEach(([key, value]) => {
        var element = form.querySelector(`[name="${key}"]`);
        if (element) {
            element.parentNode.classList.add("has-error");
            
            // Convert HTML to text
            var tempDiv = document.createElement("div");
            tempDiv.innerHTML = value;
            var plainText = tempDiv.textContent || tempDiv.innerText;

            // Create and append the error message
            var errorText = document.createElement("span");
            errorText.textContent = plainText;
            errorText.classList.add("text-danger");
            element.parentNode.appendChild(errorText);
        }
    });
}


</script>