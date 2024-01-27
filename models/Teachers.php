<?php
	namespace app\models;

	use yii\db\ActiveRecord;

	class Teachers extends ActiveRecord
	{
		private $name;
		private $description;
		private $rank;
		private $photo;
		public $file;

		public function rules()
		{
			return[
				[['name', 'description', 'rank', 'photo'], 'required'],
				[['file'], 'file']
			];
		}
	}
?>