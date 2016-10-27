var geocoder;
var map;
//var map2;
 
function initialize() {	
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-11.810740, -51.553480);
	 
    var options = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	 
    map = new google.maps.Map(document.getElementById("map"), options);
    carregarPontos();		
}

function carregarPontos() {
                
    var markersArray = [];
    $.getJSON("pontos.php",function(result){                    
		//var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(result, function(i, info){
            var icone = "";
            var title = "";
            if (info['problema'] == "agua") {
                icone = "img/marker/marker1.png"
                title = "Denuncia de Água";
            } else {
                icone = "img/marker/marker2.png"
                title = "Denuncia de Luz";
            }
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(info['latitude'], info['longitude']),
                title: title,
                map: map,
                icon: icone
            });
 
			markersArray.push(marker);
       });
    }); 
	
}