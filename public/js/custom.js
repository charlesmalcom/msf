$(document).ready(function(){

	//get current date and fill in field
	var fullDate = new Date();console.log(fullDate);
	var twoDigitMonth = fullDate.getMonth()+"";if(twoDigitMonth.length==1)  twoDigitMonth="0" +twoDigitMonth;
	var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1) twoDigitDate="0" +twoDigitDate;
	var currentDate = fullDate.getFullYear() + "/" + twoDigitDate + "/" + twoDigitMonth;
	//console.log(currentDate);

	$("#datepicker").val(currentDate);


	
});
