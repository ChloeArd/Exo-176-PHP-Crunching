<?php

echo "DICTIONNAIRE : <br><br>";

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

// Mots contenue dans le dictionnaire :
echo "Ce dictionnaire contient ".$nb = count( $dico )." mots. <br>" ;

// Mots faisant 15 caractères :
$cara15 = 0;
foreach ($dico as $word) {
    if (strlen($word) === 15) {
        $cara15++;
    }
}
echo "Il y a ".$cara15." mots qui font exactement 15 caractères <br>";

// Mots contennant la lettre "W" :
$withW = 0;
foreach ($dico as $word) {
    if (stripos($word, "w")) {
        $withW++;
    }
}
echo "Il y a ".$withW." mots qui contiennent la lettre W <br>";

// Mots finissant par la lettre "Q" :
$endQ = 0;
foreach ($dico as $word) {
    if ($word[-2] === 'q') {
        $endQ++;
    }
}
echo "Il y a ".$endQ." mots qui finissent par la lettre Q <br>";

echo "<br><br><br><br>";


echo "LISTE DES FILMS : <br><br>";

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films

// Le top 10 des films :
for ($i = 0; $i < 10; $i++) {
    $nbTop = $i+1;
    echo $nbTop." ".$top[$i]["im:name"]["label"]."<br>";
}

echo "<br>";

// Le classement du film "Gravity" :
$num = count($brut);

for ($i = 0; $i < 100; $i++) {
    $nbTop = $i+1;
    if ($top[$i]["im:name"]["label"] === "Gravity") {
        echo "Le film Gravity se trouve au Top ".$nbTop."<br>";
        break;
    }
}

echo "<br>";

// Le réalisateur du film "The LEGO Movie" :
for ($i = 0; $i < 100; $i++) {
    if ($top[$i]["im:name"]["label"] === "The LEGO Movie") {
        echo "Les réalisateurs du film : ".$top[$i]["im:artist"]["label"]."<br>";
        break;
    }
}

echo "<br>";

// Nombres de films sortis avant 2000 :
//si premier chiffre commence par 1 on compte sinon on compte pas.
$filmsSortiAvant2000 = 0;
for ($i = 0; $i < 100; $i++) {
    $date = $top[$i]["im:releaseDate"]["label"];
    $position = strpos($date, "1");
    if ($position === 0) {
        $filmsSortiAvant2000++;
    }
}
echo "Il y a ".$filmsSortiAvant2000." films qui sont sortis avant 2000 <br>";

echo "<br>";

// Le film le plus récent : ??????????????????????????
//Pan
//2016-01-25T00:00:00-07:00
$today = date("y-m-d");
$filmsRecent = 0;
for ($i = 0; $i < 100; $i++) {
    $date = $top[$i]["im:releaseDate"]["label"];
    $position = strpos($date, "2016");
    if ($position === 0) {
        echo $top[$i]["im:name"]["label"]."<br>";
        echo $date."<br>";
        $filmsRecent++;
    }
}


// Le film le plus vieux : ??????????????????????????????????
// It's a Wonderful Life
// 1947-01-07T00:00:00-07:00

echo "<br><br>";

// La catégorie de films la plus représentée :
$sci_fi_Fantasy = 0;
$action_Adventure = 0;
$thriller = 0;
$comedy = 0;
$kids_Family = 0;
$drama = 0;
$musicDoc = 0;
$romance = 0;
$doc = 0;
$western = 0;
$horror = 0;

for ($i = 0; $i < 100; $i++) {
    $categoryFilm = $top[$i]["category"]["attributes"]["term"];
    switch ($categoryFilm) {
        case "Sci-Fi & Fantasy" :
            $sci_fi_Fantasy++;
            break;
        case "Action & Adventure" :
            $action_Adventure++;
            break;
        case "Thriller" :
            $thriller++;
            break;
        case "Comedy" :
            $comedy++;
            break;
        case "Kids & Family" :
            $kids_Family++;
            break;
        case "Drama" :
            $drama++;
            break;
        case "Music Documentaries" :
            $musicDoc++;
            break;
        case "Romance" :
            $romance++;
            break;
        case "Documentary" :
            $doc++;
            break;
        case "Western" :
            $western++;
            break;
        case "Horror" :
            $horror++;
            break;
    }
}

