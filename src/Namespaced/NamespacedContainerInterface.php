<?php

namespace TS\Data\Attributes\Namespaced;


use TS\Data\Attributes\AttributeContainerInterface;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
interface NamespacedContainerInterface extends AttributeContainerInterface
{

	/**
	 * List all used namespaces.
	 *
	 * @return array
	 */
	function attributeNamespaces();
	
	
	/**
	 * @return NamespacedInterface
	 */
	function getAttributes();
	
}

