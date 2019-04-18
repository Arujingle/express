function empty_parser_signin(){
	result.innerHTML = "";
	if (name.value === '' || pass.value === ''){
		result.innerHTML = "Fill all inputs correctly!";
		return;
	}

	let ar = [name.value,pass.value];
	let data = new FormData();
	data.append("data",ar);

	fetch("/functions/auth.php",{
		method: "POST",
		body: data
	}).then(function(response){
		return response.json().then(function(response){
			console.log(response);
			if (response !== "Incorrect login or password"){
				console.log("YEEE");
				let x="userid="+response+";path='/'";
				document.cookie = x;
				before.className="hide-last";
				setTimeout(function(){
					before.remove();
					after.className="appear";
				}, 410);
			}else{
				result.innerHTML = response;
			}
		});
	});
}

function empty_parser_signup(){
	result.innerHTML = "";
	if (name.value === '' || pass.value === ''){
		result.innerHTML = "Fill all inputs correctly!";
		return;
	}

	let ar = [name.value,pass.value];
	let data = new FormData();
	data.append("data",ar);

	fetch("/functions/reg.php",{
		method: "POST",
		body: data
	}).then(function(response){
		return response.json().then(function(response){
			if (response !== "Username already exist"){
				console.log("YEEE");
				let x="userid="+response+";path='/'";
				document.cookie = x;
				before.className="hide-last";
				setTimeout(function(){
					before.remove();
					after.className="appear";
				}, 410);
			}else{
				result.innerHTML = response;
			}
		});
	});
}

let name = document.querySelector('#login');
let pass = document.querySelector('#pass'); // TODO md5() hash
let result = document.querySelector('#resultant');

let before = document.querySelector('#before-logging');
let after = document.querySelector('#after-logging');

document.querySelector(".button-login").addEventListener('click',empty_parser_signin);
document.querySelector(".button-register").addEventListener('click',empty_parser_signup);