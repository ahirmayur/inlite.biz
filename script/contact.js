$(function() {
	$('.correctdiv, .errordiv').hide();
	$('form#frmcontact').show();

	/*$('#frmcontact input').focus(function() {
		$(this).val('');
	});
	
	$('#frmcontact textarea').focus(function() {
        $(this).val('');
    });*/
	

	// when the Submit button is clicked...
	$('input#submit').click(function() {
		$('.errordiv').hide().remove();
		//Inputed Strings
		var name = $('#cname').val();
		var email = $('#cemail').val();
		var contact = $('#cphone').val();
		var message = $('#cmsg').val();
		
		//Error Count
		var error_count = 0;
		
		//Regex Strings
		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		
		//Test Username
		if(name == "") {
			$('#correctdiv').before('<div class=errordiv>Please enter your Name.</div>');
			error_count += 1;
		}
			
		//Test Email
		if(email == "") {
			$('#correctdiv').before('<div class=errordiv>Please enter your Email.</div>');
			error_count += 1;
		}
		else if(!email_regex.test(email)) {
			$('#correctdiv').before('<div class=errordiv>Invalid Email address.</div>');
			error_count += 1;
		}
		
		//Test Contact
		if(contact == "") {
			$('#correctdiv').before('<div class=errordiv>Please enter Contact Number.</div>');
			error_count += 1;
		}
		else if(isNaN(contact)) {
			$('#correctdiv').before('<div class=errordiv>Invalid Contact number.</div>');
			error_count += 1;
		}
			
		//Blank Message?
		if(message == '') {
			$('#correctdiv').before('<div class=errordiv>You must enter the Message.</div>');
			error_count += 1;
		}
			
		//No Errors?
		if(error_count === 0) {
			var company = $('#ccomp').val();
			if(company == "")
				company = "NA";
			
			var address = $('#caddr').val();
			if(address == "")
				address = "NA";
				
			$.ajax({
				type: "post",
				url: "send.php",
				data: "name=" + name + "&email=" + email + "&contact=" + contact + "&company=" + company  + "&address=" + address  + "&message=" + message,
				error: function() {
					$('.errordiv').hide();
					$('#correctdiv').before('<div class=errordiv>An Error occured while sendding this email.</div>');
				},
				success: function () {
					$('.errordiv').hide();
					$('.correctdiv').slideDown('slow');
					$('form#frmcontact').fadeOut('slow');
				}				
			});	
		}
		
		else {
			$('.errordiv').show();
		}
			
		return false;
	});
});