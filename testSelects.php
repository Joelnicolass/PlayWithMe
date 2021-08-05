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

</select>

</form> 




<script>

const select = document.getElementById('select');
const select2 = document.getElementById('select2');

const fetchSelect = async () => {
            
    try {
    
        const res = await fetch('optionSelected.php?id='+event.target.value);
    
        const data = await res.json();
    

        let option = '<option value="">-</option>';

        if (data.data.length > 0) {
            for (let i = 0; i < data.data.length; i++) {

            option += `<option value="${data.data[i].id}">${data.data[i].prod}</option>`;

            select2.innerHTML = option;
            }

        }   
            let state = "ok";
            return state;
    
    } catch (error) {
    
                console.log('Fetch error: ', error);
    
            }
    
        }

select.addEventListener('change', event => {
        
    console.log(fetchSelect());

});




</script>


</body>

</html>


