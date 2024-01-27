<?php
	namespace app\models;

	use yii\db\ActiveRecord;

	class Pdfs extends ActiveRecord
	{
		private $pdf;
		public $file;

		public function rules()
		{
			return[
				[['pdf'], 'required'], 
				[['file'], 'file']
			];
		}
	}
?>