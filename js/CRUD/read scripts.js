function getAllPersonnel(search, type, displayId = ""){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/getAllPersonnel.php",
		"dataType": "json",
		"data": {
			"search": search,
		},
		success: function(results){
			switch(type){
				
				case "table":
					displayTable(results, "personnel");
					break;

				case "options":
					for(let i = 0; i < results.data.length; i++){
						results.data[i].name = `${results.data[i].firstName} ${results.data[i].lastName} (${results.data[i].department})`;
					}
					displayOptions(results, displayId);

					break;
			}
		}, error: function(){
			console.log("Getting all records error occured.");
		}
	});
}

function getAllDepartments(displayId){
	$.ajax({
		"async": false,
		"global": false,
		"url": "php/getAllDepartments.php",
		"dataType": "json",
		success: function(results){

			displayOptions(results, `${displayId}-department`);
		
		}, error: function(){
			console.log("Getting all departments error occured.");
		}
	});
}

function getAllLocations(displayId){
	$.ajax({
		"async": false,
		"global": false,
		"url": "php/getAllLocations.php",
		"dataType": "json",
		success: function(results){

			displayOptions(results, `${displayId}-location`);

		}, error: function(){
			console.log("getting all locations error occured.");
		}
	});
}

function getPersonnelById(personnelId, displayId, type){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/getPersonnelById.php",
		"dataType": "json",
		"data": {
			"id": personnelId,
		},
		success: function(results){
			if (type == "modal"){
				displayModal(results, "personnel", displayId);	
			} else if(type == "form"){
				displayFormValues(results, displayId);
			}
		}, error: function(){
			console.log("getting personal by id error occured");
		}
	});
}

function getDepartmentById(departmentId, displayId, type){
	$.ajax({
		"async": false,
		"global": false,
		"type": "POST",
		"url": "php/getDepartmentById.php",
		"dataType": "json",
		"data":{
			"departmentId": departmentId,
		},
		success: function(results){
			
			$(`#${displayId}-department-department`).val(results.data[0].department);
			$(`#${displayId}-department-location`).val(results.data[0].location);

		}, error: function(){
			console.log("getting department by id error occured");
		}
	});
}

function getLocationById(locationId, displayId){
	$.ajax({
		"async": false,
		"global": false,
		"type": "POST",
		"url": "php/getLocationById.php",
		"dataType": "json",
		"data":{
			"locationId": locationId,
		},
		success: function(results){

			$(`#${displayId}-location-location`).val(results.data[0].name);

		}, error: function(){
			console.log("error occured getting location by id");
		}
	});
}

function getDepartmentByPersonnelId(personnelId, selectId1, selectId2){
	$.ajax({
		"async": false,
		"global": false,
		"type": "POST",
		"url": "php/getDepartmentByPersonnelId.php",
		"dataType": "json",
		"data":{
			"personnelId": personnelId,
		},
		success: function(results){
			displaySelected(selectId1, results.data[0].id);
			getLocationByDepartmentId(results.data[0].id, selectId2)

		}, error: function(){
			console.log("error occured getting location by id");
		}
	});
}

function getLocationByDepartmentId(departmentId, selectId){
	$.ajax({
		"async": false,
		"global": false,
		"type": "POST",
		"url": "php/getLocationByDepartmentId.php",
		"dataType": "json",
		"data":{
			"departmentId": departmentId,
		},
		success: function(results){
			displaySelected(selectId, results.data[0].id);

		}, error: function(){
			console.log("error occured getting location by id");
		}
	});
}

function getJobFilter(displayId){
	$.ajax({
		"async": false,
		"global": false,
		"url": "php/getUniqueTitles.php",
		"dataType": "json",
		success: function(results){
			displayCheckbox(results, displayId, "Job Titles");
		}, error: function(){
			console.log("error occured getting unique job titles");
		}
	});
}

function getDepartmentFilter(displayId){
	$.ajax({
		"async": false,
		"global": false,
		"url": "php/getUniqueDepartments.php",
		"dataType": "json",
		success: function(results){
			displayCheckbox(results, displayId, "Departments");
		}, error: function(){
			console.log("error occured getting unique departments");
		}
	});
}

function getLocationFilter(displayId){
	$.ajax({
		"async": false,
		"global": false,
		"url": "php/getUniqueLocations.php",
		"dataType": "json",
		success: function(results){
			displayCheckbox(results, displayId, "Locations");
		}, error: function(){
			console.log("error occured getting unique locations");
		}
	});
}

function filter(displayId, jobs, departments, locations){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"dataType": "json",
		"url": "php/filter.php",
		"data":{
			"jobs": jobs,
			"departments": departments,
			"locations": locations
		},
		success: function(results){
			displayTable(results, displayId);
		}, error: function(){
			console.log("Error occured getting filter");
		}
	});
}

function getAllPersonnelSelect(displayId){
	$.ajax({
		"async": false,
		"global": false,
		"url": "php/getAllPersonnelSelect.php",
		"dataType": "json",
		success: function(results){
			displayOptions(results, `${displayId}-personnel`);
		}, error: function(){
			console.log("getting all locations error occured.");
		}
	});
}