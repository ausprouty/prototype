async function countryFind() {
  $.getJSON("https://json.geoiplookup.io", function(data) {
    var ajaxPromise = fetch("/content/countries.json")
      .then(function(response) {
        return response.json();
      })
      .then(function(jsonFile) {
        let index = "ZZ";
        jsonFile.forEach(function(element) {
          if (element.code === data.country_code) {
            index = element.code;
          }
        });
        localStorage.setItem("myFriendsIndex", index); // store index
        return index;
      })
      .then(function(index) {
        console.log("index is: " + index);
        return index;
      });
  });
}
