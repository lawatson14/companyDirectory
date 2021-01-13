function validateForm(formId){
	resetForm(formId);

	// get form inputs as object
	let inputs = $(`#${formId}-form .form-required`);
	
	for (const [key, obj] of Object.entries(inputs)) {
		if (obj.value == ""){
			$(`#${obj.id}`).addClass("border-danger").siblings().append('<span class="text-danger form-response"> Field Required!</span>');
		}
	}

	//add alert message if any form-response present
	if ($(`#${formId}-form .form-response`).length > 0){
		displayAlert(formId, 400, "Form Invalid!");
	};
}

function resetForm(formId){
	//reset form alert 
	$(`#${formId}-alert`).html("");

	// reset form response text and border color
	$(`#${formId}-form .form-response`).remove();
	$(`#${formId}-form .form-required`).removeClass("border-danger");
}

// reset inputs
function clearForm(formId, type){
	$(`#${formId}-form input`).val("");
	switch (type){
		case "personnel":
			getAllDepartments(formId);
			break;
		case "deaprtment":
			getAllLocations(formId);
			break;
		case "location":
			break;
	}
}

function toggleReadonly(formId, type){
	let inputs = $(`#${formId}-form .form-lock`);
	let selects = $(`#${formId}-form .form-select-lock`);

	if (type == "lock"){
		for (let i = 0; i < inputs.length; i++){
			$(inputs[i]).prop('readonly', true);
		}
		for (let j = 0; j < inputs.length; j++){
			$(selects[j]).prop("disabled", true);
			$(selects[j]).attr("readonly", true);
		}
	} else if (type == "unlock"){
		for (let i = 0; i < inputs.length; i++){
			$(inputs[i]).prop('readonly', false);
		}
		for (let j = 0; j < inputs.length; j++){
			$(selects[j]).prop("disabled", false);
			$(selects[j]).attr("readonly", false);
		}
	}
}

function toggleDisplayButtons(formId, type){
	if (type == "show"){
		$(`#${formId}-btn`).hide();
		$(`#${formId}-submit-btn`).show();
		$(`#${formId}-cancel-btn`).show();
	} else if (type == "hide"){
		$(`#${formId}-btn`).show();
		$(`#${formId}-submit-btn`).hide();
		$(`#${formId}-cancel-btn`).hide();
	}
}