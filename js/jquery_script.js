// JavaScript Document
$(document).ready(function()
{		
		
	$("#okload").click(function()
		{
			$("#overlay").fadeIn()
			$("#overlay-content").fadeIn()
		})	
	
	$("#okloaded").click(function()
		{
			$("#display").fadeIn()
		})	
		
	$("#your_details_btn").click(function()
		{
			$("#overlay").fadeIn()
			$("#overlay-content").fadeIn()
		})
		
	$("#view_all_staff").click(function()
		{
			$("#overlay_staff").fadeIn()
			$("#overlay-content_staff").fadeIn()
		})
	$("#close_btn").click(function()
		{
			$("#overlay_staff").fadeOut()
			$("#overlay-content_staff").fadeOut()
		})
		
	$("#close_btn").click(function()
		{
			$("#overlay").fadeOut()
			$("#overlay-content").fadeOut()
		})
		
		


//JQUERY CODE FOR AUTHENTICATING PASSWORD LENGTH
	$("#csb").mouseenter(function()
		{
			var p = document.getElementById('p_word').value;	
			if(p.length < 6)	
			{	
				alert(' * Sorry Password Must Be Atleast Six (6) Characters !');
			}
		})
		
		
//JQUERY CODE FOR AUTHENTICATING EMAIL ADDRESS
	$("#csb").mouseenter(function()
	{
		var email_ok = true
		var temp = e_mail
		var at_sym = temp.value.indexOf('@')
		var period = temp.value.indexOf('.')
		var space = temp.value.indexOf(' ')
		var length = temp.value.length - 1
		// array is formed from 0 to length - 1
		if((at_sym < 1) || (period <= at_sym+1) || (period == length) || (space != -1))
		{
				email_ok = false;				alert(' * Please Enter A Valid e-mail Address !');
		}
		return emial_ok;

	})

//JQUERY CODE FOR AUTHENTICATING PASSWORD LENGTH
	$("#nsb").mouseenter(function()
		{
			var p = document.getElementById('p_word2').value;	
			if(p.length < 6)	
			{	
				alert(' * Sorry Password Must Be Atleast Six (6) Characters !');
			}
		})
		
		
//JQUERY CODE FOR AUTHENTICATING EMAIL ADDRESS
	$("#nsb").mouseenter(function()
	{
		var email_ok = true
		var temp = e_mail2
		var at_sym = temp.value.indexOf('@')
		var period = temp.value.indexOf('.')
		var space = temp.value.indexOf(' ')
		var length = temp.value.length - 1
		// array is formed from 0 to length - 1
		if((at_sym < 1) || (period <= at_sym+1) || (period == length) || (space != -1))
		{
				email_ok = false;				alert(' * Please Enter A Valid e-mail Address !');
		}
		return emial_ok;

	})
	
	
	

	
	
		
		
});

$(document).ready
(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);