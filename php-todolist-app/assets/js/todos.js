/*check off specific to dos by clicking*/

$('ul').on('click','li',function(){
	$(this).toggleClass('completed');


	/*ajax post request*/
	$.post('done.php',{id:$(this).attr('id')}, function(data,status){

	})
});
/////// new task
$('#newTask').keypress(function(event){
	
	//console.log(event.which);

	if(event.which ==  13){
		var todoText = $(this).val();
		//console.log(todoText);
		$(this).val('');//deletetext from input
		$('li').children(this).hide();

		$.post('create.php',{task: todoText},function(data, status){
			//console.log(data);

			$('ul').append('<li id='+data+'><span> <i class="fa fa-trash fa-2x"></i></span>'+todoText+'</li>');
			});
	}
	
});

$(document).ready(function(){
	$('li').children().hide();

	$( "li" ).mouseenter(function() {
  	$(this).children().show();
  	})
  	$( "li" ).mouseleave(function() {
	$(this).children().hide();
  	});

});

////delete

$('ul').on('click','span',function(event){
	//remove list item from dom
	$(this).parent('li').fadeOut(500,function(){
		$(this).remove();
	});
	//console.log( $(this).parent().attr('id'));
	// ajax req to update json
	$.post('delete.php',{id: $(this).parent().attr('id')},function(data,status){
		console.log(data);
	});

	event.stopPropagation();
});





