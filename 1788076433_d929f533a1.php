```php
<?php

interface Command {
    public function execute();
}

class Light {
    public function on() {
        echo "Light is on.\n";
    }

    public function off() {
        echo "Light is off.\n";
    }
}

class LightOnCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->on();
    }
}

class LightOffCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->off();
    }
}

class RemoteControl {
    private $command;

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function pressButton() {
        $this->command->execute();
    }
}

$light = new Light();
$lightOnCommand = new LightOnCommand($light);
$lightOffCommand = new LightOffCommand($light);

$remote = new RemoteControl();
$remote->setCommand($lightOnCommand);
$remote->pressButton();

$remote->setCommand($lightOffCommand);
$remote->pressButton();

?>
```