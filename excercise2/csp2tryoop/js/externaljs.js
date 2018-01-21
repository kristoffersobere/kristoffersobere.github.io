/*  //FOR PURE JAVASCRIPT 
	function validatepass() { 
		var pw = document.getElementById("pw").value;
		var cpw = document.getElementById("cpw").value;


		

		if (pw != cpw) {
			document.getElementById('btn').disabled = true;
			document.getElementById('para').innerHTML = "Password do not match";
			document.getElementById('para').style.color = "red";
		} else {
			document.getElementById('btn').disabled = false;
			document.getElementById('para').innerHTML = "Password matched";
			document.getElementById('para').style.color = "green";
		}
	}
*/
		var users;
		$.getJSON("assets/users.json", function(json){
			users = json
		});

		$('input[name=username]').on('input', function(){
			var username = $('input[name=username]').val()
			if (typeof users[username] !== 'undefined') {
				$('#username_error').css('color','red')
				$('#username_error').html('username exists')
			} else {
				$('#username_error').css('color','green')
				$('#username_error').html('available')
			}
		});	

		//for password validtion jquery
		$('input[name=cpw]').on('input', function(){
			 ppw = $('input[name=pw]').val();
			 ccpw = $('input[name=cpw]').val();

			if(ppw !=  ccpw){
				$('input[name=register]').attr('disabled',true)
				$('#pw_error').css('color','red')
				$('#pw_error').html('passwords do not match')
			} else {
				$('input[name=register]').removeAttr('disabled')
				$('#pw_error').css('color','green')
				$('#pw_error').html('passwords matched')
			}
		});


//for ajax modal
		$('.render_modal_body').click(function(){
			var index = $(this).data('index');
			$.post('render_modal_body_endpoint.php',{index : index},function(data){
				$('#modal-body').html(data);
			});
		});

		$('.render_modal_body_delete').click(function(){
			var index = $(this).data('index');
			$.post('render_modal_body_endpoint_delete.php',{index : index},function(data){
				$('#modal-body-delete').html(data);
			});
		});

