/* Toggle button hide sidebar */
var toggleIcon = document.querySelector('#toggleIcon');

toggleIcon.addEventListener('click', function() {

	console.log('toggleIcon is working'); /* for debugging/testing */

	var nav = document.querySelector('nav');
	nav.style.left = '-200px'; /* -20% */

	var main = document.querySelector('main');
	main.style.marginLeft = '0';

	var toggleIcon = document.querySelector('#toggleIcon');
	toggleIcon.setAttribute('hidden', 'hidden');

	var toggleIcon1 = document.querySelector('#toggleIcon1');
	toggleIcon1.removeAttribute('hidden');
	
});

/* Toggle button show sidebar */
var toggleIcon1 = document.querySelector('#toggleIcon1');

toggleIcon1.addEventListener('click', function() {

	console.log('toggleIcon1 is working'); /* for debugging/testing */

	var nav = document.querySelector('nav');
	nav.style.left = '0'; /* -20% */

	var main = document.querySelector('main');
	main.style.marginLeft = '200px';

	var toggleIcon = document.querySelector('#toggleIcon');
	toggleIcon.removeAttribute('hidden');

	var toggleIcon1 = document.querySelector('#toggleIcon1');
	toggleIcon1.setAttribute('hidden', 'hidden');
	
});