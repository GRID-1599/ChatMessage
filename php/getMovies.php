<?php

$xml = new DOMDocument("1.0");
$xml->load("../xml files/Q_Grp3_Act3_CMMPS.xml");
$movies = $xml->getElementsByTagName("movie");

//sort($movies, SORT_STRING);
$htmlText = "<div id='table' class='container'> <table id='tblMovies'><tr><th>Movie Code</th><th>Title</th><th>Director</th><th>Genre/s</th><th>Date of Release</th></tr>";
$rowNum = 1;
foreach ($movies as $movie) {

    $movieCode = $movie->getAttribute("movieCode");
    $movieTitle = $movie->getElementsByTagName("title")->item(0)->nodeValue;
    $movieDirector = $movie->getElementsByTagName("director")->item(0)->nodeValue;
    $movieDateOfRelease = $movie->getElementsByTagName("dateOfRelease")->item(0)->nodeValue;
    $movieDetails = [$movieCode, $movieTitle, $movieDirector, $movieDateOfRelease];
    // echo "$movieDetails[0]";
    //for genres
    $movieGenres = $movie->getElementsByTagName("genre");
    $str = "";
    for ($i = 0; $i < count($movieGenres); $i++) {
        $genre = $movie->getElementsByTagName("genre")->item($i)->nodeValue;
        $str = $str . $genre . ", ";
        array_push($movieDetails, $genre);
    }
    $newMovieGenres = substr($str, 0, -2);
    $className = ($rowNum % 2) ? "OddRow" : "EvenRow";
    $rowNum++;
    $htmlText .= <<<_TR
                <tr class='$className'
                onmouseover="showModal('$movieCode' , true)" 
                onmouseout="showModal('$movieCode' , false)">
                <td>$movieCode</td>
                <td>$movieTitle </td>
                <td>$movieDirector</td>
                <td>$newMovieGenres</td>
                <td>$movieDateOfRelease</td>
                </tr>
        _TR;
}
$table = $htmlText . "</table> </div>";
echo "$table";
