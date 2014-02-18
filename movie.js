function handleChange(dropDown)
{
	//alert("dropDown list changed to " + dropDown.value);
	
	var xmlRequest = new XMLHttpRequest();
	xmlRequest.onreadystatehange = function() {
		if (xmlRequest.readyState == 4 && xmlRequest.status == 200) 
		{
			handleResult(xmlRequest.responseText);
		}
	};
	
	xmlRequest.open("GET", "getMovies.php?actorId=" + dropDown.value, true);
	xmlRequest.send();
}

function handleResult(result)
{
	alert("Got this back: " + result);
}