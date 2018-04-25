
//ajx xml request get
var sendRequestToServerGet = function(url, variables, callback){
	
	// var var_string = JSON.stringify(variables);
 //    var request_url = variables;

	var xmlHttp = new XMLHttpRequest(); 
    xmlHttp.onreadystatechange = function(){

        if (xmlHttp.readyState==4 && xmlHttp.status==200){
            callback(xmlHttp.responseText);
        }
    };
    xmlHttp.open( "GET", url+'?'+variables, true );
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send();
}

//ajx xml request post
var sendRequestToServerPost = function(url, variables, callback){
    
    var var_string = JSON.stringify(variables);
    var request_url = variables;

    var xmlHttp = new XMLHttpRequest(); 
    xmlHttp.onreadystatechange = function(){

        if (xmlHttp.readyState==4 && xmlHttp.status==200){
            callback(xmlHttp.responseText);
        }
    };
    xmlHttp.open( "GET", url, true );
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send();

    // $.ajaxSetup({
    //               headers: {
    //                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //               }
    //           });
    //            jQuery.ajax({
    //               url: url,
    //               method: 'get',
    //               data: {

    //               },
    //               success: function(result){
    //                  console.log(result);
    //               }});
}