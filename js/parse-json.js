function process_static_db_json()
{
	var r = JSON.parse(this.responseText);
	
	// FLAVORS
	for (var i in r["cakes"]) {
		var p = document.createElement("p");
		var cb = document.createElement("input");
		cb.type = "radio";
		cb.name = "flavaflav";
		cb.value = r["cakes"][i]["flavor"];

		var img = document.createElement("img");
		img.src = "img/" + r["cakes"][i]["picture"];
		p.appendChild(cb);
		p.appendChild(img);		

		document.getElementById('Flavor').appendChild(p);
	}
	// FROSTINGS
	for (var i in r["frostings"]) {
		var p = document.createElement("p");
                var cb = document.createElement("input");
                cb.type = "radio";
                cb.name = "frosty";
		cb.value = r["frostings"][i]["name"];

		var img = document.createElement("img");
		img.src = "img/" + r["frostings"][i]["picture"];
		p.appendChild(cb);
		p.appendChild(img);

		document.getElementById('Icing').appendChild(p);
	}
	// FILLINGS
	for (var i in r["fillings"]) {
		var div = document.createElement("div");
                var cb = document.createElement("input");
                cb.type = "radio";
                cb.name = "fillinz";
		cb.value = r["fillings"][i]["name"];	

		var divFill = document.createElement("div");
		divFill.style.backgroundColor = r["fillings"][i]["rgb"];
		div.appendChild(cb);
		div.appendChild(divFill);

		document.getElementById('Filling').appendChild(div);
	}
	// TOPPINGS
	for (var i in r["toppings"]) {
		var p = document.createElement("p");
		var cb = document.createElement("input");
		cb.type = "checkbox";
		cb.value = r["toppings"][i]["name"];
		p.innerHTML = r["toppings"][i]["name"];
		p.appendChild(cb);
		
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
