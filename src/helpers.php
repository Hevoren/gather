<?php
namespace Gather;

function collection(array $array = []): Gather
{
    return new Gather($array);
}