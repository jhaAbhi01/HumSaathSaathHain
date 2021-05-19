function swapSignForms(bool) {
    if (bool) {
       document.querySelector('#signup-container').classList.add('inactive-form');
		 document.querySelector('#signup-container').classList.remove('active-form');
       setTimeout(() => {
           document.querySelector('#signup-container').style.display = "none";
           document.querySelector('#signin-container').style.display = "block";
           document.querySelector('#signin-container').classList.add('active-form');
			  document.querySelector('#signin-container').classList.remove('inactive-form');
       }, 200);
    } else {
       document.querySelector('#signin-container').classList.add('inactive-form');
		 document.querySelector('#signin-container').classList.remove('active-form');
       setTimeout(() => {
           document.querySelector('#signin-container').style.display = "none";
           document.querySelector('#signup-container').style.display = "block";
           document.querySelector('#signup-container').classList.add('active-form');
			  document.querySelector('#signup-container').classList.remove('inactive-form');
       }, 200);
    }
}

var signinTransition = document.querySelector('#signin-transition');
var signupTransition = document.querySelector('#signup-transition');

signinTransition.addEventListener('click', function(){
	swapSignForms(true);
});
signupTransition.addEventListener('click', function(){
	swapSignForms(false);
});

swapSignForms(true);