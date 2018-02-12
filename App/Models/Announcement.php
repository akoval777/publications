<?php
	namespace App\Models;

	class Announcement extends Publication
	{
		const TABLE = 'announcements';
		public $date_pub;
		public $date_rel;

		public static function deleteById($id)
        {
            $db = Db::instance();
            return $db->execute(
                'DELETE FROM ' . static::TABLE . ' WHERE id=:id',
                [':id' => $id]             
            );
        }

	}
?>