<?php
	namespace App\Models;

	class Author 
	{
	    const TABLE = 'authors';
	    public $id;
	    public $id_article;
	    public $family;
	    public $name;
	    public $surname;

	    public static function findByIdArticle($id_article)
        {
            $db = Db::instance();
            return $db->query(
                'SELECT * FROM ' . static::TABLE . ' WHERE id_article=:id',
                [':id' => $id_article],
                static::class
            );
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
            $db->execute($sql, $values);
       
        }
	}
?>