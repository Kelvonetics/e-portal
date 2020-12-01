// JavaScript Document
$(document).ready(function()
{
	$("#prev_one").click(function()
	{
		$("#set_one").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_fou").hide();
		$("#set_fiv").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#prev_two").click(function()
	{
		$("#set_two").show();
		$("#set_one").hide();
		$("#set_thr").hide();
		$("#set_fou").hide();
		$("#set_fiv").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#prev_thr").click(function()
	{
		$("#set_thr").show();
		$("#set_two").hide();
		$("#set_one").hide();
		$("#set_fou").hide();
		$("#set_fiv").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#prev_fou").click(function()
	{
		$("#set_fou").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_one").hide();
		$("#set_fiv").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
 	$("#prev_fiv").click(function()
	{
		$("#set_fiv").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_fou").hide();
		$("#set_one").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#prev_six").click(function()
	{
		$("#set_six").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_fou").hide();
		$("#set_one").hide();
		$("#set_fiv").hide();
		$("#set_sev").hide();
	});
	
	
	/*********** NEXT *************/
	
	
	$("#next_two").click(function()
	{
		$("#set_two").show();
		$("#set_thr").hide();
		$("#set_fou").hide();
		$("#set_fiv").hide();
		$("#set_one").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#next_thr").click(function()
	{
		$("#set_thr").show();
		$("#set_two").hide();
		$("#set_fou").hide();
		$("#set_fiv").hide();
		$("#set_one").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#next_fou").click(function()
	{
		$("#set_fou").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_fiv").hide();
		$("#set_one").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#next_fiv").click(function()
	{
		$("#set_fiv").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_fou").hide();
		$("#set_one").hide();
		$("#set_six").hide();
		$("#set_sev").hide();
	});
	$("#next_six").click(function()
	{
		$("#set_six").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_fiv").hide();
		$("#set_one").hide();
		$("#set_fou").hide();
		$("#set_sev").hide();
	});
	$("#next_sev").click(function()
	{
		$("#set_sev").show();
		$("#set_two").hide();
		$("#set_thr").hide();
		$("#set_fou").hide();
		$("#set_one").hide();
		$("#set_six").hide();
		$("#set_fiv").hide();
	});
	
	
	
	$('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
	
	$("#try").click(function()
	{
		$("#overlay").fadeIn()
		$("#overlay-content").fadeIn()
	})
	
});










$(document).ready(function(){
	if($.browser.msie)
	{
		if($.browser.version <= "6.0")
		{
			window.location = "http://www.google.com.ng/search?sclient=psy-ab&hl=en&site=&source=hp&q=download+mozilla+firefox+browser";
		}
	}
	
	setInterval(function(){
			$d = new Date();
			$day = $d.getDate();
			$mnthArry = new Array("January","Febrary","March","April","May","June","July","August","September","October","November","December");
			$mnth = $mnthArry[$d.getMonth()];
			$yr = $d.getFullYear();
			$hr = $d.getHours();
			$min = $d.getMinutes();
			$sec = $d.getSeconds();
			$AmorPm = ( $hr > 11 )? 'pm' : 'am';
			$supersub = ( $day == 1 || $day == 21 || $day == 31 )? '<sup>st</sup>': ( $day == 2 || $day == 22 )? '<sup>nd</sup>' : ( $day == 3 || $day == 23 )? '<sup>rd</sup>' : ( $day == 4 || $day >= 24 )? '<sup>th</sup>':'<sup>th</sup>'; 
			$dateTime = "Date:  "+$day+""+$supersub+"  "+$mnth+", "+$yr+",&nbsp;&nbsp;&nbsp; Time: &nbsp; "+$hr+" : "+$min+" : "+$sec+"  "+$AmorPm;
			$("#message #date").html($dateTime);
	},-500);
	
	
	$('#selall').click(function(event)
	{
		$('.checkbox1').each(function() 
		{
            this.checked = true;
        });
	})

		
	
});
	
	
	










