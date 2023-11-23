<?php

interface StackADT {
    public function push($element);

    public function pop();

    public function peek();

    public function size();

    public function isEmpty();

    public function __toString();

    public function esPalindroma();
}
