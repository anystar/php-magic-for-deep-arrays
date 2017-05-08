<?php

include "deepmagic.class.php";

$myArray = new DeepMagic;

$myArray["foo"]["bar"]["car"][] = "sah";
$myArray["foo"]["bar"]["car"][] = "lah";
$myArray["foo"]["bar"]["car"][] = "lah";

pr ($myArray);



// This is an excellent little problem we have here.
//
// Right now this code outputs an array of DeepMagic
// classes. But the real kicker is that the $counter
// is only ever local to the current class.

// Problem: How might one make the counter count at the root level.
// Static? Passing a reference to the root around somehow? hrmm??