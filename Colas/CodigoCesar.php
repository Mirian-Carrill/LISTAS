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

    public function isEmpty() {
        return $this->rear == 0;
    }
}

class CodigoCesar {
    public static function main() {
        $key = array(3, 8, -12, 4, -3, 22);
        $keyValue = null;
        $encoded = "";
        $decoded = "";
        $message = "How can you be so slow";

        $keyQueue1 = new ArrayQueue();

        echo "Original message: " . $message . "\n";

        foreach ($key as $value) {
            $keyQueue1->enqueue($value);
        }

        for ($scan = 0; $scan < strlen($message); $scan++) {
            $keyValue = $keyQueue1->dequeue();
            $encoded .= chr(ord($message[$scan]) + $keyValue);
            $keyQueue1->enqueue($keyValue);
        }

        echo "Encoded Message: " . $encoded . "\n";

        // Ahora vamos a decodificar el mensaje

        $keyQueue2 = new ArrayQueue();

        foreach ($key as $value) {
            $keyQueue2->enqueue(-$value);
        }

        for ($scan = 0; $scan < strlen($encoded); $scan++) {
            $keyValue = $keyQueue2->dequeue();
            $decoded .= chr(ord($encoded[$scan]) + $keyValue);
            $keyQueue2->enqueue($keyValue);
        }

        echo "Decoded Message: " . $decoded . "\n";
    }
}

// Ejecutar el programa
CodigoCesar::main();
