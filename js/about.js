
$(document).ready(function() { 
	setTimeout(refreshTime, 30000)
});

function refreshTime(){
	var now = new Date()
	$("#about-date").html(getDateString(now))
	$("#about-time").html(getTimeString(now))
}

function getDateString(now) {
	return pad(now.getDate(),2) + "." + pad(now.getMonth(),2) + "." + now.getFullYear()
}

function getTimeString(now) {
	return pad(now.getHours(),2) + " : " + pad(now.getMinutes(),2)
}

function pad(num, size) {
	var s = num+"";
	while (s.length < size) s = "0" + s;
	return s;
}