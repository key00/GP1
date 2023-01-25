const countriesList = document.getElementById("country");
let countries;
// countriesList.addEventListener("change", newCountrySelection);

fetch("https://restcountries.com/v2/all")
  .then((res) => res.json())
  .then((data) => initialize(data))
  .catch((err) => console.log("Error:", err));

console.log(res);
function initialize(countriesData) {
  countries = countriesData;
  let options = "";
  countries.forEach(
    (country) =>
      (options += `<option value="${country.alpha3Code}">${country.name}</option>`)
  );
  countriesList.innerHTML = options;
}

const citiesList = document.getElementById("city");
let cities;
function newCountrySelection(event) {
  // Get the selected country's code
  const countryCode = event.target.value;

  // Fetch the cities for the selected country
  fetch(`https://restcountries.com/cities?country=${countryCode}`)
    .then((res) => res.json())
    .then((data) => {
      // Handle the returned data
      let options = "";
      data.forEach((city) => (options += `<option>${city.name}</option>`));
      citiesList.innerHTML = options;
    })
    .catch((err) => console.log("Error:", err));
}

$.getJSON("https://restcountries.eu/v2/all", function (data) {
  var select = $("#country");
  $.each(data, function (key, val) {
    select.append('<option id="' + key + '">' + val.name + "</option>");
  });
});