if ($sci_fi_Fantasy > $action_Adventure && $sci_fi_Fantasy > $thriller && $sci_fi_Fantasy > $comedy && $sci_fi_Fantasy > $kids_Family && $sci_fi_Fantasy > $drama && $sci_fi_Fantasy > $musicDoc && $sci_fi_Fantasy > $romance && $sci_fi_Fantasy > $doc && $sci_fi_Fantasy > $western && $sci_fi_Fantasy > $horror) {
    echo "La catégorie de films la plus représentée est Sci-Fi & Fantasy <br>";
}
elseif ($action_Adventure > $sci_fi_Fantasy && $action_Adventure > $thriller && $action_Adventure > $comedy && $action_Adventure > $kids_Family && $action_Adventure > $drama && $action_Adventure > $musicDoc && $action_Adventure > $romance && $action_Adventure > $doc && $action_Adventure > $western && $action_Adventure > $horror) {
    echo "La catégorie de films la plus représentée est Action & Adventure <br>";
}
elseif ($thriller > $sci_fi_Fantasy && $thriller > $action_Adventure && $thriller > $comedy && $thriller > $kids_Family && $thriller > $drama && $thriller > $musicDoc && $thriller > $romance && $thriller > $doc && $thriller > $western && $thriller > $horror) {
    echo "La catégorie de films la plus représentée est Thriller <br>";
}
elseif ($comedy > $sci_fi_Fantasy && $comedy > $action_Adventure && $comedy > $thriller && $comedy > $kids_Family && $comedy > $drama && $comedy > $musicDoc && $comedy > $romance && $comedy > $doc && $comedy > $western && $comedy > $horror) {
    echo "La catégorie de films la plus représentée est Comedy <br>";
}
elseif ($kids_Family > $sci_fi_Fantasy && $kids_Family > $action_Adventure && $kids_Family > $thriller && $kids_Family > $comedy && $kids_Family > $drama && $kids_Family > $musicDoc && $kids_Family > $romance && $kids_Family > $doc && $kids_Family > $western && $kids_Family > $horror) {
    echo "La catégorie de films la plus représentée est Kids & Family <br>";
}
elseif ($drama > $sci_fi_Fantasy && $drama > $action_Adventure && $drama > $thriller && $drama > $comedy && $drama > $kids_Family && $drama > $musicDoc && $drama > $romance && $drama > $doc && $drama > $western && $drama > $horror) {
    echo "La catégorie de films la plus représentée est Drama <br>";
}
elseif ($musicDoc > $sci_fi_Fantasy && $musicDoc > $action_Adventure && $musicDoc > $thriller && $musicDoc > $comedy && $musicDoc > $kids_Family && $musicDoc > $drama && $musicDoc > $romance && $musicDoc > $doc && $musicDoc > $western && $musicDoc > $horror) {
    echo "La catégorie de films la plus représentée est Music Documentaries <br>";
}
elseif ($romance > $sci_fi_Fantasy && $romance > $action_Adventure && $romance > $thriller && $romance > $comedy && $romance > $kids_Family && $romance > $drama && $romance > $musicDoc && $romance > $doc && $romance > $western && $romance > $horror) {
    echo "La catégorie de films la plus représentée est Romance <br>";
}
elseif ($doc > $sci_fi_Fantasy && $doc > $action_Adventure && $doc > $thriller && $doc > $comedy && $doc > $kids_Family && $doc > $drama && $doc > $musicDoc && $romance < $doc && $western > $doc && $doc > $horror) {
    echo "La catégorie de films la plus représentée est Documentary <br>";
}
elseif ($western > $sci_fi_Fantasy && $western > $action_Adventure && $western > $thriller && $western > $comedy && $western > $kids_Family && $western > $drama && $western > $musicDoc && $western > $romance && $western > $doc && $western > $horror) {
    echo "La catégorie de films la plus représentée est Western <br>";
}
else {
    echo "La catégorie de films la plus représentée est Horror <br>";
}

// Le réalisateur le plus présent dans le top 100 : ????????????????????????????????????????????????????



echo "<br>";
// Le prix qui reviendrait si on achète le top 10 sur itunes :
for ($i = 0; $i < 10; $i++) {
    $price = $top[$i]["im:price"]["attributes"]["amount"];
    $price += $price;
}
echo "Le prix si on achète le top 10 sur itunes serait de $price $";

