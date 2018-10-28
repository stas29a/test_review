<?php
namespace src_refactored\Integration;

class DataProvider implements IDataProvider
{
    private $host;
    private $user;
    private $password;

    /**
     * @param $host
     * @param $user
     * @param $password
     */
    public function __construct($host, $user, $password)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function get(Request $request): ?Response
    {
        // returns a response from external service
    }
}