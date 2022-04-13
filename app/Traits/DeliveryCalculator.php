<?php

namespace App\Traits;

use App\Models\DeliveryCountry;

trait DeliveryCalculator {

	protected $fare_table = [
		'1' => [
			'1.7' => "6.13",
			'9' => "7.07",
			'18.7' => "8.55",
			'28.5' => "9.05",
		],
		'2' => [
			'0.9'  => "11.15",
			'1.7' => "11.63",
			'2.6' => '12.10',
			'3.6' => '12.59',
			'4.6' => '12.65',
			'5.5' => '13.12',
			'6.4' => '13.59',
			'7.3' => '14.04',
			'8.3' => '14.51',
			'9' => "14.97",
			'11' => "15.54",
			'12.8' => '16.46',
			'14.8' => '17.36',
			'16.7' => '18.27',
			'18.7' => '18.62',
			'23.5' => '19.49',
			'28.5' => "20.55",
		],
		'3' => [
			'0.9'  => "13.87",
			'1.7' => "14.23",
			'2.6' => '14.76',
			'3.6' => '15.21',
			'4.6' => '15.92',
			'5.5' => '16.40',
			'6.4' => '16.95',
			'7.3' => '17.52',
			'8.3' => '17.52',
			'9' => "17.52",
			'11' => "18.54",
			'12.8' => '19.19',
			'14.8' => '19.61',
			'16.7' => '20.35',
			'18.7' => '21.08',
			'23.5' => '22.67',
			'28.5' => "23.81",
		],
		'4' => [
			'0.9'  => "17.04",
			'1.7' => "18.49",
			'2.6' => '19.92',
			'3.6' => '21.37',
			'4.6' => '22.82',
			'5.5' => '23.46',
			'6.4' => '23.99',
			'7.3' => '25.34',
			'8.3' => '26.69',
			'9' => "28.04",
			'11' => "30.57",
			'12.8' => '33.24',
			'14.8' => '35.92',
			'16.7' => '38.61',
			'18.7' => '41.28',
			'23.5' => '47.98',
			'28.5' => "54.70",
		],
	];

	public function calculateDeliveryTotal($weight, $country_code)
	{
		if (DeliveryCountry::where('country_code', $country_code)->count() == 0) {
			$code = 4;
		} else {
			$code = DeliveryCountry::where('country_code', $country_code)->first()->delivery_zone;
		}

		if(!in_array($code, ['1', '2', '3', '4'])) {
			$code = 4;
		}

		$delivery_cost = 0;

		$index = 0;
		foreach ($this->fare_table[$code] as $weight_breakpoint => $amount) {
			if ($index == 0) {
				$delivery_cost = $amount;
			}
			$index ++;
			if ($weight > $weight_breakpoint) {
				$delivery_cost = $amount;
			}
		}

		$delivery_cost += 2;

		return $delivery_cost;
	}
}