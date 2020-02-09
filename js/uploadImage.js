//var handleUpload = function(event){
function handleUpload(){
	document.getElementById('image_result').style.display = "block";
	//event.preventDefault();
	//event.stopPropagation();
	var fileInput = document.getElementById('file');

	var data = new FormData();

	data.append('ajax', true);

	for (var i = 0; i < fileInput.files.length; i++) {
		data.append('file[]', fileInput.files[i]);
        if (i == 3) {
			document.getElementById('file').style.display = "none";
			break;
		}
	}

	var request = new XMLHttpRequest();

	request.addEventListener('readystatechange', function(event){
		if (this.readyState == 4 && this.status == 200) {
			var links = document.getElementById('image_result');
			var uploaded = eval(this.response);
			var div, a, img;	
			for (var i = 0; i < uploaded.length; i++) {
					//div = document.createElement('div');
					a = document.createElement('input');
					img = document.createElement('img');
					img.setAttribute('src', 'image/'+uploaded[i]);
					img.setAttribute('width',200);
					img.setAttribute('id', 'pic'+i);
					a.setAttribute('id', 'image'+i);
					a.setAttribute('readonly', 'readonly');
					a.setAttribute('value', 'image/'+uploaded[i]);
					a.appendChild(document.createTextNode(uploaded[i]));
					//div.appendChild(a);
					//div.appendChild(img);
					//links.appendChild(div);
					links.appendChild(a);
					links.appendChild(img);
				}	
		}
		else{
			console.log('Server replied with HTTP status ' + this.status );
		}
			
	});
	
	request.open('POST', 'addProduct.php');
	request.setRequestHeader('Cache-Control', 'no-cache');
	request.send(data);
}
	function removePre(){
		divTop = document.getElementById('image_result');
		for (var i = 0; i <= 100; i++) {
			divTop.removeChild(divTop.childNodes[0]);
			}
	}

window.addEventListener('load', function (event) {
	var submit = document.getElementById('file');
	//submit.addEventListener('change', handleUpload);
});