<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "dependencias.php"; ?>
</head>

<body>
    <button onclick="alerta()"> Boton</button>
</body>

</html>

<script type="text/javascript">
    function alerta() {
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    }
</script>