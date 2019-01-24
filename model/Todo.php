<?php
namespace model;

class Todo
{
    /**
     * @return array
     */
    public function getList()
    {
        $apiFactory = new ApiFactory();
        $todo = $apiFactory->todoApi();

        return $todo->getList();
    }

    /**
     * @param string $uuid
     * @param string $title
     */
    public function setList(string $uuid, string $title)
    {
        $apiFactory = new ApiFactory();
        $todo = $apiFactory->todoApi();

        $todo->setList($uuid, $title);
    }
}