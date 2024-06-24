function initMap() {
    // Losowa lokalizacja dla przykładu
    var myLatLng = {lat: 40.7128, lng: -74.0060}; // Nowy Jork

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Lokalizacja treningów'
    });
}
