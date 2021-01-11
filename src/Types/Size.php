<?php

namespace PG\Conversion\Types;

use PG\Conversion\Conversion;

class Size extends Conversion
{
    /**
     * Documentation for this.
     */
    protected $rates = ['KB' => 1, 'MB' => 1024, 'GB' => 1048576];
}
