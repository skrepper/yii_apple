
function eatApple($id, $percent) {

$.ajax({
	url: 'index.php?r=fruit/eat',
	data: {id: $id, percent: $percent},
	success: function(res){
		console.log(res);
	},
	error: function() {
		alert('Error!');
	}

});

setTimeout(function() {console.log('timeout')}, 2000);

location.href="index.php?r=fruit";

}

/*refresh every minute*/
setInterval(function() {location.href=location.href}, 6000);