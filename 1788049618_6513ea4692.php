```php
<?php
$pattern = array_rand(array("Singleton", "Observer", "Factory", "Adapter", "Decorator"));
switch ($pattern) {
    case "Singleton":
        $data = "Singleton Pattern";
        break;
    case "Observer":
        $data = "Observer Pattern";
        break;
    case "Factory":
        $data = "Factory Pattern";
        break;
    case "Adapter":
        $data = "Adapter Pattern";
        break;
    case "Decorator":
        $data = "Decorator Pattern";
        break;
}

echo $data;
?>
```