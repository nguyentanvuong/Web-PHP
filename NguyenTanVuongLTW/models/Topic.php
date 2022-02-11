<?php
class Topic extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->TableName('topic');
    }
    function topic_row()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->getrow($sql);
    }

    function topic_list()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->getList($sql);
    }
    function topic_count()
    {
        $sql = "SELECT* FROM  $this->table";
        return $this->getCount($sql);
    }
    function topic_insert()
    {
        $sql = "INSERT INTO  $this->table";
        return $this->setQuery($sql);
    }
    function topic_delete()
    {
        $sql = "DELETE FROM  $this->table";
        return $this->setQuery($sql);
    }
    function topic_update()
    {
        $sql = "UPDATE  $this->table";
        return $this->setQuery($sql);
    }
    function topic_name($id)
    {
        $row = $this->topic_row(['id'=>$id]);
        if($row != null)
            return $row['name'];
        return "Untopic";
    }
}

