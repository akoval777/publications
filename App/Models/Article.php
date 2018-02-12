<?php
	namespace App\Models;

	class Article extends Publication
	{
		const TABLE = 'articles';
		public $rating;

		public function __get($k)
    	{
	        switch ($k) {
	            case 'author':
	                return Author::findByIdArticle($this->id);
	                break;
	            default:
	                return null;
	        }
    	}

	    public function __isset($k)
	    {
	        switch ($k) {
	            case 'author':
	                return !empty($this->id);
	                break;
	            default:
	                return false;
	        }
	    }

	    public static function addRating($rating, $id)
        {
            $db = Db::instance();
            $current_Rating = $db->query(
                'SELECT rating FROM ' . static::TABLE . ' WHERE id=:id',
                [':id' => $id],
                static::class
            )[0];
            if ($current_Rating->rating != 0) {
            	$new_Rating = ($current_Rating->rating + $rating)/2;
        	} else $new_Rating = $rating;
            return $db->execute(
                'UPDATE ' . static::TABLE . " SET rating=$new_Rating WHERE id=:id",
                [':id' => $id]             
            );
        }

	}
?>