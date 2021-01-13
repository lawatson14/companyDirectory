function addRecord(type){
	let addObj = {
		"first": $(`#add-${type}-first`).val(),
		"last": $(`#add-${type}-last`).val(),
		"title": $(`#add-${type}-title`).val(),
		"email": $(`#add-${type}-email`).val(),
		"tel": $(`#add-${type}-tel`).val(),
		"department": $(`#add-${type}-department`).val(),
		"location": $(`#add-${type}-location`).val(),
	}

	switch (type){
		case "personnel":
			if (addObj.first != "" && addObj.last != "" && addObj.title != "" && addObj.email != "" && addObj.department != ""){
				addPersonnel(addObj);
				getAllDepartments("add-personnel");
			}
			break;

		case "department":
			if (addObj.department != "" && addObj.location != ""){
				addDepartment(addObj);
				getAllLocations("add-department");
			}
			break;
				
		case "location":
			if (addObj.location != ""){
				addLocation(addObj);
			}
			break;
	}
}

function addPersonnel(addObj){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/insertPersonnel.php",
		"dataType": "json",
		"data": {
			"first": addObj.first,
			"last": addObj.last,
			"title": addObj.title,
			"email": addObj.email,
			"tel": addObj.tel,
			"department": addObj.department,
		},
		success: function(results){
			displayAlert("add-personnel", results.status.code, results.status.description);
		}, error: function(){
			console.log("Add personnel error occured");
		}
	});
}

function addDepartment(addObj){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/insertDepartment.php",
		"dataType": "json",
		"data": {
			"department": addObj.department,
			"location": addObj.location,
		},
		success: function(results){
			displayAlert("add-department", results.status.code, results.status.description);
		}, error: function(){
			console.log("Add department error occured");
		}
	});
}

function addLocation(addObj){
	$.ajax({
		"async": true,
		"global": false,
		"type": "POST",
		"url": "php/insertLocation.php",
		"dataType": "json",
		"data": {
			"location": addObj.location,
		},
		success: function(results){
			displayAlert("add-location", results.status.code, results.status.description);
		}, error: function(){
			console.log("Add location error occured");
		}
	});
}