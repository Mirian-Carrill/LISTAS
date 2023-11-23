<?php

interface QueueADT {
    public function enqueue($element);

    public function dequeue();

    public function first();

    public function isEmpty();

    public function size();

    public function __toString();
}
