<?php

$movieCode = $_POST["movieCode"];
$xml = new DOMDocument("1.0");
$xml->load("../xml files/Q_Grp3_Act3_CMMPS.xml");
$movies = $xml->getElementsByTagName("movie");

foreach ($movies as $movie) {
    $theMovieCode = $movie->getAttribute("movieCode");
    if ($theMovieCode == $movieCode) {
        $movieCode = $movie->getAttribute("movieCode");
        $movieTitle = $movie->getElementsByTagName("title")->item(0)->nodeValue;
        $movieDirector = $movie->getElementsByTagName("director")->item(0)->nodeValue;
        $movieDateOfRelease = $movie->getElementsByTagName("dateOfRelease")->item(0)->nodeValue;
        $movieImagePath = $movie->getElementsByTagName("imagePath")->item(0)->nodeValue;
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

        echo <<<_MOVIE
            <div id = "header">
                <strong id = "info">MOVIE INFORMATION</strong> 
            </div>
            <div id = "content">
                <div id = "leftPart">
                    <img src=$movieImagePath alt="Movie Poster">
                    <strong id="title">$movieTitle</strong> 
                </div>
                <div id = "moreInfo">
                        <table>
                        <tr>
                            <td>
                            <strong>MOVIE CODE:</strong>
                            <label>$theMovieCode</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <strong>DIRECTOR:</strong>
                            <label>$movieDirector</label>
                            </td>

                        </tr>
                        </tr>
                        <tr>
                            <td>
                            <strong>GENRE:</strong>
                            <label>$newMovieGenres</label>
                            </td>

                        </tr>
                        <tr>
                            <td>
                            <strong>DATE OF RELEASE:</strong>
                            <label>$movieDateOfRelease</label>
                            </td>
                        </table>
                    </ul>
                </div>
            </div>
            _MOVIE;

        break;
    }
}
