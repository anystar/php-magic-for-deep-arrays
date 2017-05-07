<?php

include "deepmagic.class.php";

$myArray = new DeepMagic;

// Counter = 0;
//$myArray["foo"]["bar"] = "car";

// Counter = 1

//$myArray["foo"]["bar"] = "car";
//$myArray["foo"]["bar"]["car"]["dah"] = "sah";

//$myArray[0][0][0][0] = "sah";

// Counter = 3
// $myArray[] = 1;
// $myArray[] = 2;

// $myArray[] = 3;

// This does not call offsetExists
array_key_exists("foo", $myArray);

//pr($myArray);