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
		}
	}
?>