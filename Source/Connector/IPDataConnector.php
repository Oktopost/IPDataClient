<?php
namespace IPDataClient\Connector;


use Gazelle\Gazelle;
use Gazelle\IRequest;
use Gazelle\HTTPMethod;
use Gazelle\Decorators\GetRequestRetryDecorator;


class IPDataConnector implements IIPDataConnector
{
	private const URL = 'https://api.ipdata.co';
	
	
	/** @var Gazelle */
	private $gazelle; 
	
	
	public function __construct(string $key)
	{
		$this->gazelle = new Gazelle();
		
		$this->gazelle
			->template()
			->setURL(self::URL)
			->setMethod(HTTPMethod::GET)
			->setQueryParam('api-key', $key);
		
		$this->gazelle
			->addDecorator(new GetRequestRetryDecorator(2));
	}
	
	
	public function request(): IRequest
	{
		return $this->gazelle->request();
	}
}