  function setDateMin() {
    document.getElementById('datepicker').min = new Date().toISOString().substring(0, 10);
  }

  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
window.onload = function() {
  if (document.getElementById("gallons").value == "" || document.getElementById("datepicker").value == "")
  {
     document.getElementById("getQuote").disabled = true;
  }
  if (document.getElementById("gallons").value == "" || document.getElementById("datepicker").value == "")
  {
    document.getElementById("submit").disabled = true;
  }
  document.getElementById("gallons").addEventListener("input", listen);
  document.getElementById("datepicker").addEventListener("input", listen);

  document.getElementById("total").addEventListener("input", listenSubmit);
  document.getElementById("suggestedprice").addEventListener("input", listenSubmit);

  document.getElementById("gallons").addEventListener("input", changed);
  document.getElementById("datepicker").addEventListener("input", changed);
  }
 
function listen() {
  let gallon = document.getElementById("gallons");  
  let date = document.getElementById("datepicker");
  if (gallon.value != "" && date.value != "")
    {
      document.getElementById("getQuote").disabled = false;
    }
    else
    {
      document.getElementById("getQuote").disabled = true;
    }
  
}

function listenSubmit() {
  let suggested = document.getElementById("suggestedprice");
  let total = document.getElementById("total");

  if (suggested.value != "" && total.value != "")
  {
    document.getElementById("submit").disabled = false;
    
  }
}

function changed() {
  document.getElementById("submit").disabled = true;
}