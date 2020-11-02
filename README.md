# symfony.common.helpers.request

Adds Symfony request helper methods

## Test

`phpunit` or `vendor/bin/phpunit`

coverage reports will be available in `var/coverage`

## Use

### getRequest
```php
use Jalismrs\Symfony\Common\Helpers\RequestHelpers;
use Symfony\Component\HttpFoundation\RequestStack;

class SomeClass {
    public function someCall(
        RequestStack $requestStack
    ): void {
        $request = RequestHelpers::getRequest($requestStack);
    
        // do something
    }
}
```

### getRouteName
```php
use Jalismrs\Symfony\Common\Helpers\RequestHelpers;
use Symfony\Component\HttpFoundation\Request;

class SomeClass {
    public function someCall(
        Request $request
    ): void {
        $routeName = RequestHelpers::getRouteName($request);
    
        // do something
    }
}
```
