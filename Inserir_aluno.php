<head>
<!--    <link rel="stylesheet" href="dropzone.css">-->
        <link rel="stylesheet" href="drop.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
<!-- <form method="post" action="pag2.php" accept-charset="UTF-8"> -->
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<!--<form  action="test.php"  method="post" type="file" enctype="multipart/form-data">-->

    <input class="upload-drop-zone" id="drop-zone" width="200px" name="fileUpload[]" " type="file" multiple/>
    <input class="btn btn-outline-success mb-3" id="submit-all" type="submit" value="Enviar arquivo"/>
    <!--renomeie o nome do arquivo <input name="nome" type="text" multiple="multiple">-->
    <!--<input type="hidden" name="maximum-size" value="30000"/>-->
<!--</form>-->

<div class="upload-drop-zone" id="drop-zone">
    just drag
</div>
</body>

<script src="dropzone.js"></script>

<script src="assets/js/jquery.min.js"></script>
<script>
    + function($) {
        'use strict';

        // UPLOAD CLASS DEFINITION
        // ======================

        var dropZone = document.getElementById('drop-zone');
        var uploadForm = document.getElementById('js-upload-form');

        var startUpload = function(files) {
            console.log(files)
        }

        uploadForm.addEventListener('submit', function(e) {
            var uploadFiles = document.getElementById('js-upload-files').files;
            e.preventDefault()

            startUpload(uploadFiles)
        })

        dropZone.ondrop = function(e) {
            e.preventDefault();
            this.className = 'upload-drop-zone';

            startUpload(e.dataTransfer.files)
        }

        dropZone.ondragover = function() {
            this.className = 'upload-drop-zone drop';
            return false;
        }

        dropZone.ondragleave = function() {
            this.className = 'upload-drop-zone';
            return false;
        }

    }(jQuery);
   // var Dropzone=new Dropzone("div#meuId",{url:"test.php"});
    // $("div#meuId").dropzone({url: "test.php"});
    // Dropzone.options.dropz ={
    //     paramName: 'fileUpload[]',
    //     maxFilesize: 1000000,
    //     dictDefaultMessage: "Arraste seus arquivos para cá!",
    //     uploadMultiple: true,
    //     autoProcessQueue: false,
    //     acceptedFiles: "image/*,.xlsx,.xls,.pdf,.doc,.docx",
    //     maxFiles:100,
    //     init: function() {
    //         var submitButton = document.querySelector("#submit-all")
    //         var dropz = this; // closure
    //
    //         submitButton.addEventListener("click", function() {
    //             dropz.processQueue(); // Tell Dropzone to process all queued files.
    //         });
    //
    //         // You might want to show the submit button only when
    //         // files are dropped here:
    //         this.on("addedfile", function() {
    //             // Show submit button here and/or inform user to click it.
    //         });
    //
    //     }
    // };

</script>