jQuery(document).ready(function(){
	
	$("#send_message").click(function(){
		var err=0;
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var email=$("#InputEmail").val();		
		var name=$("#InputName").val();
		var phone=$("#InputPhone").val();
		var theme=$("#InputThemed").val();
		var message=$("#message").val();
		if(name==""){
			err+=1;
			$("#InputName").addClass("validateInputFalse");			
		}else{
			$("#InputName").removeClass("validateInputFalse");		
		}
		if(regex.test(email)==false){
			err+=1;
			$("#InputEmail").addClass("validateInputFalse");			
		}else{
			$("#InputEmail").removeClass("validateInputFalse");		
		}
		if(theme==""){
			err+=1;
			$("#InputThemed").addClass("validateInputFalse");	
		}else{
			$("#InputThemed").removeClass("validateInputFalse");		
		}
		if(phone==""){
			err+=1;
			$("#InputPhone").addClass("validateInputFalse");	
		}else{
			$("#InputPhone").removeClass("validateInputFalse");		
		}
		if(message==""){
			err+=1;
			$("#message").addClass("validateInputFalse");	
		}else{
			$("#message").removeClass("validateInputFalse");		
		}
		if(err<1 || err==0){
			$('#query_user')[0].reset();

			$.ajax({
				type: 'POST',
				url: 'ajax/add_query',
				data: {
					name: name,
					mail: email,
					phone: phone,
					message: message,
					theme: theme
				},
				success: function( data ) {
					$("#overlay").show();
					$("#forgotModalMassege").addClass("disable");
					$("#forgotModalMassege").show();
					setTimeout(function(){
						$("#overlay").hide();
						$("#forgotModalMassege").removeClass("disable");
					$("#forgotModalMassege").hide();
					}, 3000);
					
					console.log("data", data);
				}
			});
		}
	});	
});
