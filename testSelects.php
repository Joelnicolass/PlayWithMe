<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<form action="testSelects.php" method="post" id="formSelect">

<select name="select" id="select" onchange="submit()">
    <option >-</option>
    <option >Golosinas</option>
    <option >Lacteos</option>
    <option >Panificados</option>
</select>

</form>

<?php

if(isset($_POST)) {

    include_once('core/connect.php');

    $option = $_POST['select'];

    $qy = mysqli_query($datosdb, "SELECT $option FROM productos");

    $result = mysqli_fetch_assoc($qy);

    var_dump($result);

}


?>
    

<script>

const f = document.getElementById('formSelect');

const submit = () => {
    f.submit();
}


</script>


</body>

</html>


