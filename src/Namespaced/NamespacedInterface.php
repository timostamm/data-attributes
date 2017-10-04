<?php

namespace TS\Data\Attributes\Namespaced;


use TS\Data\Attributes\AttributesInterface;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
interface NamespacedInterface extends AttributesInterface
{

	const KEEP_NAMESPACE = 1;

	const DROP_NAMESPACE = 2;

	const NS_SEPARATOR = '::';

	/**
	 * List all used namespaces.
	 *
	 * @return array
	 */
	function namespaces();

	/**
	 * Extract all attributes within the given namespace.
	 *
	 * @param string $namespace
	 * @param int $options
	 * @return self A new instance, containing only the attributes within the given namespace.
	 */
	function extract($namespace, $options = self::DROP_NAMESPACE);

}

