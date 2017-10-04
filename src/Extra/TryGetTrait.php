<?php

namespace TS\Data\Attributes\Extra;


trait TryGetTrait {

	abstract public function has($key);

	abstract public function get($key);

	public function tryGet($key, & $value)
	{
		if (! $this->has($key)) {
			$value = null;
			return false;
		}
		$value = $this->get($key);
		return true;
	}

}

