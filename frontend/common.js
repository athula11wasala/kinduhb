

function callSvc(url,param, successFunc, errorFunc,method='POST') {

    console.log('Web service being called');

    $.ajax({
        type: method,
        url: 'http://127.0.0.1:8000/api/' +url,
        data: param,
        dataType: "json",
        success: successFunc,
        error: errorFunc
    });
}


function clear(){

    $("#div_errors").html('');	
	$("#div_errors").hide();
	$("#div_success").hide();
	$("#div_success").html('');
	$('#tblbody').hide();
	$('#tblbody').html('');
	$('#hndEditId').val('');
}	

function validation(){
	
	  var flag = true; 
	 if($('#inputfname').val() == ''){
	  
	   $("#div_errors").html('please fill FirstName');
	   $("#div_errors").show();
	   
		 flag =false;
	   }
	    if($('#inputlname').val() == ''){
	  
	    $("#div_errors").html('please fill LastName');
		$("#div_errors").show();
		 flag =false;;
	   }
	    if($('#selClass').val() == ''){
	  
	     $("#div_errors").html('please fill Class');
		$("#div_errors").show();
		 flag =false;;
	   }
	    if($('#selTeacher').val() == ''){
	  
	     $("#div_errors").html('please fill Teacher');
		$("#div_errors").show();
		 flag =false;;
	   }
	    if($('#selGender').val() == ''){
	  
	     $("#div_errors").html('please fill Gender');
		$("#div_errors").show();
		 flag =false;;
	   }
	   if($('#inputYear').val() == ''){
	  
	    $("#div_errors").html('please fill Year');
		$("#div_errors").show();
		 flag =false;;
	   }
	   
	   return  flag;
	
}