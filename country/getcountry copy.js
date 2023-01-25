// var phoneNumber = "+1234567890";
// var phoneNumber = libphonenumber.parse(phoneNumber, "US");
// console.log(
//   libphonenumber.format(
//     phoneNumber,
//     libphonenumber.PhoneNumberFormat.INTERNATIONAL
//   )
// );
const { PhoneNumberUtil } = require("google-libphonenumber");
const phoneUtil = PhoneNumberUtil.getInstance();

let phoneNumberInput = document.getElementById("phone_number");

phoneNumberInput.addEventListener("input", function (e) {
  try {
    const phoneUtil = PhoneNumberUtil.getInstance();

    let parsedNumber = phoneUtil.parse(e.target.value);
    let formattedNumber = phoneUtil.format(
      parsedNumber,
      google_libphonenumber.PhoneNumberFormat.INTERNATIONAL
    );
    e.target.value = formattedNumber;
  } catch (err) {
    console.log(err.message);
  }
});
