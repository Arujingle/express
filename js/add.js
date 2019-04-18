function parse() {
	let downform = document.querySelector("#down");
	if (used===0){
		button.className="in-text-up";
		downform.className="opening-window-after";
	}else{
		button.className="in-text-down";
		downform.className="opening-window";
	}
	used++;
	used=used%2;
	console.log(button.className);
}

let used=0;
let button = document.querySelector("#button-add");
button.addEventListener("click", parse)