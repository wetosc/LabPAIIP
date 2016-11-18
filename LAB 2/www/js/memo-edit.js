function removeMemo(id) {
	$.ajax({
		type: "POST",
		url: "memo-handler.php",
		data: { memoID: id }
	}).done(function( msg ) {
		location.reload(true);
		console.log(msg);
	});  
}