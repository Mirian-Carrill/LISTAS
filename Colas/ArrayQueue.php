<?php

class ArrayQueue {
    private const DEFAULT_CAPACITY = 5;
    private $queue;
    private $rear;

    public function __construct() {
        $this->queue = array_fill(0, self::DEFAULT_CAPACITY, null);
        $this->rear = 0;
    }

    public function enqueue($element) {
        if ($this->size() == count($this->queue)) {
            $this->expandCapacity();
        }
        $this->queue[$this->rear] = $element;
        $this->rear++;
    }

    private function expandCapacity() {
        $newCapacity = count($this->queue) * 2;
        $newArray = array_fill(0, $newCapacity, null);
        array_copy($this->queue, 0, $newArray, 0, $this->size());
        $this->queue = $newArray;
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            throw new Exception('EmptyStackException');
        }
        $result = $this->queue[0];
        $this->rear--;
        array_copy($this->queue, 1, $this->queue, 0, $this->rear);
        $this->queue[$this->rear] = null;
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

    public function size() {
        return $this->rear;
    }

    public function __toString() {
        $cola = '';
        for ($i = 0; $i < $this->rear; $i++) {
            $cola .= $this->queue[$i];
            if ($i < $this->rear - 1) {
                $cola .= '*';
            }
        }
        return $cola;
    }
}

function array_copy($source, $srcStart, &$dest, $destStart, $length) {
    for ($i = 0; $i < $length; $i++) {
        $dest[$destStart + $i] = $source[$srcStart + $i];
    }
}

// Ejemplo de uso
$queue = new ArrayQueue();
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
echo $queue->__toString(); // Imprimirá "1*2*3"
$queue->dequeue();
echo $queue->__toString(); // Imprimirá "2*3"
