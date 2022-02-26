<?php
    /*
        Vital Technolabs
        Version: 1.0
        Updated: 09/04/2021

        File Name: theme.php
        Description:
        Help: https://www.vitaltechnolabs.com/
    */

    class model {
		public static function get_data($arrayData = array()) {
			$arrW = array(
				'tableName'   => get_called_class(),
				'loadUploads' => true,
				'allowSearch' => false,
			);
			
			foreach($arrayData as $k => $v){
				$arrW[mysql_escape($k)] = $v;
			}
			
			list($record_settingsRecords, $record_settingsMetaData) = getRecords($arrW);
			return $record_settingsRecords;
		}				public static function add_record ( $arrData = array() ) {			$ArrComminKey = array(				'createdDate'		=>	date('Y-m-d H:i:s'),				'createdByUserNum'	=>	'0',				'updatedDate'		=>	date('Y-m-d H:i:s'),				'updatedByUserNum'	=>	'0',				'dragSortOrder'		=>	'1',			);			$NewArrdata = array_merge($ArrComminKey,$arrData);						$query	= "INSERT INTO `".TABLE_PREFIX.get_called_class()."` (";			$fields = array_keys($NewArrdata);			$values = array_values($NewArrdata); 			$sqlFields = array();			$sqlValues = array();			foreach($fields as $field) {				$sqlFields[] = "`".mysql_escape($field)."`";			}			foreach($values as $value) {				$sqlValues[] = "'".mysql_escape($value)."'";			}									$query.= implode(", ", $sqlFields);			$query.= ") VALUES (";												$query.= implode(", ", $sqlValues);			$query.= ")";			/* echo $query; */						mysqli()->query($query);			$last_id = mysqli()->insert_id;			return $last_id;					}				public static function update_record ( $arrData = array(), $arrWhereAnd = array(), $arrWhereOR = array(), $limit_one = true , $arrWhereIn = array() ) {			$query	= "UPDATE `".TABLE_PREFIX.get_called_class()."` SET ";			$sqlFields = array();			$sqlWhereAnd = array();			$sqlWhereOR = array();			foreach($arrData as $field => $value) {				$sqlFields[] = "`".mysql_escape($field)."` = '".mysql_escape($value)."'";			}			foreach($arrWhereAnd as $field => $value) {				$sqlWhereAnd[] = "`".mysql_escape($field)."` = '".mysql_escape($value)."'";			}			foreach($arrWhereOR as $field => $value) {				$sqlWhereOR[] = "`".mysql_escape($field)."` = '".mysql_escape($value)."'";			}										foreach($arrWhereIn as $field => $value) {				$sqlWhereAnd[] = "`".mysql_escape($field)."` IN ( ".mysql_escape($value)." )";			}			$query.= implode(", ", $sqlFields);			if((is_array($sqlWhereAnd) && count($sqlWhereAnd)) || (is_array($sqlWhereOR) && count($sqlWhereOR)) ) {				$query.= "WHERE ";			}			if(is_array($sqlWhereAnd) && count($sqlWhereAnd)) {				$query.= implode("AND ", $sqlWhereAnd);			}			if(is_array($sqlWhereOR) && count($sqlWhereOR)) {				$query.= "AND (";				$query.= implode("OR ", $sqlWhereOR);				$query.= " )";			}			if($limit_one) {				$query.= "LIMIT 1";			}			return mysqli()->query($query);;		}
	}
?>