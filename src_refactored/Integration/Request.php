<?php
namespace src_refactored\Integration;


class Request
{
    private $param1;
    private $param2;

    /**
     * @return mixed
     */
    public function getParam1(): ?string
    {
        return $this->param1;
    }

    /**
     * @param mixed $param1
     */
    public function setParam1(string $param1)
    {
        $this->param1 = $param1;
    }

    /**
     * @return mixed
     */
    public function getParam2(): ?string
    {
        return $this->param2;
    }

    /**
     * @param mixed $param2
     */
    public function setParam2(string $param2)
    {
        $this->param2 = $param2;
    }
}