<?php
namespace IPDataClient\Data;


use Gazelle\IResponse;
use Traitor\TStaticClass;


class ResponseParser
{
	use TStaticClass;
	
	
	public static function parse(IResponse $rawResponse): IPDataResponse
	{
		$data = $rawResponse->getJSON();
		
		$response = new IPDataResponse();
		
		$response->OriginalData		= $data;
		$response->OriginalResponse	= $rawResponse;
		$response->RequestsCount	= $data['count'];
		
		$response->IP				= $data['ip'];
		$response->City				= $data['city'];
		$response->Region			= $data['region'];
		$response->RegionCode		= $data['region_code'];
		$response->CountryName		= $data['country_name'];
		$response->CountryCode		= $data['country_code'];
		$response->ContinentName	= $data['continent_name'];
		$response->ContinentCode	= $data['continent_code'];
		$response->Latitude			= $data['latitude'];
		$response->Longitude		= $data['longitude'];
		$response->Postal			= $data['postal'];
		$response->Flag				= $data['flag'];
		$response->EmojiFlag		= $data['emoji_flag'];
		$response->EmojiUnicode		= $data['emoji_unicode'];
		
		return $response;
	}
}