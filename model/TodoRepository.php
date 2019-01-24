<?php
namespace model;

use Exception;
use http\Exception\InvalidArgumentException;
use PDO;

final class TodoRepository
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * users constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function getList()
    {
        $query = $this->db->prepare('SELECT * FROM todo_list');

        try {
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (exception $e) {
            throw new InvalidArgumentException('Something went wrong');
        }

        return $result;
    }

    /**
     * @param string $list
     * @param string $uuid
     * @param string $description
     */
    public function setItem(string $list, string $uuid, string $description)
    {
        $post = [
            'uuid' => $uuid,
            'list_id' => $list,
            'description' => $description,
            'created_at' => date('Y-m-d'),
        ];

        $columns = array_keys($post);
        $col_value = implode(", :",$columns);
        $col_prepare = implode(", ",$columns);

        $query = 'INSERT INTO items ('.$col_prepare.') VALUES (:'.trim($col_value).')';

        try {
            $sql = $this->db->prepare($query);
            $sql->execute($post);
        }
        catch (exception $e) {
            throw new InvalidArgumentException('Something went wrong');
        }
    }

    /**
     * @param string $uuid
     * @param string $title
     */
    public function setList(string $uuid, string $title)
    {
        $post = [
            'uuid' => $uuid,
            'title' => $title,
            'created_at' => date('Y-m-d'),
        ];

        $columns = array_keys($post);
        $col_value = implode(", :",$columns);
        $col_prepare = implode(", ",$columns);

        $query = 'INSERT INTO todo_list ('.$col_prepare.') VALUES (:'.trim($col_value).')';

        try {
            $sql = $this->db->prepare($query);
            $sql->execute($post);
        }
        catch (exception $e) {
            throw new InvalidArgumentException('Something went wrong');
        }
    }
}