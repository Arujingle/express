let id = document.getElementsByClassName("button-delete");
let cukee = decodeURIComponent(document.cookie);
let x = cukee.split("=")[1]
for (let i = 0; i < id.length; ++i){
	id[i].addEventListener('click', function libirate(){
		let ar = id[i].id;
		let data = new FormData();
		data.append("data", ar);
		data.append("user_id", x);

		fetch("../functions/bucket-delete.php",{
			method:"POST",
			body:data
		}).then(function(response) {
			location.reload();
		});
	}, false);
}