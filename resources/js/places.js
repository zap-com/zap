

/* $(document).ready(function () {
    $("#lat_area").addClass("d-none");
    $("#long_area").addClass("d-none");
});

google.maps.event.addDomListener(window, 'load', initialize);

function initialize() {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        $('#latitude').val(place.geometry['location'].lat());
        $('#longitude').val(place.geometry['location'].lng());
        $("#lat_area").removeClass("d-none");
        $("#long_area").removeClass("d-none");
    });
} */

var placesAutocomplete = places({
    appId: 'plJEYXAMRTHF',
    apiKey: 'ce563e532d0eb5b14fda8a4614f302e7',
    language: 'it',
    container: document.querySelector('#address-input')
});



placesAutocomplete.on('change', e => console.log(e.suggestion.administrative));
placesAutocomplete.on('change', e => console.log(e.suggestion.name));
placesAutocomplete.on('change', e => console.log(e.suggestion.latlng));
placesAutocomplete.on('change', e => console.log(e.suggestion));
placesAutocomplete.on('change', e => console.log(e.suggestion.latlng.lat));
placesAutocomplete.on('change', e => document.getElementById('hiddenplace').value = JSON.stringify([e.suggestion.name, e.suggestion.administrative, e.suggestion.hit.county[1], e.suggestion.countryCode, e.suggestion.postcode, e.suggestion.latlng]));
