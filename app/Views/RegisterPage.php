<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
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
    .background-image {
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
    .bold-text {
      font-weight: bold;
      text-align: left;
    }
  </style>

  <!-- Add jQuery (required for Semantic UI) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <div class="background-image"></div>
  <div class="ui two column centered grid" style="width: 150vh;">
    <div class="middle aligned column">
      <h1>Registration Form</h1>
      <div>Please fill in the registration details:</div>
      <div class="ui raised segment">
      <div class="column q-mt-sm">
        <div class="bold-text" style="margin-top: 10px;">Full Name :</div>
         <div class="ui labeled input fluid">
           <input type="text" id="fullname" name="fullname" placeholder="Please Enter Full Name">
         </div>
         <div class="bold-text" style="margin-top: 10px;">Username :</div>
         <div class="column q-mt-sm">
           <div class="ui labeled input fluid">
             <input type="text" id="username" name="username" placeholder="Please Enter Username">
           </div>
          </div>
         <div class="bold-text" style="margin-top: 10px;">Email :</div>
          <div class="column q-mt-sm">
            <div class="ui labeled input fluid">
              <input type="email" id="email" name="email" placeholder="Please Enter Email">
           </div>
         </div>
          <div class="bold-text" style="margin-top: 10px;">Password :</div>
          <div class="column">
            <div class="ui labeled input fluid">
              <input type="password" id="password" name="password" placeholder="Please Enter Password">
            </div>
          </div>
          <div class="bold-text" style="margin-top: 10px;">Re-enter Your Password :</div>
          <div class="column">
            <div class="ui labeled input fluid">
              <input type="repassword" id="repassword" name="repassword" placeholder="Please Re-enter The Password">
            </div>
          </div>
          <div class="bold-text" style="margin-top: 10px;">
            <input type="checkbox" tabindex="0" class="fitted">
            <label>I agree to the Terms and Conditions</label>
          </div>
          <!-- Add more form fields as needed for registration -->
          <div class="column q-mt-sm" style="margin-top: 10px;">
            <a href="/" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">Register</a>
          </div>
        </div>
      </div>
      </div>


  <!-- Include both scripts together -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
    integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    // Custom JavaScript functions here, including the submitRegistration() function
    function submitRegistration() {
      // Implement the registration form submission
    }
  </script>

</body>

</html>
