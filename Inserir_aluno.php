
<head>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
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

<div class="container position-relative">
<?php if(isset($_SESSION['cargo']) && $_SESSION['cargo'] < 3){?>

     <form  action="upload.php" method="post" name="file" class="dropzone" style=" border: 2px dashed rgb(54, 183, 0);" id="dropzoneFrom" enctype="multipart/form-data" multiple>
         <input type="hidden" name="maximum-size" value="30000"/>
    </form>
    <br/>    
    <center><button class="btn btn-info" style="padding: 10px; " id="submit-all">adicionar</button></center>
</div>
</body>
<script>
    $(document).ready(function(){
        Dropzone.options.dropzoneFrom = {
            autoProcessQueue: false,
            acceptedFiles:".xls,.xlsx",
            maxFiles:4,
            addRemoveLinks:true,
            init: function(){
                var submitButton = document.querySelector('#submit-all');
                myDropzone = this;
                submitButton.addEventListener("click",function(){
                    myDropzone.processQueue();
                });
                this.on("complete",function() {
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this = this;
                        _this.removeAllFiles();
                    }
                    list_image();

                });
            },
        };

        list_image();

        function list_image(){
            $.ajax({
                url:"upload.php",
                sucess:function(data){
                    $('#preview').html(data);
                }
            });
        }

        $(document).on('click','.remove_image', function(){
            var name = $(this).attr('id');
            $.ajax({
                url:"upload.php",
                method:"POST",
                data:{name:name},
                sucess:function(data){
                    list_image();
                }
            })
        });
    });

</script>
<?php
}else{
    header("location: index.php");
}
?>