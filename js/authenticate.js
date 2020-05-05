$(document).ready( function(){
	console.log( "ready!" );

var fb = firebase.database().ref();
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    alert(" User is signed in.");
		}
	else{
	alert(" User has signed out.");
		}
});


$("#btnSignup").on('click', function(){
	var email = $("#txtEmail").val();
	var password = $("#txtPassword").val();
	firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
 
 // Handle Errors here.
	var errorCode = error.code;
	var errorMessage = error.message;
	alert(errorMessage);
// ...
	console.log("Sign Up for App successful");
	});
});
	
$("#btnLogin").on('click', function(){
	  
	var email = $("#txtEmail").val();
   			
		var password = $("#txtPassword").val();				
		firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
		var errorCode = error.code;
		var errorMessage = error.message;
		alert(error.message);
		
	console.log("Log in successful");
	});
	
});

$("#btnLogout").on('click', function(){
	
	firebase.auth().signOut().then(function() {
 
	}, function(error) {
		  alert(error);
	});
	
});
	

$("#btnAnonymous").on('click', function(){
firebase.auth().signInAnonymously()
.then(function() {
   console.log('Logged in as Anonymous!')
   
   }).catch(function(error) {
   var errorCode = error.code;
   var errorMessage = error.message;
   console.log(errorCode);
   console.log(errorMessage);
	});

});
});
