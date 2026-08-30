```php
<?php
// Problem: Implement a function to find the shortest path in a weighted graph using Dijkstra's algorithm

// Design Pattern: Strategy Pattern
class Graph {
    private $vertices;
    private $edges;

    public function __construct() {
        $this->vertices = [];
        $this->edges = [];
    }

    public function addVertex($vertex) {
        $this->vertices[] = $vertex;
        $this->edges[$vertex] = [];
    }

    public function addEdge($vertex1, $vertex2, $weight) {
        $this->edges[$vertex1][$vertex2] = $weight;
        $this->edges[$vertex2][$vertex1] = $weight;
    }

    public function shortestPath($start, $end) {
        $distances = array_fill(0, count($this->vertices), INF);
        $distances[$start] = 0;
        $queue = [$start];

        while (!empty($queue)) {
            $current = array_shift($queue);
            foreach ($this->edges[$current] as $neighbor => $weight) {
                $distance = $distances[$current] + $weight;
                if ($distance < $distances[$neighbor]) {
                    $distances[$neighbor] = $distance;
                    array_push($queue, $neighbor);
                }
            }
        }

        return $distances[$end];
    }
}

$graph = new Graph();
$graph->addVertex(0);
$graph->addVertex(1);
$graph->addVertex(2);
$graph->addVertex(3);
$graph->addVertex(4);

$graph->addEdge(0, 1, 10);
$graph->addEdge(1, 2, 1);
$graph->addEdge(2, 3, 2);
$graph->addEdge(3, 4, 4);
$graph->addEdge(4, 0, 3);

echo $graph->shortestPath(0, 3); // Output: 6
?>
```