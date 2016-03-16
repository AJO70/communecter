<?php
/**
 * LogController.php
 *
 * @author: Sylvain Barbot <sylvain.barbot@gmail.com>
 * Date: 7/29/15
 * Time: 12:25 AM
 */
class LogController extends CommunecterController {

	public function actions()
	{
	    return array(
	        'getipaddresstoblock'    => 'citizenToolKit.controllers.log.GetIpAddressToBlockAction',
	        'cleanup'    			 => 'citizenToolKit.controllers.log.CleanUpAction'
	    );
	}
}