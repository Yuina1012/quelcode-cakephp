<?php

namespace App\Model\Validation;

use Cake\Validation\Validation;

class CustomValidation extends Validation
{
	/**
	 * 緯度
	 * @param string $value
	 * @return bool
	 */
	public static function  isCheck($fileName)
	{
		// 拡張子
		$result = (bool)preg_match('/\.gif$|\.png$|\.jpg$|\.jpeg$|\.bmp$/i', $fileName);
		// dd('isCheckを通った', $fileName, $result);
		return $result;


		return false;
		// return $customValidator;
	}
}
