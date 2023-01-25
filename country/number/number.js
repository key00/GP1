// function formatPhoneNumber(value) {
//   if (!value) return value;
//   const phoneNumber = value.toString().replace(/[^\d]/g, "");
//   if (phoneNumber < 4) return phoneNumber;
//   if (phoneNumber < 7) {
//     return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
//   }
//   return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
//     3,
//     6
//   )}-${phoneNumber.slice(6, 9)}`;
// }

// $("#phone").addEventListener(keyup, function phoneNumberFormatter() {
//   const inputField = document.getElementById("phone");
//   //   console.log(typeof inputField);
//   const phoneNumber = String(inputField).replace(/[^\d]/g, "");
//   if (phoneNumber < 4) return (inputField.value = phoneNumber);
//   if (phoneNumber < 7) {
//     return (inputField.value = `(${phoneNumber.slice(
//       0,
//       3
//     )}) ${phoneNumber.slice(3)}`);
//   }
//   return (inputField.value = `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
//     3,
//     6
//   )}-${phoneNumber.slice(6, 9)}`);
//   const formattedInputValue = formatPhoneNumber(inputField);
//   inputField.value = formattedInputValue;
// });
// phoneInput = document.getElementById("phone");
// let x = phoneInput.toString().replace(/[^\d]/g, "");
// x = x.slice(0, 10);
// x = x.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
// phoneInput = x;
// var phoneNumbers = document.getElementById("phone");
// for (var i = 0; i < phoneNumbers.length; i++) {
//   var phoneNumber = phoneNumbers[i];
//   var phoneNumberText = phoneNumber.innerHTML;
//   var formattedPhoneNumber = phoneNumberText.replace(
//     /(\d{3})(\d{3})(\d{4})/,
//     "$1-$2-$3"
//   );
//   phoneNumber.innerHTML = formattedPhoneNumber;
// }
