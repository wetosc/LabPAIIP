var speed = 1000

$(document).ready(function() { 
	setupSwitcher()
});

function setupSwitcher(){
	$("#img-container img").each(function(i){
		if (i != 0) {
			this.style.width = 0
		}
	})

	setTimeout(clickRight, 5000)
	
	$("#go-right").click(clickRight)
	$("#go-left").click(clickLeft)
}

function clickLeft(event){

	var temp = $("#img-container img[class*=main]")
	var next = temp.next()
	if (! next.length) {
		next = $("#img-container img").first()
	}
	
	temp.css({
		left: 0,
		right: 0,
		height: temp.height(),
	});

	temp.animate({
		width: 0,
		left: "100%",
		right: 0,
	}, speed, function() {
	});

	next.css({
		left: 0,
		right: "100%",
		height: temp.height(),
	});

	next.animate({
		width: "100%",
		left: 0,
		right: 0,
	}, speed, function() {
		temp.removeClass('main')
		next.addClass('main')
	});
}

function clickRight(event){
	
	var temp = $("#img-container img[class*=main]")
	var prev = temp.prev()
	if (! prev.length) {
		prev = $("#img-container img").last()
	}
	
	temp.css({
		right: 0,
		left: 0,
		height: temp.height(),
	});

	temp.animate({
		width: 0,
		right: "100%",
		left: 0,
	}, speed, function() {
	});

	prev.css({
		right: 0,
		left: "100%",
		height: temp.height(),
	});

	prev.animate({
		width: "100%",
		right: 0,
		left: 0,
	}, speed, function() {
		temp.removeClass('main')
		prev.addClass('main')
	});
}