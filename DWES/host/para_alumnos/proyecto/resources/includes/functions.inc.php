<?php

function getConnection($credenciales)
{
	$host = $credenciales['connection'] . ':host=' . $credenciales['host'] . ';dbname=' . $credenciales['database'];
	$mbd = new PDO($host, $credenciales['username'], $credenciales['password']);

	return $mbd;
}


function getMovies($credenciales)
{
	//TO DO: Está función debe conectar a la base de datos, y traer todos las películas

	$mbd = getConnection($credenciales);
	$query = 'SELECT * from movies';
	$stmt = $mbd->prepare($query);
	$stmt->execute();
	$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $movies;
}
function getMovie($credenciales, $id)
{
	//TO DO: Está función debe conectar a la base de datos, y traer los datos de la película con $id
	$mbd = getConnection($credenciales);
	$query = 'SELECT * from movies WHERE id=:id';
	$stmt = $mbd->prepare($query);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$movie = $stmt->fetch(PDO::FETCH_ASSOC);

	return $movie;
}



function getMoviesMarkup($movies)
{

	$output = '<div  class="slick-multiItemSlider">';

	foreach ($movies as $movie) {
		$output .= '<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="./resources/images/uploads/slider1.jpg" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<h6><a href="update.php?id=' . $movie['id'] . '">' . $movie['title'] . '</a></h6>
	    				<p><i class="ion-android-star"></i><span>' . $movie['rating'] . '</span> /10</p>
	    			</div>
	    		</div>';
	}

	$output .= '</div>';

	return $output;
}
function getMovieFormMarkup($movie)
{

	return '<form action="" method="POST">
                    <input type="text" class="title" value="' . $movie['title'] . '" name="name">
					    <div class="movie-rate">
						    <div class="rate">
							    <i class="ion-android-star"></i>
							    <p><span>8.1</span><br>
								
							    </p>
						    </div>
					    </div>
					    <div class="movie-tabs">
					    	<div class="tabs">
					    		<ul class="tab-links tabs-mv">
					    			<li class="active"><a href="#overview">Description</a></li>
							    </ul>
						        <div class="tab-content">
						            <div id="overview" class="tab active">
						                <div class="row">
						             	    <div class="col-md-8 col-sm-12 col-xs-12">
						            		    <textarea class="description" name="description">' . $movie['description'] . '</textarea>
                                                <p><button class="btn">Actualizar</button></p>
						            	</div>
						            </div>
						        </div>
						    </div>
						</div>
					</div>
                </form>';
}
function dump($vars)
{
	echo '<pre>' . print_r($vars, true) . '</pre>';
}


function getMovieUpdated($dbConfig, $movieId)
{
	if (
		isset($_POST['name']) && !empty($_POST['name'])
		&&
		isset($_POST['description']) && !empty($_POST['description'])
	) {

		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
		$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

		$mbd = getConnection($dbConfig);

		dump($mbd);

		$query = 'UPDATE movies
		 			SET  title= :name , description= :description
		 			WHERE id= :movieId';

		$stmt = $mbd->prepare($query);
		$stmt->bindParam(':movieId', $movieId);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		$stmt->execute();
		header("Location: " . $_SERVER['PHP_SELF'].'?id='.$movieId);
		header('Location: index.php');
	}
}
