<?php

namespace TS\Data\Attributes\Namespaced;


trait NamespacedTrait {

	abstract public function toArray();

	/**
	 * List all used namespaces.
	 *
	 * @return array
	 */
	public function namespaces()
	{
		$keys = array_keys($this->toArray());
		$a = array_map(function ($nskey) {
			return $this->getNamespaceFromKey($nskey);
		}, $keys);
		return array_unique($a);
	}

	/**
	 * Extract all attributes within the given namespace.
	 *
	 * @param string $namespace
	 * @param int $options
	 * @return self A new instance, containing only the attributes within the given namespace.
	 */
	public function extract($namespace, $options = NamespacedInterface::DROP_NAMESPACE)
	{
		$a = [];
		foreach ($this->filterNS($namespace, $options == NamespacedInterface::DROP_NAMESPACE) as $nsk => $v) {
			$i = strpos($nsk, $namespace);
			$k = substr($nsk, $i);
			$a[$k] = $v;
		}
		return new self($a);
	}

	protected function getNamespaceFromKey($key)
	{
		$i = strpos($key, NamespacedInterface::NS_SEPARATOR);
		return substr($key, 0, $i);
	}

	protected function filterNS($namespace, $dropNS = false)
	{
		$items = $this->toArray();
		
		if ($namespace === '') {
			
			foreach ($items as $k => $v) {
				if (strpos($k, NamespacedInterface::NS_SEPARATOR) === false) {
					yield $k => $v;
				}
			}
		
		} else if ($dropNS) {
			
			$prefix = $namespace . NamespacedInterface::NS_SEPARATOR;
			foreach ($items as $k => $v) {
				if (strpos($k, $prefix) === 0) {
					$k = substr($k, strlen($prefix));
					yield $k => $v;
				}
			}
		
		} else {
			
			$prefix = $namespace . NamespacedInterface::NS_SEPARATOR;
			foreach ($items as $k => $v) {
				if (strpos($k, $prefix) === 0) {
					yield $k => $v;
				}
			}
		
		}
	
	}

}

