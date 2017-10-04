<?php

namespace TS\Data\Attributes\MutableNamespaced;


use TS\Data\Attributes\Mutable\MutableContainerInterface;
use TS\Data\Attributes\Namespaced\NamespacedContainerInterface;
use TS\Data\Attributes\Mutable\MutableNamespacedInterface;


/**
 *
 * @author Timo Stamm <ts@timostamm.de>
 * @license AGPLv3.0 https://www.gnu.org/licenses/agpl-3.0.txt
 */
interface MutableNamespacedContainerInterface extends MutableContainerInterface, NamespacedContainerInterface
{

	/**
	 *
	 * @return MutableNamespacedInterface
	 */
	function getAttributes();

}

