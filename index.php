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
$filmsSortiAvant2020 = 0;
for ($i = 0; $i < 100; $i++) {
    $date = $top[$i]["im:releaseDate"]["label"];
    $position = strpos($date, "1");
    if ($position === 0) {
        $filmsSortiAvant2020++;
    }
}
echo "Il y a ".$filmsSortiAvant2020." films qui sont sortis avant 2000";

echo "<br>";

// Le film le plus récent :

// Le film le plus vieux :

// La catégorie de films la plus représentée :

// Le réalisateur le plus présent dans le top 100 :

// Le prix qui reviendrait si on achète le top 10 sur itunes :

// Le pris qui reviendrait si on loue le top 10 sur itunes :

// Le mois ayant vue le plus de sorties au cinéma :

// Les 10 meilleurs films à voir en ayant un budget limité :

