<?php
session_start();
if (isset($_SESSION['teacher'])) {
    $sub_id = $_REQUEST['sub_id'];
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

        <title>Upload record</title>
        <style>
            .input-file-container {
                position: relative;
                width: 225px;
            }

            .js .input-file-trigger {
                display: block;
                padding: 14px 45px;
                background: #39D2B4;
                color: #fff;
                font-size: 1em;
                transition: all .4s;
                cursor: pointer;
            }

            .js .input-file {
                position: absolute;
                top: 0;
                left: 0;
                width: 225px;
                opacity: 0;
                padding: 14px 0;
                cursor: pointer;
            }

            .js .input-file:hover+.input-file-trigger,
            .js .input-file:focus+.input-file-trigger,
            .js .input-file-trigger:hover,
            .js .input-file-trigger:focus {
                background: #34495E;
                color: #39D2B4;
            }

            .file-return {
                margin: 0;
            }

            .file-return:not(:empty) {
                margin: 1em 0;
            }

            .js .file-return {
                font-style: italic;
                font-size: .9em;
                font-weight: bold;
            }

            .js .file-return:not(:empty):before {
                content: "Selected file: ";
                font-style: normal;
                font-weight: normal;
            }

            /* Useless styles, just for demo styles */

            body {
                font-family: "Open sans", "Segoe UI", "Segoe WP", Helvetica, Arial, sans-serif;
                color: #7F8C9A;
                background: #FCFDFD;
            }

            h1,
            h2 {
                margin-bottom: 5px;
                font-weight: normal;
                text-align: center;
                color: #aaa;
            }

            h2 {
                margin: 5px 0 2em;
                color: #1ABC9C;
            }

            form {
                width: 225px;
                margin: 0 auto;
                text-align: center;
            }

            h2+P {
                text-align: center;
            }

            .txtcenter {
                margin-top: 4em;
                font-size: .9em;
                text-align: center;
                color: #aaa;
            }

            .copy {
                margin-top: 2em;
            }

            .copy a {
                text-decoration: none;
                color: #1ABC9C;
            }
        </style>
    </head>

    <h1>UPLOAD DOCUMENT</h1>
    

    <form action="t_uploadRecordPro.php" method="post" enctype="multipart/form-data">
        <div class="input-file-container">
            <input class="input-file" type="file" name="file">
            <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
        </div>
        <input type="hidden" name="sub_id" value="<?php echo $sub_id ?>">
        <br><br>
        <input type="text" name="topic" placeholder="Title" required/>
        <br><br>
        <textarea rows="7" cols="30" name='t_upload_des' placeholder="Description"></textarea><br><br>
        <input type="submit" value="UPLOAD">
        <p class="file-return"></p>
    </form>

    

    <script>
        document.querySelector("html").classList.add('js');

        var fileInput = document.querySelector(".input-file"),
            button = document.querySelector(".input-file-trigger"),
            the_return = document.querySelector(".file-return");

        button.addEventListener("keydown", function (event) {
            if (event.keyCode == 13 || event.keyCode == 32) {
                fileInput.focus();
            }
        });
        button.addEventListener("click", function (event) {
            fileInput.focus();
            return false;
        });
        fileInput.addEventListener("change", function (event) {
            the_return.innerHTML = this.value;
        });  
    </script>
    <?php
} else {
    header("Location: login.php");
}