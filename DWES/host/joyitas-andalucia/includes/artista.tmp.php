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
                <li class="nav-item"><a href="./artista.php" class="nav-link active" aria-current="page">Artistas</a></li>
            </ul>
        </header>
        </header>

        <hr>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Conciertos Illo</h1>
                <p class="col-md-8 fs-4">🎶 ¡Bienvenidos a la fiesta del directo en Andalucía! 🎸
                    ¡Elige la banda sonora de tus momentos únicos!
                    Desde flamenco apasionado hasta el rock más electrizante, vive la música que te mueve.
                    ✨ 🎤 ¡Haz sonar tu canción favorita ahora! 🎧</p>
                <a href="./conciertos.php" class="btn btn-primary btn-lg" type="button">Ver conciertos</a>
                <a href="./index.php" class="btn btn-primary btn-lg" type="button">Volver</a>
                <hr>
            </div>
        </div>

        <form action="" method="post">
            <table border="1" class="table table-stripped">
                <tr>
                    <td>Nombre</td>
                    <td>Coste</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>

                <?= $outPut; ?>
            </table>
        </form>


        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
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