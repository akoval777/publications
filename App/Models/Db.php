<?php
    namespace App\Models;

    class Db
    {
        use Singleton;

        protected $dbh;

        protected function __construct()
        {
            try {
                $this->dbh = new \PDO('mysql:host=localhost; dbname=publications; charset=UTF8', 'root', '');
            } catch (\PDOException $e) {
                $file = fopen("logfile.log", "a+");
                fwrite($file, date("d.m.Y H:i:s", time()) . " " . $e->getMessage() . "\n\r");
                fclose($file);
                echo "Ошибка соединения с БД";
                exit;
            }
        }

        public function execute($sql, $params = [])
        {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            return $this->dbh->lastInsertId();
        }

        public function query($sql, $params, $class)
        {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            if (false !== $res) {
                return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            }
            return [];
        }

    }
?>