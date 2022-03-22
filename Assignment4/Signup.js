function checkZipNum() {

  let input = document.forms["profile"]["Zipcode"].value;
  let valid = true;
  for (let i = 0; i < input.length; i++)
  {
    if (isNaN(input[i]))
    {
      alert("Only Digits 0-9 Allowed");
      return false;
    }
  }
}
