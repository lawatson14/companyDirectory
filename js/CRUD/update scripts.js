function editRecord(type, editId){
	let editObj = {
		"first": $(`#edit-${type}-first`).val(),
		"last": $(`#edit-${type}-last`).val(),
		"title": $(`#edit-${type}-title`).val(),
		"email": $(`#edit-${type}-email`).val(),
		"tel": $(`#edit-${type}-tel`).val(),
		"department": $(`#edit-${type}-department`).val(),
		"location": $(`#edit-${type}-location`).val(),
	}

	switch (type){
		case "personnel":
			if (editObj.first != "" && editObj.last != "" && editObj.title != "" && editObj.email != "" && editObj.department != ""){
				editPersonnel(editObj, editId);
			}
			break;

		case "department":
			if (editObj.department != "" && editObj.location != ""){
				editDepartment(editObj, editId);
			}
			break;
		
		case "location":
			if (editObj.location != ""){
				editLocation(editObj, editId);
			}
			break;
	}
}

function editPersonnel(editObj, editId){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/editPersonnel.php",
		"dataType": "json",
		"data": {
			"personnelId": editId,
			"first": editObj.first,
			"last": editObj.last,
			"title": editObj.title,
			"email": editObj.email,
			"tel": editObj.tel,
			"department": editObj.department
		},
		success: function(results){
			displayAlert("edit-personnel", results.status.code, results.status.description);
			getAllPersonnelSelect("edit-select");
		}, error: function(){
			console.log("Error occured editting personnel");
		}
	});
}

function editDepartment(editObj, editId){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/editDepartment.php",
		"dataType": "json",
		"data": {
			"departmentId": editId,
			"department": editObj.department,
			"location": editObj.location,
		},
		success: function(results){
			displayAlert("edit-department", results.status.code, results.status.description);
			getAllDepartments("edit-select");
		}, error: function(){
			console.log("Error occured editting department");
		}
	});
}

function editLocation(editObj, editId){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/editLocation.php",
		"dataType": "json",
		"data": {
			"locationId": editId,
			"location": editObj.location,
		},
		success: function(results){
			displayAlert("edit-location", results.status.code, results.status.description);
			getAllLocations("edit-select");
		}, error: function(){
			console.log("Error occured editting location");
		}
	});
}