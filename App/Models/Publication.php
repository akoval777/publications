<?php
	namespace App\Models;

	abstract class Publication
	{
		const TABLE = '';
		public $headling;
		public $text;
        public $id;

        public static function findAll($sort, $type)
        {
            $db = Db::instance();
            return $db->query(
                'SELECT * FROM ' . static::TABLE . ' ORDER BY ' . $sort . ' ' . $type . ' LIMIT 10',
                [],
                static::class
            );
        }

        public static function findById($id)
        {
            $db = Db::instance();
            return $db->query(
                'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
                [':id' => $id],
                static::class
            )[0];
        }

        public function isNew()
        {
            return empty($this->id);
        }

        public function insert()
        {
            if (!$this->isNew()) {
                return;
            }

            $columns = [];
            $values = [];
            foreach ($this as $k => $v) {
                if ('id' == $k) {
                    continue;
                }
                $columns[] = $k;
                $values[':'.$k] = $v;
            }

            $sql = '
    			INSERT INTO ' . static::TABLE . '
    			(' . implode(',', $columns) . ')
    			VALUES
    			(' . implode(',', array_keys($values)) . ')
            	';
            $db = Db::instance();
            $lastId = $db->execute($sql, $values);
            return $lastId;
        }

    }
?>