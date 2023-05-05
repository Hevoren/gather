<?php
namespace Gather;

function collection(array $array = []): Collect
{
    return new Collect($array);
}