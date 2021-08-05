<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1></h1>

<form action="testSelects.php" method="get" id="formSelect">

<select name="select" id="select">
    <option value="0">-</option>
    <option value="1">Golosinas</option>
    <option value="2">Lacteos</option>
    <option value="3">Panificados</option>
</select>

<select id="select2">
    <option value=""></option>
</select>

</form> 




<script>

const select = document.getElementById('select');
const select2 = document.getElementById('select2');

select.addEventListener('change', event => {
    fetch('optionSelected.php?id='+event.target.value)
    .then(res => {
        if (!res.ok) {
            throw new Error('Error');
        }
        return res.json();
    })
        .then (datos => {
            let option = '<option value="">-</option>';

            if (datos.data.length > 0) {
                for (let i = 0; i < datos.data.length; i++) {

                option += `<option value="${datos.data[i].id}">${datos.data[i].prod}</option>`;
                select2.innerHTML = option;
                //console.log(datos.data);
                }

            }
        })
    })

</script>


</body>

</html>


