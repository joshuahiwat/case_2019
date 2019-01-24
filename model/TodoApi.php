<?php
namespace model;

use PDO;

/**
 * @property TodoRepository todoRepository
 */
final class TodoApi
{

    /** @var PDO */
    private $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->todoRepository = new TodoRepository($db);
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function getList()
    {
        $list = $this->todoRepository->getList();
        return $list;
    }

    /**
     * @param string $uuid
     * @param string $title
     */
    public function setList(string $uuid, string $title)
    {
        $this->todoRepository->setList($uuid, $title);
    }
}