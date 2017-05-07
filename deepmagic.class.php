<?php
####
#### Our goal with this class is to ensure that we have complete
#### control over values set irrelevant of depth or how they are set
####
#### $myArray["foo"]["bar"] = "car";
####
#### Currently this example does not call offsetSet but it does set the variable
#### essentially bypassing any functionality we might want to execute.
####
#### For a basic example say we want to increment a counter for everytime
#### a value is set in our array.

#### myArray["foo"] = "bar"; 		// counter = 1
#### myArray["foo"]["bar"] = "car"; // counter = 2
#### myArray[] = "foobar"; 			// counter = 3

#### By the end of this, counter should be 3. With ArryAccess this is generally not the case.
#### We are here to learn why.


//* Nice method for testing and learning what triggers ArrayAccess
class DeepMagic implements ArrayAccess {

	private $data;
	private $counter=0;

	public function offsetExists ($offset)
	{
		pr(__METHOD__, $offset);
	}

	public function &offsetGet ($offset)
	{
		pr(__METHOD__, $offset);
		return $this->data[$offset];
	}

	public function offsetSet ($offset, $value)
	{
		$this->counter++;

		pr(__METHOD__, $offset, $value);

        if (is_array($data)) $data = new self($data);
        
        if ($offset === null) { // don't forget this!
            $this->data[] = $data;
        } else {
            $this->data[$offset] = $data;
        }
	}

	public function offsetUnset ($offset)
	{
		pr(__METHOD__, $offset);
	}

}
//*/

/* This is from SO answer by Dakota
// http://stackoverflow.com/a/13480254/4883909
class DeepMagic implements ArrayAccess {

    private $data = array();

    // necessary for deep copies
    public function __clone() {
        foreach ($this->data as $key => $value) if ($value instanceof self) $this[$key] = clone $value;
    }

    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) $this[$key] = $value;
    }

    public function offsetSet($offset, $data) {
        if (is_array($data)) $data = new self($data);
        if ($offset === null) { // don't forget this!
            $this->data[] = $data;
        } else {
            $this->data[$offset] = $data;
        }
    }

    public function toArray() {
        $data = $this->data;
        foreach ($data as $key => $value) if ($value instanceof self) $data[$key] = $value->toArray();
        return $data;
    }

    // as normal
    public function offsetGet($offset) { return $this->data[$offset]; }
    public function offsetExists($offset) { return isset($this->data[$offset]); }
    public function offsetUnset($offset) { unset($this->data); }

}
*/


// print helper
function pr ($args) {
	
	$arr = func_get_args();
	print "<pre>";
	print_r($arr);
	print "</pre>";

}