<?php
$first_cd = new CD("Master of Reality", "Black Sabbath", "images/reality.jpg", 10.99);
$second_cd = new CD("Electric Ladyland", "Jimi Hendrix", "images/ladyland.jpg", 10.99);
$third_cd = new CD("Nevermind", "Nirvana", "images/nevermind.jpeg", 10.99);
$fourth_cd = new CD("I don't get it", "Pork Lion", "images/porklion.jpg", 49.99);
$cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);
 
foreach($cds as $cd) {
    $cd->save();
}

?>
