function registerForEvent() {
    const selectedEvent = document.getElementById('events').value;
  
    fetch('/user/registerForEvent', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ event: selectedEvent }),
    })
    .then((response) => response.json())
        .then((responseData) => {
          if (responseData.status === 'success') {
            showTimedAlert(responseData.message);
          } else if( responseData.message==="User logged out!" ){
            window.location.href = '/userLogin/userLogin.html';
          }else{
            showTimedAlert(responseData.message);
          }
        })
        .catch((error) => {
          alert(error);
        });
  }

  function showTimedAlert(message) {
    // Create a div element for the alert
    var alertDiv = document.createElement('div');
    alertDiv.className = 'euphoria-alert';
    alertDiv.innerHTML = message;

    // Append the alert to the body
    document.body.appendChild(alertDiv);

    // Trigger reflow to enable transition
    void alertDiv.offsetWidth;

    // Set styles to make the alert visible
    alertDiv.style.opacity = '1';
    alertDiv.style.top = '20px'; // Adjust as needed

    // Set a timeout to remove the alert after a specific duration (e.g., 5000 milliseconds for 5 seconds)
    setTimeout(function () {
      // Set styles to make the alert disappear
      alertDiv.style.opacity = '0';
      alertDiv.style.top = '0';
      
      // Remove the alert after the transition
      setTimeout(function () {
        document.body.removeChild(alertDiv);
      }, 500); // Adjust the time to match the transition duration
    }, 5000); // Adjust the time as needed
  }

