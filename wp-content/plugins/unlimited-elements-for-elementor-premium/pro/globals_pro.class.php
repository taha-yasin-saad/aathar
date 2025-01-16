<?php

class UniteCreatorGlobalsPro{

	/**
	 * init enable edit pro settings
	 */
	private static function initEditProSettings(){
							
		GlobalsUnlimitedElements::$enableEditProOptions = HelperProviderCoreUC_EL::getGeneralSetting("edit_pro_settings");
		GlobalsUnlimitedElements::$enableEditProOptions = UniteFunctionsUC::strToBool(GlobalsUnlimitedElements::$enableEditProOptions);
		
	}
	
	
	/**
	 * run init on plugins loaded
	 * init only pro version features
	 */
	public static function init(){
		
		if(GlobalsUC::$isProVersion == false)
			return(false);

		self::initEditProSettings();
		
	}
	
	
	/**
	 * run pro globals
	 */
	public static function run(){
		
		add_action("plugins_loaded",array("UniteCreatorGlobalsPro", "init"));
				
	}

}


UniteCreatorGlobalsPro::run();