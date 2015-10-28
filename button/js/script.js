function countClicks() {
	$.post("/index.php",{"btnClckd": true}, onRequestSuccess,"json");
	$('#counter').html("<h2>"+data+"</h2>");
}

function onRequestSuccess(data)
{
  $('#counter').text( data );
}