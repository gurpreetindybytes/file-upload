<?php

/**
 * Create FileUpload Class 
 */
class File
{

	public static function upload($location,$file_name,$file_temp_path){
		if($location[strlen($location)-1] != '/'){
			$location .= '/';
		}			
		$dest_path = $location.$file_name;
		
		if(!is_dir($location)) {			
			if(self::createDir($location)){
				self::moveToFolder($file_temp_path,$dest_path);
			}
		}
		else{
			self::moveToFolder($file_temp_path,$dest_path);
		}
		
	}

	private static function createDir($directoryName){		
		return (mkdir($directoryName, 0777,true)) ? true : false;		
	}

	private static function moveToFolder($fileTmpPath,$dest_path){
		return (move_uploaded_file($fileTmpPath, $dest_path)) ? true : false;
	}
}

?>