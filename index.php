<!-- filepath: /c:/xampp/htdocs/UTUship/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uka Tarsadia University Social Connection</title>
  <link href="src/css/style.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Uka Tarsadia University Social Connection</h1>
    <div id="auth-buttons" class="text-center mb-4">
      <a href="auth/registration/register.html" class="btn btn-primary">Register</a>
      <a href="auth/login/login.html" class="btn btn-secondary">Login</a>
    </div>
    <div id="profile-container" class="d-flex justify-content-center align-items-center" style="height: 400px;">
      <!-- Profile cards will be dynamically inserted here -->
    </div>
  </div>

  <script src="src/js/swipe.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Check if user is logged in
      const isLoggedIn = localStorage.getItem('isLoggedIn');
      if (isLoggedIn === 'true') {
        showLogoutButton();
      }
    });

    function showLogoutButton() {
      const authButtons = document.getElementById('auth-buttons');
      authButtons.innerHTML = '<button class="btn btn-danger" onclick="logout()">Logout</button>';
    }

    function logout() {
      localStorage.removeItem('isLoggedIn');
      window.location.href = 'index.php';
    }
  </script>
</body>
</html>