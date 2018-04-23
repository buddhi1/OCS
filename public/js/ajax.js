//ajx xml request
var sendRequestToServerPost = function(url, variables, callback){
	
	var var_string = JSON.stringify(variables);
    var request_url = variables;
    // var TOKEN = document.querySelector('meta[name="csrf-token"]').content;
    console.log("sadasd"+url);
	var xmlHttp = new XMLHttpRequest(); 
    xmlHttp.onreadystatechange = function(){

        if (xmlHttp.readyState==4 && xmlHttp.status==200){
            callback(xmlHttp.responseText);
        }
    };
    xmlHttp.open( "GET", url, true );
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send();
}