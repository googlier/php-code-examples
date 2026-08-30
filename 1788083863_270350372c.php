```php
<?php
// Problem: Implement a function to find the shortest path in a weighted graph using Dijkstra's algorithm
// Design Pattern: Strategy

class Graph {
    private $vertices;
    private $edges;

    public function __construct($vertices) {
        $this->vertices = $vertices;
        $this->edges = array_fill(0, $vertices, array());
    }

    public function addEdge($from, $to, $weight) {
        $this->edges[$from][$to] = $weight;
    }

    public function shortestPath($start, $end) {
        $strategy = new DijkstraStrategy($this);
        return $strategy->findShortestPath($start, $end);
    }
}

class Strategy {
    public function findShortestPath($graph, $start, $end) {
        throw new Exception("Strategy method not implemented");
    }
}

class DijkstraStrategy extends Strategy {
    public function findShortestPath($graph, $start, $end) {
        $distances = array_fill(0, $graph->vertices, INF);
        $distances[$start] = 0;
        $queue = range(0, $graph->vertices - 1);

        while (!empty($queue)) {
            $u = min($queue, function($i, $j) use ($distances) {
                return $distances[$i] <=> $distances[$j];
            });
            $queue = array_diff($queue, [$u]);
            foreach ($graph->edges[$u] as $v => $weight) {
                if ($distances[$u] + $weight < $distances[$v]) {
                    $distances[$v] = $distances[$u] + $weight;
                }
            }
        }

        return $distances[$end];
    }
}

// Usage
$graph = new Graph(5);
$graph->addEdge(0, 1, 10);
$graph->addEdge(0, 4, 5);
$graph->addEdge(1, 2, 1);
$graph->addEdge(1, 4, 2);
$graph->addEdge(2, 3, 4);
$graph->addEdge(3, 4, 3);

echo $graph->shortestPath(0, 4); // Output: 7
?>
```