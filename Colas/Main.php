<?php

class ArrayQueue {
    private $queue;
    private $rear;

    public function __construct() {
        $this->queue = array();
        $this->rear = 0;
    }

    public function enqueue($element) {
        array_push($this->queue, $element);
        $this->rear++;
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            throw new Exception('EmptyStackException');
        }
        $result = array_shift($this->queue);
        $this->rear--;
        return $result;
    }

    public function first() {
        if ($this->isEmpty()) {
            throw new Exception('EmptyStackException');
        }
        return $this->queue[0];
    }

    public function isEmpty() {
        return $this->rear == 0;
    }

    public function __toString() {
        return implode('*', $this->queue);
    }
}

$key = array(3, 8, -12, 4, -3, 22);

$cola = new ArrayQueue();

$cola->enqueue(3);
$cola->enqueue(6);
$cola->enqueue(4);

echo $cola . "\n";

$cola->dequeue();
echo $cola . "\n";

echo $cola->first() . "\n";

// Decodificar mensaje
$encoded = "HOLA COMO ESTAS";
$keyQueue2 = new ArrayQueue();

foreach ($key as $value) {
    $keyQueue2->enqueue(-$value);
}

$decoded = "";

for ($i = 0; $i < strlen($encoded); $i++) {
    $keyValue = $keyQueue2->dequeue();
    $decoded .= chr(ord($encoded[$i]) + $keyValue);
    $keyQueue2->enqueue($keyValue);
}

echo "Decoded Message: " . $decoded . "\n";
