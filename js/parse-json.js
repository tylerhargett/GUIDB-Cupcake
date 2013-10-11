function process_static_db_json()
{
	var r = JSON.parse(this.responseText);
	
	// FLAVORS
	for (var i in r["cakes"]) {
		var img = document.createElement("img");
		img.src = "img/" + r["cakes"][i]["picture"];
		document.getElementById('Flavor').appendChild(img);
	}
	// FROSTINGS
	for (var i in r["frostings"]) {
		var img = document.createElement("img");
		img.src = "img/" + r["frostings"][i]["picture"];
		document.getElementById('Icing').appendChild(img);
	}
	// FILLINGS
	for (var i in r["fillings"]) {
		var cvn = document.createElement("canvas");
		n = cvn.getContext('2d');
		n.rect(50,50,50,50);
		n.fillStyle = r["fillings"][i]["rgb"];
		n.fill();
		document.getElementById('Filling').appendChild(cvn);
	}
	// TOPPINGS
	for (var i in r["toppings"]) {
		var p = document.createElement("p");
		p.innerHTML = r["toppings"][i]["name"];
		document.getElementById('Toppings').appendChild(p);
	}



}

function get_json_and_draw()
{
	var json_req = new XMLHttpRequest();
	json_req.onload = process_static_db_json;
	json_req.open("get", "http://cupcakes.vkv.me/GetCupcakeInfo.php");
	json_req.send();
}

window.onload = get_json_and_draw;
