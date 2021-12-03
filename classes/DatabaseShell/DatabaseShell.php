<?php


class DatabaseShell
{
    private $link;

    public function __construct($host, $user, $password, $database)
    {
        $this->link = mysqli_connect($host, $user, $password, $database);
        mysqli_query($this->link, 'SET NAMES utf8');
    }

    /**
     * сохраняет запись в базу
     * @param $table
     * @param $data
     */
    public function save ($table, $data)
    {
        $fields = '';
        $values = '';
        foreach ($data as $field => $value) {
            $fields .= '' . $field . ',';
            $values .= '\'' . $value . '\',';
        }
        $fields = rtrim($fields,',');
        $values = rtrim($values,',');
        $query = "INSERT INTO $table($fields) VALUES($values)";
        return mysqli_query($this->link, $query);
    }

    /**
     * удаляет запись по ее id
     * @param $table
     * @param $id
     */
    public function del($table, $id)
    {
        $query = "DELETE FROM $table WHERE id=$id";
        return mysqli_query($this->link, $query);
    }

    /**
     * удаляет записи по их id
     * @param $table
     * @param $ids
     */
    public function delAll($table, $ids)
    {

    }

    /**
     * получает одну запись по ее id
     * @param $table
     * @param $id
     */
    public function get($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id=$id";
        $result = mysqli_query($this->link, $query);
        return mysqli_fetch_assoc($result);
    }

    /**
     * получает массив записей по их id
     * @param $table
     * @param $ids
     */
    public function getAll($table, $ids)
    {
        $result = [];
        foreach ($ids as $id) {
            $result[] = $this->select($table, $id);
        }
        return $result;
    }

    /**
     * получает массив записей по условию
     * @param $table
     * @param $condition
     */
    public function selectAll($table, $condition)
    {
        //
    }
}

$db = new DatabaseShell('localhost', 'root','root', 'test_16');
//$db->save('users', ['name' => 'user1', 'age' => '23']);
//echo '<pre>';
//print_r($db->selectAll('pages', [1,2,3,4]));
//echo '</pre>';

//$db->del('users', 10);