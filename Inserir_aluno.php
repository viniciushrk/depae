
<head>
    <link rel="stylesheet" href="dropzone.css">
    <link href="main.css" rel="stylesheet">
    <link href="css" rel="stylesheet">
    <link href="drop.css" rel="stylesheet">

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
<?php if(isset($_SESSION['cargo']) && $_SESSION['cargo'] < 3){?>
    <form  action="teste.php" method="post" name="file" class="dropzone" enctype="multipart/form-data">

    <!--   <div class="form-inline" style="border: 1px solid red; margin: 1px 20px 80px 99px; padding: 50px" >-->
    <div class="form-group ">
    <!--<input draggable="true"  style="overflow: auto; " class=" upload-drop-zone form-control-file text-success font-weight-bold dropzone" title="coloque aqui" name="fileUpload[]" type="file" multiple id="dropz"/>-->

    </div>

    <!--renomeie o nome do arquivo <input name="nome" type="text" multiple="multiple">-->
    <input type="hidden" name="maximum-size" value="30000"/>
    <!--</div>-->

<!--    <input class="btn btn-outline-success mb-3" style="padding: 10px;" id="submit-all" type="submit" value="Enviar arquivo" />-->
</form>
    <button class="btn btn-outline-success mb-3 left" style="padding: 10px" id="submit-all">adicionar</button>
</center>
</body>
<script src="dropzone.js"></script>
<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize: 5,
        acceptedFiles: ".xls .xlsx"
        url: 'teste.php',
        autoProcessQueue: false,

        init: function () {
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this; // closure

            submitButton.addEventListener("click", function () {
                myDropzone.processQueue(); // Tell Dropzone to process all queued files.
            });

            // You might want to show the submit button only when
            // files are dropped here:
            this.on("addedfile", function () {
                // Show submit button here and/or inform user to click it.
            });


            $("#submit-all").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            this.on('sending', function (file, xhr, formData) {
                // Append all form inputs to the formData Dropzone will POST
                var data = $('#frmTarget').serializeArray();
                $.each(data, function (key, el) {
                    formData.append(el.name, el.value);
                });
            });

        }
    }

</script>

<script src="assets/js/jquery.min.js"></script>
<script>

    /*var Dropzone=new Dropzone("div#meuId",{url:"test.php"});*/
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
<?php
}else{
    header("location: index.php");
}
?>