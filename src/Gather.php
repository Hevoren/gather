<?php

namespace Gather;

class Gather
{
    private array $array = [];

    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    public function get($key = null)
    {
        return $this->array[$key] ?? $this->array;
    }

    public function first()
    {
        return $this->array[array_key_first($this->array)];
    }

    public function count(): int
    {
        return count($this->array);
    }

    public function toArray(): array
    {
        return $this->array;
    }

    public function map(callable $callback): Gather
    {
        return new self(array_map($callback, $this->array));
    }

    public function each(callable $callback, ...$args): Gather
    {
        foreach ($this->array as $key => $item) {
            $callback($item, $key, ...$args);
        }
        return $this;
    }

    public function push($value, $key = null): Gather
    {
        if (gettype($value) === 'array') {
            $value = new self($value);
        }
        if ($key) {
            $this->array[$key] = $value;
        } else {
            $this->array[] = $value;
        }
        return $this;
    }

    public function unshift($value): Gather
    {
        array_unshift($this->array, $value);
        return $this;
    }

    public function shift(): Gather
    {
        array_shift($this->array);
        return $this;
    }

    public function pop(): Gather
    {
        array_pop($this->array);
        return $this;
    }

    public function splice($idx, $length = 1): Gather
    {
        array_splice($idx, $length);
        return $this;
    }
}