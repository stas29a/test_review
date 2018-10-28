<?php
namespace src_refactored\Integration;


class Response
{
    private $value;

    /**
     * @return mixed
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }


}