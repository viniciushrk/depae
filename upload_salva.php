<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php


$uploadDir = 'bd/';


if (!empty($_FILES)) {
    $tmpFile = $_FILES['file']['tmp_name'];
    $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
    $este = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
if ($este == 'xls') {
    move_uploaded_file($tmpFile,$filename);

}

}
print_r($_FILES);

function enviar(){
    $tmpFile = $_FILES['file']['tmp_name'];
}

?>
</body>
</html>