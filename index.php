<?php

echo "DICTIONNAIRE : <br><br>";

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

//mots contenue dans le dictionnaire :
echo "Ce dictionnaire contient ".$nb = count( $dico )." mots. <br>" ;

//mots faisant 15 caractères :
$cara15 = 0;
foreach ($dico as $word) {
    if (strlen($word) === 15) {
        $cara15++;
    }
}
echo "Il y a ".$cara15." mots qui font exactement 15 caractères <br>";

//mots contennant la lettre "W" :
$withW = 0;
foreach ($dico as $word) {
    if (stripos($word, "w")) {
        $withW++;
    }
}
echo "Il y a ".$withW." mots qui contiennent la lettre W <br>";

//mots finissant par la lettre "Q" :
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

//Le top 10 des films :
for ($i = 0; $i < 10; $i++) {
    $nbTop = $i+1;
    echo $nbTop." ".$top[$i]["im:name"]["label"]."<br>";
}

echo "<br>";

//Le classement du film "Gravity" :
$num = count($brut);

for ($i = 0; $i < 400; $i++) {
    $nbTop = $i+1;
    if ($top[$i]["im:name"]["label"] === "Gravity") {
        echo "Le film Gravity se trouve au Top ".$nbTop."<br>";
        break;
    }
}

echo "<br>";