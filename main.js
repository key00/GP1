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
$(document).ready(function () {
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
});

// checking phone number
// let phoneInput = document.getElementById("phone_number");

// phoneNumberInput.addEventListener("input", function (e) {
//   try {
//     const phoneUtil = PhoneNumberUtil.getInstance();

//     let parsedNumber = phoneUtil.parse(e.target.value);
//     let formattedNumber = phoneUtil.format(
//       parsedNumber,
//       google_libphonenumber.PhoneNumberFormat.INTERNATIONAL
//     );
//     e.target.value = formattedNumber;
//   } catch (err) {
//     console.log(err.message);
//   }
// });

// const iti = intlTelInput(phoneInput, { initialCountry: "tr" });
// const phoneNumber = iti.getNumber();

// let x = phoneInput.replace(/[^\d]/g, "");
// x = x.slice(0, 10);
// x = x.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
// document.getElementById("phone_number").innerHTML = x;
// $("#phone_number").addEventListener(keydown, PhoneNumberFormatter);

// function formatPhoneNumber(value) {
//   if (!value) return value;
//   const phoneNumber = value.replace(/[^\d]/g, "");
//   if (phoneNumber < 4) return phoneNumber;
//   if (phoneNumber < 7) {
//     return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
//   }
//   return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
//     3,
//     6
//   )}-${phoneNumber.slice(6, 9)}`;
// }

// function PhoneNumberFormatter() {
//   const inputField = document.getElementById("phone_number");
//   const formattedInputValue = formatPhoneNumber(inputField);
//   inputField.value = formattedInputValue;
// }

// var phoneNumbers = document.getElementById("phone_number");
// for (var i = 0; i < phoneNumbers.length; i++) {
//   var phoneNumber = phoneNumbers[i];
//   var phoneNumberText = phoneNumber.innerHTML;
//   var formattedPhoneNumber = phoneNumberText.replace(
//     /(\d{3})(\d{3})(\d{4})/,
//     "$1-$2-$3"
//   );
//   phoneNumber.innerHTML = formattedPhoneNumber;
// }

const phoneInputField = document.querySelector("#phone_number");
const phoneInput = window.intlTelInput(phoneInputField, {
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  initialCountry: "tr",
});
