function checkZipSize() {
  let x = document.forms["profile"]["Zipcode"].length;
  if (x > 4 && x < 10) {
    return true;
  }
  return false;
}