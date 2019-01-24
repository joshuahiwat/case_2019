<?php
namespace model;

use PDO;

/**
 * @property TodoRepository todoRepository
 */
final class ItemApi
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
     * @param string $list
     * @param string $uuid
     * @param string $description
     */
    public function setItem(string $list, string $uuid, string $description)
    {
        $this->todoRepository->setItem($list, $uuid, $description);
    }
}