echo "<br>";
// Le prix qui reviendrait si on loue le top 10 sur itunes :
for ($i = 0; $i < 10; $i++) {
    $rentalPrice = $top[$i]["im:rentalPrice"]["attributes"]["amount"];
    $rentalPrice += $rentalPrice;
}
echo "Le prix si on loue le top 10 sur itunes serait de $rentalPrice $ (tous n'est pas à louer)";

echo "<br><br>";


// Le mois ayant vue le plus de sorties au cinéma :
$january = 0;
$february = 0;
$march = 0;
$april = 0;
$may = 0;
$june = 0;
$july = 0;
$august = 0;
$september = 0;
$october = 0;
$november = 0;
$december = 0;

for ($i = 0; $i < 100; $i++) {
    $monthPlus = $top[$i]["im:releaseDate"]["attributes"]["label"];
    if (strpos($monthPlus, "January") === 0) {
        $january++;
    }
    elseif (strpos($monthPlus, "February") === 0) {
        $february++;
    }
    elseif (strpos($monthPlus, "March") === 0) {
        $march++;
    }
    elseif (strpos($monthPlus, "April") === 0) {
        $april++;
    }
    elseif (strpos($monthPlus, "May") === 0) {
        $may++;
    }
    elseif (strpos($monthPlus, "June") === 0) {
        $june++;
    }
    elseif (strpos($monthPlus, "July") === 0) {
        $july++;
    }
    elseif (strpos($monthPlus, "August") === 0) {
        $august++;
    }
    elseif (strpos($monthPlus, "September") === 0) {
        $september++;
    }
    elseif (strpos($monthPlus, "October") === 0) {
        $october++;
    }
    elseif (strpos($monthPlus, "November") === 0) {
        $november++;
    }
    elseif (strpos($monthPlus, "December") === 0) {
        $december++;
    }
}

if ($january >= $february && $january >= $march && $january >= $april && $january >= $may && $january >= $june && $january >= $july && $january >= $august && $january >= $september && $january >= $october && $january >= $november && $january >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Janvier<br>";
}
if ($february >= $january && $february >= $march && $february >= $april && $february >= $may && $february >= $june && $february >= $july && $february >= $august && $february >= $september && $february >= $october && $february >= $november && $february >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Février<br>";
}
if ($march >= $january && $march >= $february && $march >= $april && $march >= $may && $march >= $june && $march >= $july && $march >= $august && $march >= $september && $march >= $october && $march >= $november && $march >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Mars<br>";
}
if ($april >= $january && $april >= $february && $april >= $march && $april >= $may && $april >= $june && $april >= $july && $april >= $august && $april >= $september && $april >= $october && $april >= $november && $april >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Avril<br>";
}
if ($may >= $january && $may >= $february && $may >= $march && $may >= $april && $may >= $june && $may >= $july && $may >= $august && $may >= $september && $may >= $october && $may >= $november && $may >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Mai<br>";
}
if ($june >= $january && $june >= $february && $june >= $march && $june >= $april && $june >= $may && $june >= $july && $june >= $august && $june >= $september && $june >= $october && $june >= $november && $june >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Juin<br>";
}
if ($july >= $january && $july >= $february && $july >= $march && $july >= $april && $july >= $may && $july >= $june && $july >= $august && $july >= $september && $july >= $october && $july >= $november && $july >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Juillet<br>";
}
if ($august >= $january && $august >= $february && $august >= $march && $august >= $april && $august >= $may && $august >= $june && $august >= $july && $august >= $september && $august >= $october && $august >= $november && $august >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Août<br>";
}
if ($september >= $january && $september >= $february && $september >= $march && $september >= $april && $september >= $may && $september >= $june && $september >= $july && $september >= $august && $september >= $october && $september >= $november && $september >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Septembre<br>";
}
if ($october >= $january && $october >= $february && $october >= $march && $october >= $april && $october >= $may && $october >= $june && $october >= $july && $october >= $august && $october >= $september && $october >= $november && $october >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Octobre<br>";
}
if ($november >= $january && $november >= $february && $november >= $march && $november >= $april && $november >= $may && $november >= $june && $november >= $july && $november >= $august && $november >= $september && $november >= $october && $november >= $december) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Novembre<br>";
}
if ($december >= $january && $december >= $february && $december >= $march && $december >= $april && $december >= $may && $december >= $june && $december >= $july && $december >= $august && $december >= $september && $december >= $october && $december >= $november) {
    echo "Le mois ayant vue le plus de sorties au cinéma est Décembre<br>";
}

echo "<br>";


// Les 10 meilleurs films à voir en ayant un budget limité :

