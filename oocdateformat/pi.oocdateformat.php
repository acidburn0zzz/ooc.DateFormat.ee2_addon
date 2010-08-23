<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
						'pi_name'			=> 'ooc Date Format',
						'pi_version'		=> '1.0',
						'pi_author'			=> 'James Riordon',
						'pi_author_url'		=> 'http://outofcontrol.ca/projects/oocDateFormat',
						'pi_description'	=> 'Returns a formatted comment_expiry_date for the current entry. EE2',
						'pi_usage'			=> oocDateFormat::usage()
					);


/**
 * oocDateFormat Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Out of Control
 * @copyright		Copyright (c) 2010 Out of Control(r)
 * @link			http://outofcontrol.ca/projects/oocDateFormat
 */

class oocDateFormat {

	var $return_data;	
	
	/**
	 * Constructor
	 *
	 */

  	function oocDateFormat()
	{
	
		$this->EE =& get_instance();

		$date = ( ! $this->EE->TMPL->fetch_param('date')) ? time() : $this->EE->TMPL->fetch_param('date');
		$format = ( ! $this->EE->TMPL->fetch_param('format')) ? 'F jS, Y' : $this->EE->TMPL->fetch_param('format');

		$this->return_data = date($format,$date);
	}


	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	function usage()
	{
		ob_start(); 
	  ?>

			For ExpressionEngine 2.
			
			Allows formatting of the {comment_expiration_date} variable, 
			or any other date variable, for the current entry.
			
			Usage: 
			
			{exp:oocdateformat date="{comment_expiration_date}" format="F jS, Y"}

	<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
  }

}
// END CLASS

/* End of file pi.oocdateformat.php */
/* Location: ./system/expressionengine/plugins/pi.oocdateformat.php */