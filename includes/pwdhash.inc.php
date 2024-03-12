<?php

$cardData = "23244253465664";
$salt = bin2hex(random_bytes(16));
$pepper = "TechDepoopeDhceT";

$dataToHash = $cardData . $salt . $pepper;
$hash = hash("sha256", $dataToHash);


/*Query kell*/
$cardData = "22435436546576";

$storedSalt = $salt;
$storedHash = $hash;
$pepper = "TechDepoopeDhceT";

$dataToHash = $cardData . $storedSalt . $pepper;
$verification = hash("sha256", $dataToHash);

if ($storedHash === $verification) {
    echo "Üdv ". $username . "!";
} else {
    echo "Hozzáférés megtagadva!";
}
