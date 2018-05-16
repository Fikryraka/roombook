var datanya = "cari=2103161052";
var page = require("webpage").create();
page.open("https://mis.eepis-its.edu/cari.php", "POST", datanya, function(status) {
	if(status === "success") {
		var jml = page.evaluate(function(){
			var hasil = [];
			var itung = document.querySelectorAll("tr[bgcolor='#8FC4F1']>td[align='left']");
			if(itung.length > 1){
				for(var i=0; i<itung.length; i++){
					hasil.push(itung[i].textContent);
				}
				return hasil;
			}else{
				return "NOT_FOUND";
			}
		});
		console.log(jml);
	}
	phantom.exit();
});
