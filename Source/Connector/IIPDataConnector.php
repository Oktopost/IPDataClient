<?php
namespace IPDataClient\Connector;


use Gazelle\IRequest;


interface IIPDataConnector
{
	public function request(): IRequest;
}