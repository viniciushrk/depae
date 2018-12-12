<head>
    <link rel="stylesheet" href="dropzone.css">
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

<center>
<form  action="test.php"  method="post" type="file" enctype="multipart/form-data">
    <label class="btn btn-block btn-pri"
    <input name="fileUpload[]" type="file" multiple id="dropz"/>
    <input class="btn btn-outline-success mb-3" id="submit-all" type="submit" value="Enviar arquivo"/>
    <!--renomeie o nome do arquivo <input name="nome" type="text" multiple="multiple">-->
    <!--<input type="hidden" name="maximum-size" value="30000"/>-->
    </form>
</center>
</body>
<script src="dropzone.js"></script>

<script src="assets/js/jquery.min.js"></script>
<script>

    var Dropzone=new Dropzone("div#meuId",{url:"test.php"});
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