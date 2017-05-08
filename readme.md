Warning: This repository was only just created and developement will happen over the next few weeks.

## About
Use this class when you want Array Access to work with multi-dimensional arrays.

The goal is to give complete control over setting array elements irrespective of depth or method of setting element. 

$myArray["foo"]["bar"] = "car";
With a standard ArrayAccess class this example does not call offsetSet essentially
bypassing any functionality we might want to execute.

## Installation
Physically copy and paste deepmagic.class.php
or
clone if you want to expirement and test.

## Usage
Either extend deepmagic if you want to keep the class intact or rewrite it as you desire.

eg: $myArray = new DeepMagic;

## Issues
array_key_exists does not call offsetExists.

## Contributing
Raise issues or submit push requests.

## History
Started by Summer White out of frustration that Array Access does not handle 
multi-dimensional arrays by default. The stackoverflow answers although very
informative didn't give a solid solution. This repository was created to
provide a answer to this.

## License
No license. Copy and paste, do as you please.