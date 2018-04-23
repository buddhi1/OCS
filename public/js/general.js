
var loadSchoolsByName = function() {
	var name = document.getElementById('school_name').value;
	var _token = document.getElementsByName('_token').value;	
	sendRequestToServerPost(url+'/school/all', '', function(res) {
		// obj = JSON.parse(res); 
	});
}