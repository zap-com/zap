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

const _ = require('lodash');

var placesAutocomplete = places({
    appId: "plJEYXAMRTHF",
    apiKey: "ce563e532d0eb5b14fda8a4614f302e7",
    language: "it",
    container: document.querySelector("#address-input")
});

var pl_2 = places({
    appId: "plJEYXAMRTHF",
    apiKey: "c36ed29d68decfe7547d4897d1d9c568",
    language: "it",
    container: document.querySelector("#addressinputmobile")
});

placesAutocomplete.on("change", e => {

    let json = {
        name: e.suggestion.name,
        region: _.kebabCase(e.suggestion.administrative.replace('/', '-')),
        region_code: e.suggestion.hit.county[1] || e.suggestion.hit.county[0],
        country_code: e.suggestion.countryCode,
        post_code: e.suggestion.postcode || e.suggestion.hit.objectID,
        cordinates: e.suggestion.latlng
    }
    document.getElementById("hiddenplace").value = JSON.stringify(json)
});

pl_2.on("change", e => {

    let json = {
        name: e.suggestion.name,
        region: _.kebabCase(e.suggestion.administrative.replace('/', '-')),
        region_code: e.suggestion.hit.county[1] || e.suggestion.hit.county[0],
        country_code: e.suggestion.countryCode,
        post_code: e.suggestion.postcode || e.suggestion.hit.objectID,
        cordinates: e.suggestion.latlng
    }
    document.getElementById("hiddenplacemobile").value = JSON.stringify(json)
});