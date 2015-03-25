<?php

class Database extends PDO {
	public function __construct() {
		parent::__construct('mysql:host=localhost;dbname=news', 'root', '');
	}

	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    public function insert($table, $data)
    {
        ksort($data);
        
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();

        return $this->lastInsertId();
    }

    public function update($table, $data, $where)
    {
        ksort($data);
        
        $fieldDetails = NULL;
        foreach($data as $key=> $value) {
            $fieldDetails .= "`$key` = :$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    public function updateStoryViewCount($storyId) {
        $sth = $this->prepare("UPDATE Story SET view_count = view_count+1 WHERE id = $storyId");
        $sth->execute();
    }

    public function updateCounter($table, $field, $recordId) {
        $sth = $this->prepare("UPDATE $table SET $field = $field+1 WHERE id = $recordId");
        $sth->execute();
    }

    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}

?>