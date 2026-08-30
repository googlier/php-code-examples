```php
<?php

// Generate a random programming problem
$problem = [
    'title' => 'Design a function to find the most common word in a sentence',
    'description' => 'Create a function that takes a sentence as input and returns the most common word in the sentence. If multiple words have the same highest frequency, return all of them.',
    'input' => 'A string representing a sentence',
    'output' => 'An array containing the most common word(s)'
];

// Design pattern to solve the problem
$designPattern = 'Decorator';

// PHP code using the Decorator design pattern to solve the problem
class WordFrequency {
    public function getFrequency($sentence) {
        $words = explode(' ', $sentence);
        $frequency = array_count_values($words);
        arsort($frequency);
        return $frequency;
    }
}

class MostCommonWordDecorator extends WordFrequency {
    public function getMostCommonWord($sentence) {
        $frequency = $this->getFrequency($sentence);
        $maxFrequency = max($frequency);
        $mostCommonWords = array_filter($frequency, function($count) use ($maxFrequency) {
            return $count === $maxFrequency;
        });
        return array_keys($mostCommonWords);
    }
}

$sentence = "The quick brown fox jumps over the lazy dog";
$decorator = new MostCommonWordDecorator();
$mostCommonWords = $decorator->getMostCommonWord($sentence);

echo json_encode($mostCommonWords);

?>
```