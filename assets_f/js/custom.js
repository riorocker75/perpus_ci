
	$('#file_1').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
	    // $("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));

	    var open="window.open('"+tmppath+"','popup','width=600,height=600,scrollbars=no,resizable=no');return false;";
	    

    	var extensi=file_1.value.split('.')[1];

    	switch(extensi.toLowerCase()){
    		case "jpg":case "png":case "jpeg":
	    	$("#file_show_1").html("<a onclick="+open+"><img src='"+tmppath+"' style='width:62px; height:62px'><br>Preview File<br></a>");
     		break;

     		case "pdf":
	    	$("#file_show_1").html("<a onclick="+open+"><i class='fas fa-file-pdf' style='font-size:62px;color:#D81F28'></i><br>Preview File<br></a>");
     		break;

     		default:
     		$(".file_show").html("extension nya: halu");	
    	}	

});

$('#file_2').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
	    var open="window.open('"+tmppath+"','popup','width=600,height=600,scrollbars=no,resizable=no');return false;";
    	var extensi=file_2.value.split('.')[1];

    	switch(extensi.toLowerCase()){
    		case "jpg":case "png":case "jpeg":
	    	$("#file_show_2").html("<a onclick="+open+"><img src='"+tmppath+"' style='width:62px; height:62px'><br>Preview File<br></a>");
     		break;

     		case "pdf":
	    	$("#file_show_2").html("<a onclick="+open+"><i class='fas fa-file-pdf' style='font-size:62px;color:#D81F28'></i><br>Preview File<br></a>");
     		break;

     		default:
     		$(".file_show").html("extension nya: halu");	
    	}	

});	

$('#file_3').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
	    var open="window.open('"+tmppath+"','popup','width=600,height=600,scrollbars=no,resizable=no');return false;";
    	var extensi=file_3.value.split('.')[1];

    	switch(extensi.toLowerCase()){
    		case "jpg":case "png":case "jpeg":
	    	$("#file_show_3").html("<a onclick="+open+"><img src='"+tmppath+"' style='width:62px; height:62px'><br>Preview File<br></a>");
     		break;

     		case "pdf":
	    	$("#file_show_3").html("<a onclick="+open+"><i class='fas fa-file-pdf' style='font-size:62px;color:#D81F28'></i><br>Preview File<br></a>");
     		break;

     		default:
     		$(".file_show").html("extension nya: halu");	
    	}	

});	

$('#file_4').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
	    var open="window.open('"+tmppath+"','popup','width=600,height=600,scrollbars=no,resizable=no');return false;";
    	var extensi=file_4.value.split('.')[1];

    	switch(extensi.toLowerCase()){
    		case "jpg":case "png":case "jpeg":
	    	$("#file_show_4").html("<a onclick="+open+"><img src='"+tmppath+"' style='width:62px; height:62px'><br>Preview File<br></a>");
     		break;

     		case "pdf":
	    	$("#file_show_4").html("<a onclick="+open+"><i class='fas fa-file-pdf' style='font-size:62px;color:#D81F28'></i><br>Preview File<br></a>");
     		break;

     		default:
     		$(".file_show").html("extension nya: halu");	
    	}	

});	

$('#file_5').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
	    var open="window.open('"+tmppath+"','popup','width=600,height=600,scrollbars=no,resizable=no');return false;";
    	var extensi=file_5.value.split('.')[1];

    	switch(extensi.toLowerCase()){
    		case "jpg":case "png":case "jpeg":
	    	$("#file_show_5").html("<a onclick="+open+"><img src='"+tmppath+"' style='width:62px; height:62px'><br>Preview File<br></a>");
     		break;

     		case "pdf":
	    	$("#file_show_5").html("<a onclick="+open+"><i class='fas fa-file-pdf' style='font-size:62px;color:#D81F28'></i><br>Preview File<br></a>");
     		break;

     		default:
     		$(".file_show").html("extension nya: halu");	
    	}	

});

$('#file_6').change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        var open="window.open('"+tmppath+"','popup','width=600,height=600,scrollbars=no,resizable=no');return false;";
        var extensi=file_6.value.split('.')[1];

        switch(extensi.toLowerCase()){
            case "jpg":case "png":case "jpeg":
            $("#file_show_6").html("<a onclick="+open+"><img src='"+tmppath+"' style='width:62px; height:62px'><br>Preview File<br></a>");
            break;

            case "pdf":
            $("#file_show_6").html("<a onclick="+open+"><i class='fas fa-file-pdf' style='font-size:62px;color:#D81F28'></i><br>Preview File<br></a>");
            break;

            default:
            $(".file_show").html("extension nya: halu");  
        }   

});


// update notif user

