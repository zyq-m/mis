<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css"
    integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    body {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .background-image1 {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('https://thehill.com/wp-content/uploads/sites/2/2022/09/CA_mammogram_09282022istock.jpg?w=1280&h=720&crop=1');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  opacity: 1; /* Set the opacity value as desired (range from 0 to 1) */
  transform: scaleX(-1); /* Flip the background image horizontally */
  z-index: -1;
}
    .background-image2 {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #Fbebb9;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      opacity: 0.6; /* Set the opacity value as desired (range from 0 to 1) */
    }
    .background-image3 {
      position: fixed;
      top: 0;
      left: 0;
      width: 50%;
      height: 100%;
      background-color: white;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      opacity: 0.7; /* Set the opacity value as desired (range from 0 to 1) */
    }
    .ui.labeled.input.fluid input[type="text"] {
      border: 1px solid black;
    }
    .ui.labeled.input.fluid input[type="password"] {
      border: 1px solid black;
    }
  </style>

  <!-- Add jQuery (required for Semantic UI) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

  <div class="background-image1"></div>
  <div class="background-image2"></div>
  <div class="background-image3"></div>

  <div class="ui four column centered grid" style="width: 1000vh;">

    <div class="middle aligned column">
      <h1>Login</h1>
      <div >Please insert your account detail:</div>
      <div>
        <div class="ui labeled input fluid" style="margin-top: 10px;">
          <div class="ui black label">
            <i class="mail icon"></i>
          </div>
          <input type="text" id="email" name="email" placeholder="Please enter email *">
        </div>
      </div>
      <div style="margin-top: 10px;">
        <div class="ui labeled input fluid">
          <div class="ui black label">
            <i class="lock icon"></i>
          </div>
          <input type="password" id="password" name="password" placeholder="Enter password *">
        </div>
      </div>
      <div style="margin-top: 10px;">
        <button class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">Forgot Password?</button>
        <a href="/RegisterPage" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">Create New Account</a>
      </div>
      <div style="margin-top: 10px;">
        <a href="/Dashboard" class="ui black button flat no-caps" onclick="submitLogin()">Login</a>
      </div>
    </div>

    <div class="middle aligned column">
    </div>

    <div class="middle aligned column">
      <h1>Memogram Information System(MIS)</h1>
    </div>


  </div>

  <!-- Include both scripts together -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
    integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    // Custom JavaScript functions here, including the submitLogin() function
    function submitLogin() {
      // Implement the login functionality
    }
  </script>

</body>

</html>
