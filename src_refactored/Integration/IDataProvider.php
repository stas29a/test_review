<?php
namespace src_refactored\Integration;


interface IDataProvider
{
    /**
     * @param Request $request
     * @return null|Response
     */
    public function get(Request $request): ?Response;
}