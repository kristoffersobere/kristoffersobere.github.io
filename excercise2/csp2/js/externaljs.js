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
	//username validation
		/*var users;
		$.getJSON("assets/users.json", function(json){
			users = json
		});*/
		$('#username').on('input', function(){
			var username = $('#username').val()

			$.ajax({
				method: 'POST',
				url : 'authenticate.php',
				data: {
					register: true,
					username: username
				},
				success:function(data){

					//console.log(data);

					if (data == 'invalid') {
						$('#username_error').css('color','red')
						$('#username_error').html('username exists')
					} else {
						$('#username_error').css('color','green')
						$('#username_error').html('available')
					}
				}
			});
		});	


///////////////for password validtion jquery
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


////////////////////////////for ajax modals
/////////////////////////////////////////////////add rooms
		$("#add_item").click(function(){
		$.ajax({
			method: 'post',
			url: 'render_modal_body_endpoint.php',
			data: {
				add : true,
			},
			success: function(data){
				$("#modal-body").html(data);
				$("#myModal").modal('show');
			}
		});
	});

		$('.render_modal_body').click(function(){
			var index = $(this).data('index');
			$.ajax({
			method: 'post',
			url: 'render_modal_body_endpoint.php',
			data: {
				edit : true,
				index : index
			},
			success: function(data){
				$("#modal-body").html(data);
			}
		});
	});

	
		$('.render_modal_body_delete').click(function(){
			var index = $(this).data('index');
			$.post('render_modal_body_endpoint_delete.php',{index : index},function(data){
				$('#modal-body-delete').html(data);
			});
		});

		// function send(index){
  //       qty = $('.quant').val();
  //       console.log(index);
  //       console.log(qty);
    
        
  //     $.ajax({
  //       method:'POST',
  //       url:'cart_qty_change.php',
  //       data:{
  //         index : index,
  //         qty: qty,
  //         price: price
  //       },
  //       success: function(data){
  //         //console.log(data)
  //         $('#modal-body-cart').val(data)
  //       }
  //     });

  //   }


	//date pick meup
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
        minDate: (3),
        maxDate:(30),
onSelect: function() {
				var date = $(this).datepicker('getDate');
				if (date){
					date.setDate(date.getDate() + 1);
					$( "#datepicker1" ).datepicker( "option", "minDate", date );
					$( "#datepicker1" ).datepicker( "option", "minDate", date );
        }
 }

     });

	    $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd",
        numberOfMonths: 1,
		minDate: (4),
		maxDate:(30),
    });