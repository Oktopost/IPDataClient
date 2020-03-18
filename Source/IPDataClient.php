<?php
namespace IPDataClient;


use Gazelle\AbstractConnector;
use IPDataClient\Data\IPDataResponse;
use IPDataClient\Data\ResponseParser;
use IPDataClient\Connector\IPDataConnector;
use IPDataClient\Connector\IIPDataConnector;


class IPDataClient extends AbstractConnector
{
	/** @var IIPDataConnector */
	private $connector;
	
	
	public function __construct(string $key, ?IIPDataConnector $connector = null)
	{
		parent::__construct();
		
		$this->connector = ($connector ?: new IPDataConnector($key));
	}
	
	
	public function lookup(string $ip): IPDataResponse
	{
		$response = $this->connector
			->request()
			->setPath($ip)
			->send();
		
		$data = ResponseParser::parse($response);
		
		if ($data)
		{
			$data->IP = $ip;
		}
		
		return $data;
	}
}