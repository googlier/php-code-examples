```php
<?php
// Problem: Implement a caching mechanism for a web application to improve performance.

// Design Pattern: Decorator Pattern

class WebRequest {
    public function execute() {
        return "Executing request";
    }
}

interface Cacheable {
    public function cache();
}

class CacheDecorator implements Cacheable {
    private $webRequest;

    public function __construct(WebRequest $webRequest) {
        $this->webRequest = $webRequest;
    }

    public function execute() {
        return $this->webRequest->execute();
    }

    public function cache() {
        return "Caching " . $this->webRequest->execute();
    }
}

$webRequest = new WebRequest();
$cachedRequest = new CacheDecorator($webRequest);

echo $cachedRequest->cache();
?>
```