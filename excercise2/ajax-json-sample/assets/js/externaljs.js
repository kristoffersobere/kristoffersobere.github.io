$(document).ready(function(){
	$('#btn1').click(function(){
		var input1 = $('#input1').val();
		//console.log(input1);

		$.ajax({
			'url': 'assets/library/server.php',
			'data': {'pokemon': input1},
			'type': 'GET',
			'success': editHTML
 		});

	});
});

function editHTML(jsonData){
	$('#jsonsection').html("Received: " + jsonData);

	if (jsonData != "") {
		data = JSON.parse(jsonData);

		htmlstr = "<hr>";
		htmlstr += "Name: " + data.name + "<br>";
		htmlstr += "Type: " + data.type + "<br>";
		htmlstr += "Basic move: " + data.moves.basic + "<br>";
		htmlstr += "Special move: " + data.moves.special + "<br>";

		$('#outputsection').html(htmlstr);

	}else{
		$('#outputsection').html("<hr> Pokemon info not found");
	}

};
///////////////////////////////////////////////////////////////////
$('#btn2').click(function(){
	$.get('assets/library/get.php', function(data, status){
		var user = JSON.parse(data);	
		//console.log(user.name);
		for (var i = 0; i < user.length; i++) {
			var name = user[i].name;			
			var email = user[i].email;			
			var password = user[i].password;	

			newEntry = '<strong>Name: </strong>' + name + '<strong> Email: </strong>' + email + '<strong> Password: </storng>'+
			password;
			$('#userList').append('<li>' + newEntry + '</li>');		
		}

	});

});

$('#btn3').click(function(){
	var name = $('#input2').val();

	$.post('assets/library/post.php',{'name': name}, function(data){
		//console.log('Processed data: '+ data);


	});
});

$(document).ready(function(){
	$('#input4').keyup(function(){
		var name = $('#input4').val();

		//console.log(name);
		$.post('assets/library/name_suggestion.php',{'suggestion': name},function(data){
			//console.log(data);
			$('#namesSuggested').html(data);
		});
	});

});