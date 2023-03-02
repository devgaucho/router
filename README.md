# router

## Instalação

```bash
composer require gaucho/router
```

## Utilização

```php
<?php
require 'vendor/autoload.php';
get('/',function(){
	print 'hello world';
});
get('{name}',function($name){
	code(200);
	print 'hello '.$name;
});
