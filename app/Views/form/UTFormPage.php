<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Urine Test Request Form</title>
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
      z-index: -1; /* Push the background image to the back */
    }
    .ui.inverted.menu {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #222;
    }
    .bold-text {
      font-weight: bold;
      text-align: left;
    }
    .dob-field {
      display: inline-block;
      vertical-align: top;
      margin-right: 20000px;
    }

    /* Adjust the width of the input fields */
    .dob-field input {
      width: 100%;
    }
  </style>

  <!-- Add jQuery (required for Semantic UI) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
<div class="ui inverted menu">
  <a href="/Dashboard" class="item">Dashboard</a>
  <a href="/UTFormPage" class="active item">Urine Test Request Form</a>
  <a href="/ImageRep" class="item">Image Repository</a>
</div>
<div class="background-image"></div>
<div class="ui two column centered grid" style="width: 100%">
  <div class="middle aligned column">
    <h1>Urine Test Request Form</h1>
    <div>Please fill in the Urine Test Request details:</div>
    <div class="ui raised segment">
      <div class="ui one column centered grid">
        <div class="column">
          <div class="bold-text" style="margin-top: 10px;">Full Name :</div>
          <div class="ui labeled input" style="width: 40%">
            <input type="text" id="fullname" name="fullname" placeholder="Please Enter Full Name">
          </div>
          <div class="bold-text" style="margin-top: 10px;">Date of Birth :</div>
            <div class="ui input">
              <input type="date" id="dob" name="dob">
            </div>
          <div class="bold-text" style="margin-top: 10px;">Current Symptoms or Concerns :</div>
          <div class="ui form">
            <div class="field">
              <textarea rows="3" placeholder="Please Enter Current Symptoms or Concerns"></textarea>
            </div>
          </div>
        </div>
      </div>
    <div class="column" style="margin-top: 10px;">
      <a href="/Dashboard" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">Submit Request</a>
    </div>
  </div>
</div>


  <!-- Include both scripts together -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
    integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
  </script>

</body>

</html>
