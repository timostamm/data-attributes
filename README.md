PHP Attributes data structure
=============================

This library provides a simple attribute lookup, editable attributes and namespaced attributes. 

It is intended to be used by other libraries and makes it easy to implement with the provided Traits.


## Readonly Attributes Collection

```php
use TS\Data\Attributes;

$attr = new Attributes(['target' => '_blank']);
$attr->count(); // => 1
count($attr); // => 1
$attr->get('target'); // => "_blank"
$attr->has('target'); // => true
$attr->toArray(); // => ['target' => '_blank']
foreach ($attr as $k => $v) {
  print $k . '=' . $v; // => "target = _blank"
}
```


## Mutable Attributes Collection

```php
use TS\Data\Attributes\Mutable;

$attr = new Attributes(['target' => '_blank']);
$attr->set('foo', 'bar');
$attr->remove('target');
$attr->toReadOnly(); // => TS\Data\Attributes\Attributes
```


## Namespaced Attributes Collection

```php
use TS\Data\Attributes\Namespaced;

$attr = new Attributes([
  'html::target' => '_blank', 
  'other::foo' => 'bar'
]);

// list used namespaces
$attr->namespaces(); // => ['html', 'other']

// extract entries with the given namespace
$attr->extract('html')->toArray(); // => ['target' => '_blank']

// keep the namespace 
$attr->extract('html', Attributes::KEEP_NAMESPACE)->toArray(); // => ['html::target' => '_blank']

```


## Mutable Namespaced Attributes Collection

```php
use TS\Data\Attributes\MutableNamespaced;

$attr = new Attributes([
  'html::target' => '_blank', 
  'other::foo' => 'bar'
]);

$attr->set('abc::foo', 'bar');
$attr->namespaces(); // => ['html', 'other', 'abc']
```



## Attribute Containers

```php
use TS\Data\Attributes\AttributesContainerInterface;
use TS\Data\Attributes\AttributesContainerTrait;

class My implements AttributesContainerInterface {
  use AttributesContainerTrait;
  public function __construct($attrs) {
    $this->initAttributes($attrs);
  }
}

$my = new My([
  'target' => '_blank' 
]);

$my->hasAttribute('target'); // => true
$my->getAttribute('target'); // => "_blank"
$my->getAttributes(); // => AttributesInterface
```

Mutable, Namespaced and combined containers are also available:

```php
use TS\Data\Attributes\Mutable\MutableContainerInterface;
use TS\Data\Attributes\Mutable\MutableContainerTrait;

class My implements MutableContainerInterface {
  use MutableContainerTrait;
  public function __construct($attrs) {
    $this->initAttributes($attrs);
  }
}

$my = new My([
  'target' => '_blank' 
]);
$my->setAttribute('foo', 'bar');
```

