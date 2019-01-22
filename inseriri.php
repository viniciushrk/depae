<html> 
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>     
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
</head>
	<body>
		<div class="container">
			<br/>
			<h3 align="center">Upload de arquivo xls</h3>
			<h3 align="center">Insira tabelas de Alunos</h3>
			<br/>
			

			<form action="upload.php" class="dropzone" id="dropzoneFrom">
			</form>

			<br/>
			<br/>
			<div align="center">
				<button type=" button" class="btn btn-info" id="submit-all"> Upload</button>
			</div>

			<br/>
			<br/>
			<div id="preview"></div>
			<br/>
			<br/>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	Dropzone.options.dropzoneFrom = {
		autoProcessQueue: false,
		acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
		init: function(){
			var submitButton = document.querySelector('#submit-all');
			myDropzone = this;
			submitButton.addEventListener("click",function(){
				myDropzone.processQueue();
				myDropzone.removeFile();
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