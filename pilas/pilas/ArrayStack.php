<?php

class ArrayStack {
    private $stack;
    private $top;
    private const DEFAULT_CAPACITY = 50;

    public function __construct() {
        $this->top = 0;
        $this->stack = array_fill(0, self::DEFAULT_CAPACITY, null);
    }

    public function push($element) {
        if ($this->size() == count($this->stack)) {
            $this->expandCapacity();
        }
        $this->stack[$this->top] = $element;
        $this->top++;
    }

    private function expandCapacity() {
        $newCapacity = count($this->stack) * 2;
        $newArray = array_fill(0, $newCapacity, null);
        array_copy($this->stack, 0, $newArray, 0, $this->size());
        $this->stack = $newArray;
    }

    public function pop() {
        if ($this->isEmpty()) {
            throw new Exception('EmptyStackException');
        }
        $this->top--;
        $result = $this->stack[$this->top];
        $this->stack[$this->top] = null;
        return $result;
    }

    public function peek() {
        return $this -> stack[$this -> top - 1];
    }

    public function size() {
        return $this -> top;
    }

    public function isEmpty() {
        return $this -> top == 0;
    }

    public function topString() {
        $pila = '';
        for ($i = $this->top - 1; $i >= 0; $i--) {
            $pila .= $this->stack[$i] . '*';
        }
        return $pila;
    }

}

function array_copy($source, $srcStart, &$dest, $destStart, $length) {
    for ($i = 0; $i < $length; $i++) {
        $dest[$destStart + $i] = $source[$srcStart + $i];
    }
}

// Ejemplo de uso
$pila = new ArrayStack();
$pila->push(1);
$pila->push(2);
$pila->push(3);

echo $pila->topString() . "\n";

$pila->pop();
echo $pila->topString() . "\n";

echo $pila->peek() . "\n";
