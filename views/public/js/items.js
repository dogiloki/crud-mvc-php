var content_form=document.getElementById('content-form');
console.log(Array.from(content_form.getElementsByTagName('input')).filter((input)=>{
	return input.name=="name";
}));