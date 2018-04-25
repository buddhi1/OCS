// load all the schools with the given name
var loadSchoolsByName = function() {
	var name = document.getElementById('school_name').value;

	sendRequestToServerGet(url+'/school/all', 'name='+name, function(res) {
		obj = JSON.parse(res); 
		document.getElementById('school-list').innerHTML = '';
		for (var i = obj.length - 1; i >= 0; i--) {
			document.getElementById('school-list').innerHTML += '<option value="'+obj[i].id+'">'+obj[i].name+'</option>';
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
			document.getElementById('caseworker-list').innerHTML += '<li>'+obj[i].last_name+', '+obj[i].first_name+'</li>';
		}
		
	});
}