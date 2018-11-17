<?php

namespace App\DataProviders;


interface DataProviderInterface
{
    public function filter(array $filters): void;

    public function getData();
}
