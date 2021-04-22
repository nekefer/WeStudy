const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

var lienDelete = document.querySelector('.delete')
lienDelete.addEventListener('click', function(event){
	var reponse = window.confirm("VOULEZ VOUS VRAIMENT SUPPRIMER CE TWEET?")
	if(reponse === false ){
		event.preventDefault()
	}
})