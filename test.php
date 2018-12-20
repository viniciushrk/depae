<html>
<head>
    <meta charset="UTF-8">

</head>
<body>

    <?php

   date_default_timezone_set("Brazil/East");
    $uploaddir = 'bd/';

   // $uploadfile = $uploaddir.basename($_FILES['fileUpload']['name']);
    $uploadfile = $_FILES['fileUpload']['name'];
    $up = $_FILES['fileUpload']['tmp_name'];
    echo"<pre>";
    for($i = 0; $i < count($uploadfile);$i++) {
        $ext = strtolower(substr($uploadfile[$i], -4));
        $este = strtolower(pathinfo($uploadfile[$i], PATHINFO_EXTENSION));
        $new_name = date("Y.m.d-H.i.s") . $i . $ext;
        if ($este == 'xls' || $este == 'xlsx') {
            //$uploadfile[$i]= $_FILES['fileUpload']['tmp_name'];
            if (move_uploaded_file($up[$i], $uploaddir . $new_name)) {
                echo "<br/>";
                echo "aquivo_valido";
                echo "<br/>";

            }
        } else {
            print("errado extensão");
        }
    }
             print_r($_FILES);
    print"</pre>";
   ?>
</body>
</html>