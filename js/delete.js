
let id = document.getElementsByClassName("button-delete");
for (let i = 0; i < id.length; ++i){
	id[i].addEventListener('click', function libirate(){
		let ar = id[i].id;
		$el=document.getElementById('b'+ar);
		$el.innerHTML="";
		$el.className="hidden";
		let data = new FormData();
		data.append("data", ar);

		fetch("../functions/delete.php",{
			method:"POST",
			body:data
		});
	}, false);
}