document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
  
    fetch('login.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      alert(data.message);
      if (data.message === "Login successful") {
        // Set login state in local storage
        localStorage.setItem('isLoggedIn', 'true');
        // Redirect to the main page after login
        window.location.href = '../../index.php';
      }
    })
    .catch(error => console.error('Error logging in:', error));
  });