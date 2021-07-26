//Obteniendo localizacion
const Http = new XMLHttpRequest();
function getLocation() {
    var bdcApi = "https://api.bigdatacloud.net/data/reverse-geocode-client"
    navigator.geolocation.getCurrentPosition(
        (position) => {
            bdcApi = bdcApi
                + "?latitude=" + position.coords.latitude
                + "&longitude=" + position.coords.longitude
                + "&localityLanguage=en";
            getApi(bdcApi);

        },
        (err) => { getApi(bdcApi); },
        {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        });
}
function getApi(bdcApi) {
    Http.open("GET", bdcApi);
    Http.send();
    Http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let resultado = JSON.parse(this.responseText);
            let provincia = resultado.localityInfo.administrative[1].isoName;
            let ciudad = resultado.city;
            
            const xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "core/location.php?ciudad=" + ciudad + "&provincia=" + provincia, true);
            xmlhttp.send();
        }
    };
}

getLocation();