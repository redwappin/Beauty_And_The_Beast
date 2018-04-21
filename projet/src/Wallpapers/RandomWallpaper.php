<?php

 function RandomWallpaper(){
     $json=file_get_contents(__DIR__.'/../../data/background.json');
     $background=json_decode($json, true);
     $rand_keys = array_rand($background["background"], 1);

     return $background["background"][$rand_keys];
 }

 ?>
