let id = document.getElementsByClassName("button-buy");
let cukee = decodeURIComponent(document.cookie);
let x = cukee.split("=")[1]

for (let i = 0; i < id.length; ++i){
	id[i].addEventListener('click', function libirate(){
		let ar = id[i].id;
		let data = new FormData();
		ar=ar.substring(1);
		data.append("data", ar);
		data.append("user_id", x);
		fetch("../functions/biy.php",{
			method:"POST",
			body:data
		});
	}, false);
}