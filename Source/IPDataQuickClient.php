<?php
namespace IPDataClient;


use IPDataClient\Data\IPDataResponse;


class IPDataQuickClient
{
	public static function lookup(string $ip, string $key): IPDataResponse
	{
		$client = new IPDataClient($key);
		return $client->lookup($ip);
	}
}