<?php
namespace PrimeSliderPro\Modules\Pandora;

use PrimeSliderPro\Base\Prime_Slider_Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Prime_Slider_Module_Base {

	public function get_name() {
		return 'pandora';
	}

	public function get_widgets() {
		$widgets = [
			'Pandora',
		];

		return $widgets;
	}
}
