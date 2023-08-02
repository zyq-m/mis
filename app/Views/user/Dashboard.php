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
    .ui.inverted.menu {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #222;
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
      z-index: -1; /* Push the background image to the back */
    }
    .bold-text {
      font-weight: bold;
      text-align: left;
    }
    .ui.inverted.menu {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background-color: #222;
    }
  </style>

  <!-- Add jQuery (required for Semantic UI) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="ui inverted menu">
        <a href="/Dashboard" class="active item">Dashboard</a>
        <a href="/UTFormPage" class="item">Urine Test Request Form</a>
        <a href="/ImageRep" class="item">Image Repository</a>
    </div>
    <div class="background-image"></div>
    <div class="ui two column centered grid" style="width: 150vh;">
        <div class="middle aligned column">
            <h1>Dashboard Page</h1>
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
