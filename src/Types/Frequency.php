<?php

namespace PG\Conversion\Types;

use PG\Conversion\Conversion;

class Frequency extends Conversion
{
    /**
     * Documentation for this.
     */
    protected $rates = ['MHz' => 1000000, 'GHz' => 1000000000];
}
