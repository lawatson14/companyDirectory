// create and display personnel data in table
function displayTable(object, displayId){
	let content;
	for (const [key, value] of Object.entries(object.data)) {
		content += `<tr>
			<td class="id">${value.id}</td>
			<td class="first">${value.firstName}</td>
			<td class="last">${value.lastName}</td>
			<td class="dept">${value.department}</td>
			<td class="status">${displayCityBadge(value.location)}</td>
		</tr>`;
	}
	$(`#${displayId}-table tbody`).html(content);
}

//populate and display modal
function displayModal(object, type, displayId){
	switch (type){
		case "personnel":
			$(`#${displayId}-modal #modal-title`).html(`${object.data[0].firstName} ${object.data[0].lastName}`);
			$(`#${displayId}-modal #cardJob`).html(`${object.data[0].jobTitle}`);
			$(`#${displayId}-modal #cardLocation`).html(`
				${object.data[0].department} | ${displayCityBadge(object.data[0].location)}<br>
				<a href="tel:${object.data[0].tel}" class="btn btn-primary mt-3" id="cardTel"><i class="fas fa-mobile-alt"></i> ${object.data[0].tel}</a>
				<a href="mailto:${object.data[0].email}" class="btn btn-primary mt-3" id="cardEmail"><i class="fas fa-envelope"></i> ${object.data[0].email}</a>`
			);
			$(`#${displayId}-modal`).modal('show');

			break;
	}
}
//create and display alert
function displayAlert(displayId, status, message){
	if(status != 200){
		$(`#${displayId}-alert`).html(`<div class="alert alert-dismissible fade show alert-danger" role="alert">${message}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`);
	} else {
		$(`#${displayId}-alert`).html(`<div class="alert alert-dismissible fade show alert-success" role="alert">${message}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`);
		}
}

// display personnel data in specific personnel form (edit / delete). 
function displayFormValues(object, formId){
	$(`#${formId}-personnel-first`).val(`${object.data[0].firstName}`);
	$(`#${formId}-personnel-last`).val(`${object.data[0].lastName}`);
	$(`#${formId}-personnel-title`).val(`${object.data[0].jobTitle}`);
	$(`#${formId}-personnel-email`).val(`${object.data[0].email}`);
	$(`#${formId}-personnel-tel`).val(`${object.data[0].tel}`);

	if (formId == "delete"){
		$(`#${formId}-personnel-department`).val(`${object.data[0].department}`);	
		$(`#${formId}-personnel-location`).val(`${object.data[0].location}`);
	}
}

//create and display all options
function displayOptions(object, displayId){
	content = `<option selected hidden value="">Select option</option>`;
	for (const [key, value] of Object.entries(object.data)) {
		content += `<option value="${value.id}">${value.name}</option>`;
	}

	$(`#${displayId}`).html(content);
}

function displayCheckbox(object, displayId, name){
	let content = `<h6>${name}</h6>`;

	for(let i = 0; i < object.data.length; i++){
		content += `<div class="form-check">
			<input class="form-check-input" type="checkbox" value="${object.data[i].name}" id="${displayId}${i}">
			<label class="form-check-label" for="${displayId}${i}">${object.data[i].name}</label>
		</div>`;
	}
	$(`#${displayId}`).html(content);
}

function displaySelected(selectId, selectedValue){
	let options = $(`#${selectId} option`);
	let selected = selectedValue;
	let content = "";

	$(`#${selectId} option:selected`).attr('selected', false);

	for(let i = 0; i < options.length; i++){
		if (options[i].value == selected){
			content += `<option value="${options[i].value}" selected>${options[i].innerHTML}</option>`;
		} else {
			content += `<option value="${options[i].value}">${options[i].innerHTML}</option>`;
		}
	}
	$(`#${selectId}`).html(content);
}











function displayCityBadge(city){
	switch(city){
		case "London":
			city = `<span class="badge badge-primary">${city}</span>`;
			break;
		case "New York":
			city = `<span class="badge badge-danger">${city}</span>`;
			break;
		case "Paris":
			city = `<span class="badge badge-info">${city}</span>`;
			break;
		case "Munich":
			city = `<span class="badge badge-warning">${city}</span>`;
			break;
		case "Rome":
			city = `<span class="badge badge-success">${city}</span>`;
			break;
	}
	return city;
}