function myFunction() { //set minimum date and also default date to current day
    document.getElementById('datepicker').valueAsDate = new Date();
    document.getElementById('datepicker').min = new Date().toISOString().substring(0, 10);
  }

  function setDateMin() {
    document.getElementById('datepicker').min = new Date().toISOString().substring(0, 10);
  }
