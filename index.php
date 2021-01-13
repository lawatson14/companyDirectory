<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Project | Lee Watson</title>
	<meta charset="utf-8">
	<meta name="description" content="Employee Directory Project">
	<meta name="author" content="Lee Watson">
	<meta name="keywords" content="contact, directory, employees, lee watson">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<!-- Stylesheet --> 
	<link rel="stylesheet" href="css/master.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="">Company Directory</a>
	</nav>

	<main class="container mt-3">
		<ul id="mainNavTab" class="nav nav-tabs mb-3" role="tablist">
			<li class="nav-item flex-fill">
				<a class="nav-link active" id="view-tab" data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="true">View</a>
			</li>
			<li class="nav-item flex-fill">
				<a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">Add</a>
			</li>
			<li class="nav-item flex-fill">
				<a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>
			</li>
			<li class="nav-item flex-fill">
				<a class="nav-link" id="delete-tab" data-toggle="tab" href="#delete" role="tab" aria-controls="delete" aria-selected="false">Delete</a>
			</li>
		</ul>
		
		<div id="tabContent" class="tab-content">
			
			<!-- View Tab -->
			<div id="view" class="tab-pane fade show active" role="tabpanel" aria-labelledby="view-tab">
				<div class="d-flex justify-content-between">
					<form>
						<div class="input-group">
							<input type="text" id="search-bar" class="form-control" placeholder="Search...">
							<div class="input-group-append">
								<button type="button" id="search-btn" class="btn btn-dark"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</form>
					<button id="filter-btn" class="btn btn-dark "><i class="fas fa-filter"></i></button>
				</div>
				<form id="filter" class="mt-3 p-3 bg-dark text-white">
					<div class="form-row">
						<div id="filter-title" class="col-md-4 mt-3 mt-md-0"></div>
						<div id="filter-department" class="col-md-4 mt-3 mt-md-0"></div>
						<div id="filter-location" class="col-md-4 mt-3 mt-md-0"></div>
					</div>
					<button type="button" id="filter-apply" class="btn btn-secondary mt-2">Apply</button>
				</form>
				
				<div class="table-responsive mt-3">
					<table id="personnel-table" class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th class="id" scope="col">Id</th>
								<th scope="col">First</th>
								<th scope="col">Last</th>
								<th scope="col">Department</th>
								<th scope="col">Location</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			
			<!-- Add Tab -->
			<div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
				<ul id="addNavTab" class="nav nav-tabs" role="tablist">
					<li class="nav-item flex-fill">
						<a class="nav-link active" id="add-personnel-tab" data-toggle="tab" href="#add-personnel" role="tab" aria-controls="add-personnel" aria-selected="true">Add Personnel</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" id="add-department-tab" data-toggle="tab" href="#add-department" role="tab" aria-controls="add-department" aria-selected="false">Add Department</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" id="add-location-tab" data-toggle="tab" href="#add-location" role="tab" aria-controls="add-location" aria-selected="false">Add Location</a>
					</li>
				</ul>
				<div id="add-tab-content" class="tab-content pt-3">
					<div id="add-personnel" class="tab-pane fade show active" role="tabpanel" aria-labelledby="add-personnel-tab">
						<div id="add-personnel-alert"></div>
						<form id="add-personnel-form" class="mb-3">
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="add-personnel-first">First Name<span class="text-danger">*</span></label>
									<input type="text" id="add-personnel-first" class="form-control form-required" placeholder="First Name">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="add-personnel-last">Last Name<span class="text-danger">*</span></label>
									<input type="text" id="add-personnel-last" class="form-control form-required" placeholder="Last Name">
								</div>
							</div>
							<div class="form-group">
								<label for="add-personnel-title">Job Title<span class="text-danger">*</span></label>
								<input type="text" id="add-personnel-title" class="form-control form-required" placeholder="Job Title">
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="add-personnel-email">Email<span class="text-danger">*</span></label>
									<input type="email" id="add-personnel-email" class="form-control form-required" placeholder="Email">
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="add-personnel-tel">Tel</label>
									<input type="text" id="add-personnel-tel" class="form-control" placeholder="Contact Number">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="add-personnel-department">Department<span class="text-danger">*</span></label>
									<select id="add-personnel-department" class="form-control form-required"></select>
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="add-personnel-location">Location<span class="text-danger">*</span></label>
									<select id="add-personnel-location" class="form-control form-required" readonly disabled></select>
								</div>
							</div>
							<button type="button" id="add-personnel-btn" class="btn btn-primary">Add</button>
						</form>
					</div>
					<div id="add-department" class="tab-pane fade" role="tabpanel" aria-labelledby="add-department-tab">
						<div id="add-department-alert"></div>
						<form id="add-department-form" class="mb-3">
							<div class="form-group">
								<label for="add-department-department">Department Name<span class="text-danger">*</span></label>
								<input type="text" id="add-department-department" class="form-control form-required">
							</div>
							<div class="form-group">
								<label for="add-department-location">Department Location<span class="text-danger">*</span></label>
								<select id="add-department-location" class="form-control form-required"></select>
							</div>
							<button type="button" id="add-department-btn" class="btn btn-primary">Add</button>
						</form>
					</div>
					<div id="add-location" class="tab-pane fade" role="tabpanel" aria-labelledby="add-location-tab">
						<div id="add-location-alert"></div>
						<form id="add-location-form" class="mb-3">
							<div class="form-group">
								<label for="add-location-location">Location Name<span class="text-danger">*</span></label>
								<input type="text" id="add-location-location" class="form-control form-required">
							</div>
							<button type="button" id="add-location-btn" class="btn btn-primary">Add</button>
						</form>
					</div>
				</div>
			</div>

			
			<!-- Edit Tab -->
			<div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
				<ul id="edit-nav-tab" class="nav nav-tabs" role="tablist">
					<li class="nav-item flex-fill">
						<a class="nav-link active" id="edit-personnel-tab" data-toggle="tab" href="#edit-personnel" role="tab" aria-controls="edit-personnel" aria-selected="true">Edit Personnel</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" id="edit-department-tab" data-toggle="tab" href="#edit-department" role="tab" aria-controls="edit-department" aria-selected="false">Edit Department</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" id="edit-location-tab" data-toggle="tab" href="#edit-location" role="tab" aria-controls="edit-location" aria-selected="false">Edit Location</a>
					</li>
				</ul>
				<div id="edit-tab-content" class="tab-content pt-3">
					<div id="edit-personnel" class="tab-pane fade show active" role="tabpanel" aria-labelledby="edit-personnel-tab">
						<div id="edit-personnel-alert"></div>
						<form id="edit-personnel-form" class="mb-3">
							<div class="form-group">
								<label for="edit-select-personnel">Select Personnel to Edit<span class="text-danger">*</span></label>
								<select id="edit-select-personnel" class="form-control form-required"></select>
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="edit-personnel-first">First Name<span class="text-danger">*</span></label>
									<input type="text" id="edit-personnel-first" class="form-control form-required form-lock" readonly>
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="edit-personnel-last">Last Name<span class="text-danger">*</span></label>
									<input type="text" id="edit-personnel-last" class="form-control form-required form-lock" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="edit-personnel-title">Job Title<span class="text-danger">*</span></label>
								<input type="text" id="edit-personnel-title" class="form-control form-required form-lock" readonly>
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="edit-personnel-email">Email<span class="text-danger">*</span></label>
									<input type="email" id="edit-personnel-email" class="form-control form-required form-lock" readonly>
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="edit-personnel-tel">Tel</label>
									<input type="text" id="edit-personnel-tel" class="form-control form-lock" readonly>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="edit-personnel-department">Department<span class="text-danger">*</span></label>
									<select id="edit-personnel-department" class="form-control form-required form-select-lock" readonly></select>
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="edit-personnel-location">Location<span class="text-danger">*</span></label>
									<select id="edit-personnel-location" class="form-control form-required" readonly disabled></select>
								</div>
							</div>
							<button type="button" id="edit-personnel-btn" class="btn btn-primary" disabled>Edit</button>
							<button type="button" id="edit-personnel-submit-btn" class="btn btn-success">Submit</button>
							<button type="button" id="edit-personnel-cancel-btn" class="btn btn-danger">Cancel</button>
						</form>
					</div>
					<div id="edit-department" class="tab-pane fade" role="tabpanel" aria-labelledby="edit-department-tab">
						<div id="edit-department-alert"></div>
						<form id="edit-department-form" class="mb-3">
							<div class="form-group">
								<label for="edit-select-department">Select Department to Edit<span class="text-danger">*</span></label>
								<select id="edit-select-department" class="form-control"></select>
							</div>
							<div class="form-group">
								<label for="edit-department-department">Department Name<span class="text-danger">*</span></label>
								<input type="text" id="edit-department-department" class="form-control form-required form-lock" readonly>
							</div>
							<div class="form-group">
								<label for="edit-department-location">Department Location<span class="text-danger">*</span></label>
								<select id="edit-department-location" class="form-control form-required form-select-lock" readonly disabled></select>
							</div>
							<button type="button" id="edit-department-btn" class="btn btn-primary" disabled>Edit</button>
							<button type="button" id="edit-department-submit-btn" class="btn btn-success">Submit</button>
							<button type="button" id="edit-department-cancel-btn" class="btn btn-danger">Cancel</button>
						</form>
					</div>
					<div id="edit-location" class="tab-pane fade" role="tabpanel" aria-labelledby="edit-location-tab">
						<div id="edit-location-alert"></div>
						<form id="edit-location-form" class="mb-3">
							<div class="form-group">
								<label for="edit-select-location">Select Location to Edit<span class="text-danger">*</span></label>
								<select id="edit-select-location" class="form-control"></select>
							</div>
							<div class="form-group">
								<label for="edit-location-location">Location Name<span class="text-danger">*</span></label>
								<input type="text" id="edit-location-location" class="form-control form-required form-lock" readonly>
							</div>
							<button type="button" id="edit-location-btn" class="btn btn-primary" disabled>Edit</button>
							<button type="button" id="edit-location-submit-btn" class="btn btn-success">Submit</button>
							<button type="button" id="edit-location-cancel-btn" class="btn btn-danger">Cancel</button>
						</form>
					</div>
				</div>
			</div>


			<!--Delete -->
			<div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
				<ul id="delete-nav-tab" class="nav nav-tabs" role="tablist">
					<li class="nav-item flex-fill">
						<a class="nav-link active" id="delete-personnel-tab" data-toggle="tab" href="#delete-personnel" role="tab" aria-controls="delete-personnel" aria-selected="true">Delete Personnel</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" id="delete-department-tab" data-toggle="tab" href="#delete-department" role="tab" aria-controls="delete-department" aria-selected="false">Delete Department</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" id="delete-location-tab" data-toggle="tab" href="#delete-location" role="tab" aria-controls="delete-location" aria-selected="false">Delete Location</a>
					</li>
				</ul>
				<div id="delete-tab-content" class="tab-content pt-3">
					<div id="delete-personnel" class="tab-pane fade show active" role="tabpanel" aria-labelledby="delete-personnel-tab">
						<div id="delete-personnel-alert"></div>
						<form id="delete-personnel-form" class="mb-3">
							<div class="form-group">
								<label for="delete-select-personnel">Select Personnel to Delete<span class="text-danger">*</span></label>
								<select id="delete-select-personnel" class="form-control form-required"></select>
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="delete-personnel-first">First Name</label>
									<input type="text" id="delete-personnel-first" class="form-control" readonly disabled>
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="delete-personnel-last">Last Name</label>
									<input type="text" id="delete-personnel-last" class="form-control" readonly disabled>
								</div>
							</div>
							<div class="form-group">
								<label for="delete-personnel-title">Job Title</label>
								<input type="text" id="delete-personnel-title" class="form-control" readonly disabled>
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="delete-personnel-email">Email</label>
									<input type="email" id="delete-personnel-email" class="form-control" readonly disabled>
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="delete-personnel-tel">Tel</label>
									<input type="text" id="delete-personnel-tel" class="form-control" readonly disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12 col-md-6">
									<label for="delete-personnel-department">Department</label>
									<input type="text" id="delete-personnel-department" class="form-control" readonly disabled>
								</div>
								<div class="form-group col-12 col-md-6">
									<label for="delete-personnel-location">Location</label>
									<input type="text" id="delete-personnel-location" class="form-control" readonly disabled>
								</div>
							</div>
							<button type="button" id="delete-personnel-btn" class="btn btn-danger" disabled>Delete</button>
						</form>
					</div>

					<div id="delete-department" class="tab-pane fade" role="tabpanel" aria-labelledby="delete-department-tab">
						<div id="delete-department-alert"></div>
						<form id="delete-department-form" class="mb-3">
							<div class="form-group">
								<label for="delete-select-department">Select Department to Delete<span class="text-danger">*</span></label>
								<select id="delete-select-department" class="form-control form-required"></select>
							</div>
							<div class="form-group">
								<label for="delete-department-department">Department Name</label>
								<input type="text" id="delete-department-department" class="form-control" readonly disabled>
							</div>
							<div class="form-group">
								<label for="delete-department-location">Department Location</label>
								<input type="text" id="delete-department-location" class="form-control" readonly disabled>
							</div>
							<button type="button" id="delete-department-btn" class="btn btn-danger" disabled>Delete</button>
						</form>
					</div>

					<div id="delete-location" class="tab-pane fade" role="tabpanel" aria-labelledby="delete-location-tab">
						<div id="delete-location-alert"></div>
						<form id="delete-location-form" class="mb-3">
							<div class="form-group">
								<label for="delete-select-location">Select Location to Delete<span class="text-danger">*</span></label>
								<select id="delete-select-location" class="form-control form-required"></select>
							</div>
							<div class="form-group">
								<label for="delete-location-location">Location Name</label>
								<input type="text" id="delete-location-location" class="form-control" readonly disabled>
							</div>
							<button type="button" id="delete-location-btn" class="btn btn-danger" disabled>Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- view modal -->
		<div id="personnel-modal" class="modal fade" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<img src="images/profile.png" class="card-img-top" alt="" style="display: block; height: 100px; width: 100px; border-radius: 100px; margin: 10px auto; margin-bottom: 0px;">
						<h5 class="card-title text-center mt-3" id="cardJob"></h5>
						<p class="card-text text-center" id="cardLocation"></p>
					</div>
					<div class="modal-footer d-flex justify-content-around"></div>
				</div>
			</div>
		</div>

		<!-- delete modal -->
		<div id="delete-modal" class="modal fade" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Delete <span id="delete-modal-type"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body text-center">
						<h6>Are you sure you wish to delete <span id="delete-modal-title"></span>?</h6>
						<button id="delete-modal-yes" class="btn btn-success">Yes</button>
						<button id="delete-modal-no" class="btn btn-danger" data-dismiss="modal">No</button>
					</div>
					<div class="modal-footer d-flex justify-content-around"></div>
				</div>
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/display scripts.js"></script>
	<script type="text/javascript" src="js/form scripts.js"></script>

	<!-- CRUD Scripts -->
	<script type="text/javascript" src="js/CRUD/create scripts.js"></script>
	<script type="text/javascript" src="js/CRUD/read scripts.js"></script>
	<script type="text/javascript" src="js/CRUD/update scripts.js"></script>
	<script type="text/javascript" src="js/CRUD/delete scripts.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){

			// display personnel table on loadup
			getAllPersonnel("", "table");

			// display personnel table on view tab click (essures latest records displayed incase records been ammended)
			$("#view-tab").click(function(){
				getAllPersonnel("", "table");
			});
			//display record modal on record row click
			$(document).on("click", "#personnel-table tbody tr", function(){
				let id = $(this).find(".id").html();
				getPersonnelById(id, "personnel", "modal");
			});
			//Search 
			$("#search-btn").click(function(){
				let search = $("#search-bar").val();
				getAllPersonnel(search, "table");
			});
			//disable enter form submission for search bar.
			$(window).keydown(function(event){
				if(event.keyCode == 13) {
					event.preventDefault();
					return false;
				}
			});
			// filter button
			$("#filter-btn").click(function(){
				$("#filter").toggle();
				getJobFilter("filter-title");
				getDepartmentFilter("filter-department");
				getLocationFilter("filter-location");
			});
			$("#filter-apply").click(function(){
				let filterJobs = "(";
				let filterDepartments = "(";
				let filterLocations = "(";
				let checked = $("input:checkbox:checked");

				for(let i = 0; i < checked.length; i++){
					let id = checked[i].id;
					if(id.includes("title")){
						filterJobs += `'${checked[i].value}',`;
					} else if(id.includes("department")){
						filterDepartments += `'${checked[i].value}',`;
					} else {
						filterLocations += `'${checked[i].value}',`;
					}	
				}
				
				filterJobs = filterJobs.replace(/.$/,")");
				filterDepartments = filterDepartments.replace(/.$/,")");
				filterLocations = filterLocations.replace(/.$/,")");

				filter("personnel", filterJobs, filterDepartments, filterLocations);
			});
			
			



			//add interactions
			$("#add-tab").click(function(){
				resetForm("add-personnel");
				resetForm("add-department");
				resetForm("add-location");
				getAllDepartments("add-personnel");
				getAllLocations("add-personnel");
				getAllLocations("add-department");

			});

			//add personnel
			$("#add-personnel-tab").click(function(){
				resetForm("add-personnel");
				clearForm("add-personnel", "personnel");
			});

			$("#add-personnel-btn").click(function(){
				validateForm("add-personnel");
				addRecord("personnel");
			});
			$("#add-personnel-department").change(function(){
				let departmentId = $("#add-personnel-department").val();
				getLocationByDepartmentId(departmentId, "add-personnel-location");
			});
			//add department
			$("#add-department-tab").click(function(){
				resetForm("add-department");
				clearForm("add-department", "department");
			});
			$("#add-department-btn").click(function(){
				validateForm("add-department");
				addRecord("department");
			});

			//add location
			$("#add-location-tab").click(function(){
				resetForm("add-location");
				clearForm("add-location", "location");
			});
			$("#add-location-btn").click(function(){
				validateForm("add-location");
				addRecord("location");				
			});

			


			//edit interactions
			$("#edit-tab").click(function(){
				getAllPersonnelSelect("edit-select");
				getAllDepartments("edit-personnel");
				getAllLocations("edit-personnel");
				toggleDisplayButtons("edit-personnel", "hide");
				toggleReadonly("edit-personnel", "lock");

				getAllDepartments("edit-select");
				getAllLocations("edit-department");
				
				getAllLocations("edit-select");


			});

			// edit personnel
			$("#edit-personnel-tab").click(function(){
				getAllPersonnelSelect("edit-select");
				getAllDepartments("edit-personnel");
				getAllLocations("edit-personnel");

				// ensures form reset to default
				resetForm("edit-personnel");
				clearForm("edit-personnel");
				toggleDisplayButtons("edit-personnel", "hide");
				toggleReadonly("edit-personnel", "lock");
				$("#edit-personnel-btn").attr("disabled", true);
			});
			$("#edit-select-personnel").change(function(){
				getPersonnelById($(this).val(), "edit", "form");
				getDepartmentByPersonnelId($(this).val(), "edit-personnel-department", "edit-personnel-location");

				//resets form to default if change department
				resetForm("edit-personnel");
				toggleDisplayButtons("edit-personnel", "hide");
				toggleReadonly("edit-personnel", "lock");
				$("#edit-personnel-btn").attr("disabled", false);
			});
			$("#edit-personnel-department").change(function(){
				let departmentId = $("#edit-personnel-department").val();
				getLocationByDepartmentId(departmentId, "edit-personnel-location");
			});
			$("#edit-personnel-btn").click(function(){
				toggleDisplayButtons("edit-personnel", "show");
				toggleReadonly("edit-personnel", "unlock");
			});
			$("#edit-personnel-cancel-btn").click(function(){
				toggleDisplayButtons("edit-personnel", "hide");
				toggleReadonly("edit-personnel", "lock");
			});
			$("#edit-personnel-submit-btn").click(function(){
				validateForm("edit-personnel");
				editRecord("personnel", $("#edit-select-personnel").val());
				toggleDisplayButtons("edit-personnel", "hide");
				toggleReadonly("edit-personnel", "lock");				
			});

			
			// edit department
			$("#edit-department-tab").click(function(){
				getAllDepartments("edit-select");
				getAllLocations("edit-department");

				// ensures form reset to default
				resetForm("edit-department");
				clearForm("edit-department");
				toggleDisplayButtons("edit-department", "hide");
				toggleReadonly("edit-department", "lock");
				$("#edit-department-btn").attr("disabled", true);
			});
			$("#edit-select-department").change(function(){
				getDepartmentById($(this).val(), "edit");
				getLocationByDepartmentId($(this).val(),"edit-department-location");

				//resets form to default if change department
				resetForm("edit-department");
				toggleDisplayButtons("edit-department", "hide");
				toggleReadonly("edit-department", "lock");
				$("#edit-department-btn").attr("disabled", false);
			});
			$("#edit-department-btn").click(function(){
				toggleDisplayButtons("edit-department", "show");
				toggleReadonly("edit-department", "unlock");
			});
			$("#edit-department-cancel-btn").click(function(){
				toggleDisplayButtons("edit-department", "hide");
				toggleReadonly("edit-department", "lock");
			});
			$("#edit-department-submit-btn").click(function(){
				validateForm("edit-department");
				editRecord("department", $("#edit-select-department").val());
				toggleDisplayButtons("edit-department", "hide");
				toggleReadonly("edit-department", "lock");
			});

			// edit location
			$("#edit-location-tab").click(function(){
				getAllLocations("edit-select");

				// ensures form reset to default
				resetForm("edit-location");
				clearForm("edit-location");
				toggleDisplayButtons("edit-location", "hide");
				toggleReadonly("edit-location", "lock");
				$("#edit-location-btn").attr("disabled", true);
			});
			$("#edit-select-location").change(function(){
				getLocationById($(this).val(), "edit");

				//resets form to default if change location
				resetForm("edit-location");
				toggleDisplayButtons("edit-location", "hide");
				toggleReadonly("edit-location", "lock");
				$("#edit-location-btn").attr("disabled", false);
			});
			$("#edit-location-btn").click(function(){
				toggleDisplayButtons("edit-location", "show");
				toggleReadonly("edit-location", "unlock");
			});
			$("#edit-location-cancel-btn").click(function(){
				toggleDisplayButtons("edit-location", "hide");
				toggleReadonly("edit-location", "lock");
			});
			$("#edit-location-submit-btn").click(function(){
				validateForm("edit-location");
				editRecord("location", $("#edit-select-location").val());
				toggleDisplayButtons("edit-location", "hide");
				toggleReadonly("edit-location", "lock");
			});

			//delete interactions
			$("#delete-tab").click(function(){
				getAllPersonnelSelect("delete-select");
				resetForm("delete-personnel");
				clearForm("delete-personnel");

				getAllDepartments("delete-select");
				resetForm("delete-department");
				clearForm("delete-department");
				
				getAllLocations("delete-select");
				resetForm("delete-location");
				clearForm("delete-location");
			});




			$("#delete-personnel-tab").click(function(){
				getAllPersonnelSelect("delete-select");

				// ensures form reset to default
				resetForm("delete-personnel");
				clearForm("delete-personnel");
				$("#delete-personnel-btn").attr("disabled", true);
			});
			$("#delete-select-personnel").change(function(){
				getPersonnelById($(this).val(), "delete", "form");

				//resets form to default if change department
				resetForm("delete-personnel");
				$("#delete-personnel-btn").attr("disabled", false);
			});
			$("#delete-personnel-btn").click(function(){
				validateForm("delete-personnel");

				if ( $("#delete-select-personnel").val() != ""){
					let personnel = `${$("#delete-personnel-first").val()} ${$("#delete-personnel-last").val()}`;
					$("#delete-modal-title").html(`'${personnel}' record`);
					$("#delete-modal-type").html("personnel");
		
					$("#delete-modal").modal("show");
				}
			});






			$("#delete-department-tab").click(function(){
				getAllDepartments("delete-select");

				// ensures form reset to default
				resetForm("delete-department");
				clearForm("delete-department");
				$("#delete-department-btn").attr("disabled", true);
			});
			$("#delete-select-department").change(function(){
				getDepartmentById($(this).val(), "delete");

				//resets form to default if change department
				resetForm("delete-department");
				$("#delete-department-btn").attr("disabled", false);
			});
			$("#delete-department-btn").click(function(){
				validateForm("delete-department");

				if ( $("#delete-select-department").val() != ""){
					let department = $("#delete-department-department").val();
					$("#delete-modal-title").html(`'${department}' department`);
					$("#delete-modal-type").html("department");
		
					$("#delete-modal").modal("show");
				}
			});
			$("#delete-location-tab").click(function(){
				getAllLocations("delete-select");

				// ensures form reset to default
				resetForm("delete-location");
				clearForm("delete-location");
				$("#delete-location-btn").attr("disabled", true);
			});
			$("#delete-select-location").change(function(){
				getLocationById($(this).val(), "delete");

				//resets form to default if change location
				resetForm("delete-location");
				$("#delete-location-btn").attr("disabled", false);
			});
			$("#delete-location-btn").click(function(){
				validateForm("delete-location");

				if ( $("#delete-select-location").val() != ""){
					let location = $("#delete-location-location").val();
					$("#delete-modal-title").html(`'${location}' location`);
					$("#delete-modal-type").html("location");
		
					$("#delete-modal").modal("show");	
				}
			});



			$("#delete-modal-yes").click(function(){
				let type = $("#delete-modal-type").html();
				deleteRecord(type);
				
				$("#delete-modal").modal('hide');

				//reset options after deletions
				getAllPersonnelSelect("delete-select");
				clearForm("delete-personnel");

				getAllDepartments("delete-select");
				clearForm("delete-department");

				getAllLocations("delete-select");
				clearForm("delete-location");

			});
		});

		
	</script>
</body> 
</html>