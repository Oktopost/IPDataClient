<?php
namespace IPDataClient\Data\Parts;


use Objection\LiteSetup;
use Objection\LiteObject;


/**
 * @property string|null	$ID
 * @property string|null	$Name
 * @property string|null	$Domain
 * @property string|null	$Route
 * @property string|null	$Type
 */
class ASNData extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'		=> LiteSetup::createString(null),
			'Name'		=> LiteSetup::createString(null),
			'Domain'	=> LiteSetup::createString(null),
			'Route'		=> LiteSetup::createString(null),
			'Type'		=> LiteSetup::createString(null)
		];
	}
}
