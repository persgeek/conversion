<?php

namespace PG\Conversion;

use Exception;

abstract class Conversion
{
    /**
     * Documentation for this.
     */
    protected $rates;

    /**
     * Documentation for this.
     */
    protected $from;

    /**
     * Documentation for this.
     */
    protected $dest;

    /**
     * Documentation for this.
     */
    protected $value;

    /**
     * Documentation for this.
     */
    public static function instance()
    {
        return new static();
    }

    /**
     * Documentation for this.
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Documentation for this.
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Documentation for this.
     */
    public function setDest($dest)
    {
        $this->dest = $dest;

        return $this;
    }

    /**
     * Documentation for this.
     */
    public function getDest()
    {
        return $this->dest;
    }

    /**
     * Documentation for this.
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Documentation for this.
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Documentation for this.
     */
    public function hasRate($name)
    {
        return array_key_exists($name, $this->rates);
    }

    /**
     * Documentation for this.
     */
    public function getRate($name)
    {
        $hasRate = $this->hasRate($name);

        if (!$hasRate) {
            throw new Exception('Could not found rate');
        }

        return $this->rates[$name];
    }

    /**
     * Documentation for this.
     */
    public function convert()
    {
        $value = ( $this->value * $this->getRate($this->from) ) / $this->getRate($this->dest);

        return round($value);
    }

    /**
     * Documentation for this.
     */
    public function readable($append = NULL)
    {
        $value = $this->convert();

        if (!$append) {
            $append = $this->dest;
        }

        return "{$value} {$append}";
    }
}
