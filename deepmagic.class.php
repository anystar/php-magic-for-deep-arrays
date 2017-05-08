<?php

class DeepMagic implements ArrayAccess {

	private $parent;
	private $data;
	private $counter;

	protected function test () {
		$this->counter++;
	}

	// When setting elements beyound the first depth offsetGet gets called
	// to get a reference of the first element in the depth. $myArray[first][second][...]
	// If 'first' element does not exists we need to create it or else offsetSet does not
	// get called.
	public function &offsetGet ($offset)
	{	

		// Example:
		// $myArray["foo"]["bar"]
		//			  ^
		//			  |----- When this element is not an array call offsetSet with empty array.
		if (!isset($this->data[$offset]))
			$this->offsetSet($offset, new self);


		return $this->data[$offset];
	}

	public function offsetSet ($offset, $value)
	{
        if ($offset === null) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }

        $this::test();
	}

	public function offsetUnset ($offset)
	{
		pr(__METHOD__, $offset);
	}

	public function offsetExists ($offset)
	{
		return $this->data[$offset];
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