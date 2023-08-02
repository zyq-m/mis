<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breast Cancer Image Repository</title>
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
            color: #ffffff; /* Set the color to red (#f00) for a red button */
        }

    </style>
    <!-- Add jQuery (required for Semantic UI) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="ui inverted menu">
        <a href="/Dashboard" class="item">Dashboard</a>
        <a href="/UTFormPage" class="item">Urine Test Request Form</a>
        <a href="/ImageRep" class="active item">Image Repository</a>
    </div>
    <div class="background-image"></div>
    <div class="ui two column centered grid" style="width: 100%">
        <div class="middle aligned column">
            <div class="ui container">
                <h1>Image Repository</h1>
                <div>Please fill in the Image Upload details:</div>
                <form style="margin-top: 10px;" action="/ImageRep" method="post" enctype="multipart/form-data">
                    <div class="ui raised segment">
                        <div class="ui one column centered grid">
                        <div class="column">
                        <div class="bold-text" style="margin-top: 10px;">Upload Image:</div>
                        <input type="file" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput" aria-hidden="true">
                        <label for="embedpollfileinput" class="ui small green left floated button" id="uploadButton">
                            <i class="ui upload icon"></i>
                            Upload Image
                        </label>
                        <input type="file" (change)="fileEvent($event)" class="inputfile1" id="embedpollfileinput1" aria-hidden="true">
                        <label for="embedpollfileinput1" class="ui small red left floated button" id="reuploadButton" style="display: none;">
                            <i class="ui upload icon"></i>
                            Reupload Image
                        </label>
                        <div id="successText" style="display: none; color: green; font-weight: bold; margin-top: 10px;">
                            Image has been inserted!
                        </div>
                    </div>
                            <div class="column">
                                <div class="bold-text">Comment:</div>
                                <div class="ui form">
                                    <div class="field">
                                        <textarea rows="3" placeholder="Please Enter Current Symptoms or Concerns"></textarea>
                                    </div>
                                </div>
                            </div>
                            <a href="/Dashboard" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 20px;">Submit Request</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
        integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Get the file input elements and buttons
        const fileInput = document.getElementById('embedpollfileinput');
        const fileInput1 = document.getElementById('embedpollfileinput1');
        const uploadButton = document.getElementById('uploadButton');
        const reuploadButton = document.getElementById('reuploadButton');

        // Add event listeners to the file inputs
        fileInput.addEventListener('change', () => {
            toggleButtons();
        });
        fileInput1.addEventListener('change', () => {
            toggleButtons();
        });

        // Function to toggle the visibility and disabled state of the buttons
        function toggleButtons() {
            if (fileInput.files.length > 0) {
                uploadButton.style.display = 'none';
                reuploadButton.style.display = 'inline-block';
                // Show the success text when the red button is visible and a file is selected
                successText.style.display = 'block';
            } else if (fileInput1.files.length > 0) {
                uploadButton.style.display = 'none';
                reuploadButton.style.display = 'inline-block';
                // Show the success text when the red button is visible and a file is selected
                successText.style.display = 'block';
            } else {
                uploadButton.style.display = 'inline-block';
                reuploadButton.style.display = 'none';
                // Hide the success text when neither the green nor the red button is visible
                successText.style.display = 'none';
            }
        }
    </script>
</body>

</html>
