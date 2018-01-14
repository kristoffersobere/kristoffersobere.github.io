function changeHTML(input) {

		/*var x = parseInt(document.getElementById('input1').value);
		var y = parseInt(document.getElementById('input2').value);
		 
		document.getElementById('heading').innerHTML = x+y;*/
		/*alert(input);*/
		}

function display(x) {
		
		document.getElementById("input").value  += x;
	 	document.getElementById('heading').innerHTML += x;

}

function grt() {
	var num = document.getElementById("input").value;

	if (num < 5) {
		document.getElementById('heading').innerHTML = num +" is Less than 5";
	}else if(num ==5){
		document.getElementById('heading').innerHTML =  num +" is equal to 5";
	}else {
		document.getElementById('heading').innerHTML = num +" is greater than 5";
	}
}

function oddeven() {
	var num = document.getElementById("input").value;

	if (num%2 == 0) {
		console.log(num +" is Even");
	}
	else
	{
		console.log(num +" is Odd");
	}
}

function calc() {
		
		document.getElementById("input").value = eval(document.getElementById("input").value)

}

function back() {

    	var val = document.getElementById("input").value;
	    document.getElementById("input").value = val.substr(0, val.length - 1);
}

function clr() {
		document.getElementById('heading').innerHTML = " ";
		document.getElementById("input").value = " ";
}