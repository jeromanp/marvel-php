/* The code you provided is making a cURL request to the API endpoint
"https://whenisthenextmcufilm.com/api" to fetch data about the next Marvel Cinematic Universe film.
Here's a breakdown of what the code is doing: */
<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de CURL. CH Curl Handle
$ch = curl_init(API_URL);
//Indicar  que queremos recibir el resultado de la peticion y no mostrar el resultado en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ejecutar la peticion y guardar el resultado
$result = curl_exec($ch);
$data =  json_decode($result, true);
//Cerrar la conexion a la API
curl_close($ch);
//Ver $data
var_dump($data);
?>

<head>
    <meta charset="UTF-8" />
    <title>La próxima película de Marvel</title>
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<main>
    <pre style="font-size:8px; overflow:scroll; height:250px;">
        <?php var_dump($data) ?>
    </pre>

    <section>
        <h2>La próxima película de Marvel</h2>

        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>" style="border-radius:16px ;" />
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días </h3>
        <p>Fecha de estreno $data["release_data"];?> </p>
        <p>La siguiente película será: $data["following_production"]["title"]; </p>
        <p>
            <a href="https://www.imdb.com/title/<?= $data["imdb_id"]; ?>" target="_blank">Ver en IMDB</a> |
            <a href="https://www.themoviedb.org/movie/<?= $data["tmdb_id"]; ?>" target="_blank">Ver en TMDB</a> |
            <a href="https://www.marvel.com/movies/release-dates" target="_blank">Ver todas las estrenos</a>
            <br>
            <small>Información obtenida de <a href="https://whenisthenextmcufilm.com/" target="_blank">When Is The Next MCU Film</a></small>
        </p>
        </p>
    </hgroup>
</main>



<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>