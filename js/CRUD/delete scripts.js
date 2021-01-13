function deleteRecord(type){
	deleteId = $(`#delete-select-${type}`).val();


	switch (type){
		case "personnel":
			if (deleteId != ""){
				deletePersonnel(deleteId);
			}
			break;

		case "department":
			if (deleteId != ""){
				deleteDepartment(deleteId);
			}
			break;
				
		case "location":
			if (deleteId != ""){
				deleteLocation(deleteId);
			}
			break;
	}
}

function deletePersonnel(deleteId){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/deletePersonnelById.php",
		"dataType": "json",
		"data": {
			"personnelId": deleteId,
		},
		success: function(results){
			console.log(results);
			displayAlert("delete-personnel", results.status.code, results.status.description);
		}, error: function(){
			console.log("Delete personnel error occured");
		}
	});
}

function deleteDepartment(deleteId){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/deleteDepartmentById.php",
		"dataType": "json",
		"data": {
			"departmentId": deleteId,
		},
		success: function(results){
			console.log(results);
			displayAlert("delete-department", results.status.code, results.status.description);
		}, error: function(){
			console.log("Delete department error occured");
		}
	});
}

function deleteLocation(deleteId){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/deleteLocationById.php",
		"dataType": "json",
		"data": {
			"locationId": deleteId,
		},
		success: function(results){
			displayAlert("delete-location", results.status.code, results.status.description);
		}, error: function(){
			console.log("Delete location error occured");
		}
	});
}