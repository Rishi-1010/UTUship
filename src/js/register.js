document.getElementById('registration-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const formData = new FormData(this);

  fetch('register.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    alert(data.message);
    if (data.message === "User registered successfully") {
      window.location.href = '../index.php'; // Redirect to the main page after registration
    }
  })
  .catch(error => console.error('Error registering user:', error));
});