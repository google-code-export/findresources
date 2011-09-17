<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------

/**
 * Elements
 *
 * Returns only the array items specified.  Will return a default value if
 * it is not set.
 *
 * @access	public
 * @param	array
 * @param	array
 * @param	mixed
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('utf8'))
{
	function to_utf8($in) { 
	        if (is_array($in)) { 
	            $out = array();
	        	foreach ($in as $key => $value) { 
	                $out[to_utf8($key)] = to_utf8($value); 
	            }
	        	return $out; 
	        } elseif(is_string($in)) { 
	                return utf8_encode($in); 
	        } elseif (is_object($in)) {
		        $objAsArray = get_object_vars($in);
		        $out;
	        	foreach ($objAsArray as $key => $value) { 
	                $out->$key = to_utf8($value); 
	            }
		        return $out;    	
	        } else { 
	        	return $in; 
	        } 
	}

	/**
	 * convert to utf8 and then make json encode.
	 * */
	function json_encode_utf8($in){
		return json_encode(to_utf8($in));
	}
	
	function json_decode_into_array($in) {
		return array_map("utf8_decode",json_decode(utf8_encode($in),true));
	}
	
	
}

/* End of file utf8_helper.php */
/* Location: ./system/helpers/utf8_helper.php */