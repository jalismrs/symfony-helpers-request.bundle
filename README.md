# Symfony Bundle Helpers Request

## Test

`phpunit` OU `vendor/bin/phpunit`

coverage reports will be available in `var/coverage`

## Use

```php
use Jalismrs\HelpersRequestBundle\RequestHelpers;

class SomeClass {
    public function someCall() {
        $routeName = RequestHelpers::getRouteName($request);
    }
}
```
