// load all the schools with the given name
var loadSchoolsByName = function() {
	var name = document.getElementById('school_name').value;

	sendRequestToServerGet(url+'/school/all', 'name='+name, function(res) {
		obj = JSON.parse(res); 
		document.getElementById('school-list').innerHTML = '';
		for (var i = obj.length - 1; i >= 0; i--) {
			document.getElementById('school-list').innerHTML += '<li>'
																	+obj[i].name
																	+'<input type="hidden" value="'
																	+obj[i].id
																	+'"/></li>';
		}

		//adding on click event to all the created options
		var elements = document.querySelectorAll("#school-list");
		for (var i = 0; i < elements[0].childNodes.length; i++) {
		  	elements[0].childNodes[i].addEventListener("click", function(e) {
		    	selectOptionSchool(e);
			});
		}
		
	});
}

// load all the case workers with the given name
var loadCaseworkersByName = function() {
	var name = document.getElementById('caseworker_id').value;

	sendRequestToServerGet(url+'/caseworker/all', 'name='+name, function(res) {
		obj = JSON.parse(res); 
		document.getElementById('caseworker-list').innerHTML = '';
		for (var i = obj.length - 1; i >= 0; i--) {
			document.getElementById('caseworker-list').innerHTML += '<li id="cli">'
																		+obj[i].last_name
																		+', '
																		+obj[i].first_name
																		+'<input type="hidden" value="'
																		+obj[i].id
																		+'"/></li>';
		}

		//adding on click event to all the created options
		var elements = document.querySelectorAll("#caseworker-list");
		for (var i = 0; i < elements[0].childNodes.length; i++) {
		  	elements[0].childNodes[i].addEventListener("click", function(e) {
		    	selectOption(e);
			});
		}
		
	});
}

// load all the advocate with the given name
var loadAdvocateByName = function() {
	var name = document.getElementById('advocate_id').value;

	sendRequestToServerGet(url+'/advocate/all', 'name='+name, function(res) {
		obj = JSON.parse(res); 
		document.getElementById('advocate-list').innerHTML = '';
		for (var i = obj.length - 1; i >= 0; i--) {
			document.getElementById('advocate-list').innerHTML += '<li id="cli">'
																		+obj[i].last_name
																		+', '
																		+obj[i].first_name
																		+'<input type="hidden" value="'
																		+obj[i].id
																		+'"/></li>';
		}

		//adding on click event to all the created options
		var elements = document.querySelectorAll("#advocate-list");
		for (var i = 0; i < elements[0].childNodes.length; i++) {
		  	elements[0].childNodes[i].addEventListener("click", function(e) {
		    	selectOptionAdvocate(e);
			});
		}
		
	});
}

//dropdown expand
var caseworkerDropDown = function() {
    document.getElementById('caseworker-list').style.display = 'block'; 
	loadCaseworkersByName();	
}

//dropdown shrink for caeworker
var caseworkerDropShrink = function() {
	// document.getElementById('caseworker-list').classList.add('caseworker-list-shrink');
	console.log(document.activeElement.id);
	if (document.activeElement.id != 'cli') {
		document.getElementById('caseworker-list').style.display = 'none'; 
	}
}

//option select method for case wrokers
var selectOption = function(e) {
	document.getElementById('caseworker_id').value = e.toElement.innerText;
	document.getElementById('caseworker').value = e.toElement.childNodes[1].value;
    document.getElementById('caseworker-list').style.display = 'none'; 
}

//option select method for schools
var selectOptionSchool = function(e) {
	document.getElementById('school_name').value = e.toElement.innerText;
	document.getElementById('school').value = e.toElement.childNodes[1].value;
    document.getElementById('school-list').style.display = 'none'; 
}

//option select method for advocate
var selectOptionAdvocate = function(e) {
	document.getElementById('advocate_id').value = e.toElement.innerText;
	document.getElementById('advocate').value = e.toElement.childNodes[1].value;
    document.getElementById('advocate-list').style.display = 'none'; 
}

//dropdown expand
var schoolDropDown = function() {
    document.getElementById('school-list').style.display = 'block'; 
	loadSchoolsByName();	
}

//dropdown expand
var advocateDropDown = function() {
    document.getElementById('advocate-list').style.display = 'block'; 
	loadAdvocateByName();	
}
