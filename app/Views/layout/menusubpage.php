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

        .ui.inverted.segment {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #222;
            border-radius: 0;
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
            opacity: 0.6;
            /* Set the opacity value as desired (range from 0 to 1) */
            z-index: -1;
            /* Push the background image to the back */
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
            color: #ffffff;
            /* Set the color to red (#f00) for a red button */
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

        #notification {
            position: fixed;
            top: 7%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }

        /* Add other CSS styles to make it look like a popup */
        #notification .close.icon {
            position: fixed;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        #notification .header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #notification p {
            font-size: 14px;
            margin: 0;
            line-height: 1.5;
            text-align: center;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title><?= $this->renderSection('pageTitle') ?> | MIS</title>

</head>

<body>

    <div class="ui inverted segment">
        <div class="ui inverted secondary pointing menu">
            <a href="/dashboard" class="item">
                Dashboard
            </a>
            <a href="/urine_test" class="item">
                Urine Test Request Form
            </a>
            <a href="/image_repo" class="item">
                Image Repository
            </a>
            <div class="right menu">
                <a href="/" class="ui secondary button">
                    <i class="ui logout icon"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>



    <div class="background-image"></div>

    <?= $this->renderSection('content') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            // Get the current page URL
            var currentUrl = window.location.pathname;

            // Add click event handler to all menu items
            $('.ui.inverted.secondary.pointing.menu a.item').each(function() {
                var menuItemUrl = $(this).attr('href');

                // Check if the menu item URL matches the current page URL
                if (currentUrl === menuItemUrl) {
                    $(this).addClass('active item'); // Add the "active item" class to the matching link
                }
            });
        });
    </script>

</body>

</html>