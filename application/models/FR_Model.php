<?php
/**
 * this class extends form CI_Model. implements all methods of the parent
 * and add methods for this project.
 * @author martin.fox
 * 
 */
class FR_Model extends CI_Model {
	
	function FR_Model() 
	{
		parent::__construct();
		/** LOAD DATABASE **/
		$this->load->database();		
	}
	
	/**
	 * convert a cursor data to an array of object
	 * */
	public function decodeCursorData($cursorData){
		foreach($cursorData as $fieldName => $aField){
			//oracle return the values in caps lock, and we use lower case.
			$fieldName = strtolower($fieldName);
			foreach($aField as $index => $aValue){
				$response[$index]->$fieldName = $aValue;
			}
		}
		return $response;
	}
	
//	/**
//	 * @param package
//	 * @param service
//	 * 
//	 * @return{
//	 *  'response': response,
//	 * 	'errorCode': 0 is Ok,
//	 *  'errorDescription'
//	 * }
//	 * */
//	public function oracleQuery($pName, $procedureName){
//	
//	}
}

?>