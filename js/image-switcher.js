$(document).ready(function() { 
	setupSwitcher()
});

function setupSwitcher(){
	$("#img-container img").each(function(i){
		if (i != 0) {
			this.style.width = 0
		}
	})

	$("#go-right").click(clickRight)
	$("#go-left").click(clickLeft)
}

function clickRight(event){
	var container = $("#img-container")
	
	var temp = $("#img-container img[class*=main]")
	var next = temp.next()
	if (! next.length) {
		next = $("#img-container img").first()
	}
	
	container.css({
		width: "100%",
		height: "100%",
	});
	
	temp.animate({
		height: temp.height(),
		left:0,
		right:"100%",
	}, 1000, function() {
		/* stuff to do after animation is complete */
	});

	next.css({
		height: temp.height(),
	});

	next.animate({
		width: "100%",
	}, 1000, function() {
		temp.removeClass('main')
		next.addClass('main')
	});
}

function clickLeft(event){	
}