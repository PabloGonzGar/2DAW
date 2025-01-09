<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Conciertos Illo</title>
</head>
<body>

    <div class="container">


        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="./conciertos.php" class="nav-link">Conciertos</a></li>
                <li class="nav-item"><a href="./artista.php" class="nav-link">Artistas</a></li>
            </ul>
        </header>
        </header>


        <form action="" method="post">
            <table border="1" class="table table-stripped">
                <tr>
                    <td>Nombre</td>
                    <td>Coste</td>
                </tr>

                <tr>
                    <?= $outPut; ?>
                </tr>
            </table>

            <div class="options" align="right">
                <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
                <a href="./artista.php" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Cancelar</a>            
            </div>

            <button class="btn btn-primary btn-lg" type="button" name="sendmail">Enviar correo</button>
        </form>


        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top" >
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Company, Inc</span>
            </div>
        </footer>

    </div>

</body>
</html>