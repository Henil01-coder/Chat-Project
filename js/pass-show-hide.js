const psdField = document.querySelector(".form input[type='password']"),
toggleIcon = document.querySelector(".form .field i");


toggleIcon.onclick = ()=>{
	if(psdField.type === "password"){

		psdField.type = "text";
		toggleIcon.classList.add("active");
	}
	else{

		psdField.type === "password";
		toggleIcon.classList.remove("active");
	}
}