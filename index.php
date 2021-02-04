<?php
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

echo "Ce dictionnaire contient ".$nb = count( $dico )." mots. <br>" ;

$cara15 = 0;
foreach ($dico as $word) {
    if (strlen($word) === 15) {
        $cara15++;
    }
}
echo "Il y a ".$cara15." mots qui font exactement 15 caractères <br>";

$withW = 0;
foreach ($dico as $word) {
    if (stripos($word, "w")) {
        $withW++;
    }
}
echo "Il y a ".$withW." mots qui contiennent la lettre W <br>";


$endQ = 0;
foreach ($dico as $word) {
    if ($word[-2] === 'q') {
        $endQ++;
    }
}

echo "Il y a ".$endQ." mots qui finissent par la lettre Q <br>";


