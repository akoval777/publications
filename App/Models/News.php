<?php
	namespace App\Models;

	class News extends Publication
	{
		const TABLE = 'news';
		public $date;
		public $source;
	}
?>