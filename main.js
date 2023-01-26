// import { PhoneNumberUtil } from "google-libphonenumber";
// checking password
function checkLength(password) {
  if (password.length < 8) {
    return false;
  }
  return true;
}

// Complexity requirements
function checkComplexity(password) {
  let hasLowercase = false;
  let hasUppercase = false;
  let hasNumber = false;
  let hasSpecial = false;

  for (let i = 0; i < password.length; i++) {
    let char = password.charAt(i);
    if (char >= "a" && char <= "z") {
      hasLowercase = true;
    } else if (char >= "A" && char <= "Z") {
      hasUppercase = true;
    } else if (char >= "0" && char <= "9") {
      hasNumber = true;
    } else if (
      char === "!" ||
      char === "@" ||
      char === "#" ||
      char === "$" ||
      char === "." ||
      char === "," ||
      char === "%"
    ) {
      hasSpecial = true;
    }
  }

  return hasLowercase && hasUppercase && hasNumber && hasSpecial;
}

let passwordInput = document.getElementById("password");
let passwordError = document.getElementById("check_password");

passwordInput.addEventListener("input", function () {
  let password = passwordInput.value;
  if (!checkLength(password) || !checkComplexity(password)) {
    passwordInput.setCustomValidity(
      "Must contain at least one number and one uppercase and lowercase letter and one special character, and at least 8 or more characters."
    );

    passwordError.innerHTML = passwordInput.validationMessage;
  } else {
    passwordInput.setCustomValidity("");
    passwordError.innerHTML = "";
  }
});

// using restcountries api and json file

fetch("https://restcountries.com/v2/all")
  .then((response) => response.json())
  .then((data) => {
    var countrySelect = document.getElementById("country");
    var citySelect = document.getElementById("city");

    for (var i = 0; i < data.length; i++) {
      var option = document.createElement("option");

      option.value = data[i].name;
      option.text = data[i].name;

      countrySelect.add(option);
    }

    countrySelect.addEventListener("change", function () {
      var selectedCountry = this.value;

      citySelect.innerHTML = "";

      fetch("cities.json")
        .then((response) => response.json())
        .then((cityData) => {
          var cities = cityData[selectedCountry];
          if (cities) {
            for (var j = 0; j < cities.length; j++) {
              var option = document.createElement("option");

              option.value = cities[j];
              option.text = cities[j];

              citySelect.add(option);
            }
          } else {
            console.log("No cities found for this country in the JSON file.");
          }
        })
        .catch((error) => {
          console.error("Error loading JSON data: ", error);
        });
    });
  })
  .catch((error) => {
    console.error("Error loading country data: ", error);
  });

// checking email and username availability

$("#username").keyup(function () {
  var username = $(this).val();
  if (username.length > 1) {
    $.ajax({
      url: "check_user.php",
      type: "post",
      data: {
        username: username,
        action: "check_username",
      },
      success: function (response) {
        $("#check_username").html(response);
      },
    });
  }
});

$("#email").keyup(function () {
  var email = $(this).val();
  if (email.length > 1) {
    $.ajax({
      url: "check_user.php",
      type: "post",
      data: {
        email: email,
        action: "check_email",
      },
      success: function (response) {
        $("#check_email").html(response);
      },
    });
  }
});

// checking phone number

let phoneInput = document.getElementById("phone_number");

phoneInput.addEventListener("input", function () {
  let phoneNumber = phoneInput.value.replace(/[^\d]/g, "");
  formattedNumber = phoneNumber.slice(0, 10);
  formattedNumber = formattedNumber.replace(
    /(\d{3})(\d{3})(\d{4})/,
    "($1) $2-$3"
  );
  phoneInput.value = formattedNumber;
});
const iti = window.intlTelInput(phoneInput, {
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  initialCountry: "tr",
  separateDialCode: true,
  hiddenInput: "full",
});
$(".iti__country-list li").click(function () {
  $("#dialCode").val($(this).data("dial-code"));
});
