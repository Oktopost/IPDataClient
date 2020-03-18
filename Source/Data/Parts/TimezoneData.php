<?php
namespace IPDataClient\Data\Parts;


use Objection\LiteSetup;
use Objection\LiteObject;


/**
 * @property string|null	$Name
 * @property string|null	$Abbreviation
 * @property string|null	$Offset
 * @property string|null	$IsDaylightSavingTime
 * @property string|null	$CurrentTime
 */
class TimezoneData extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'Name'					=> LiteSetup::createString(null),
			'Abbreviation'			=> LiteSetup::createString(null),
			'Offset'				=> LiteSetup::createString(null),
			'IsDaylightSavingTime'	=> LiteSetup::createBool(null),
			'CurrentTime'			=> LiteSetup::createString(null)
		];
	}
}
