<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://unpkg.com/sakura.css/css/sakura.css" type="text/css">
</head>

<body>
    <h2 style="color: #1d7484;">Productos de Gimnasio</h2>

    <form action="" method="post">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $body_out_put; ?>
            </tbody>
        </table>

        <button type="submit">Agregar al Carrito</button>
    </form>

    <a href="carrito.php">Ver Carrito</a>

    <script>
        function sumar(id){
            let cantidad = document.getElementById(id);
            cantidad.value = parseInt(cantidad.value)+1;
        }

        function restar(id){
            let cantidad = document.getElementById(id);
            if(parseInt(cantidad.value)>0){
                cantidad.value = parseInt(cantidad.value)-1;
            }else{
                alert("No puedes tener productos negativos");
            }
        }
    </script>
</body>

</html>