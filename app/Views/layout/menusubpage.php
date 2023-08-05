<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            /* Set the opacity value as desired (range from 0 to 1) */
            opacity: 0.6; 
            /* Push the background image to the back */
            z-index: -1; 
        }
        .bold-text {
            font-weight: bold;
            text-align: left;
        }
        /* Hide the input visually */
        .inputfile {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none;
        }

        /* Optionally, style the label to look like a button */
        .ui.button {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f0f0f0;
            color: #333;
        }
        /* Hide the second input visually */
        .inputfile1 {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none;
        }

        /* Optionally, style the label to look like a button */
        .ui.red.button {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            /* Set the color to red (#f00) for a red button */
            color: #ffffff; 
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title><?= $this->renderSection('pageTitle') ?> | MIS</title>

</head>

<body>

    <div class="ui inverted menu">
        <a href="./dashboard" class="item">Dashboard</a>
        <a href="./urine_test" class="item">Urine Test Request Form</a>
        <a href="./image_repo" class="item">Image Repository</a>
    </div>
    
    <div class="background-image"></div>
    
    <?= $this->renderSection('content') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>