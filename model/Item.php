<?php
namespace model;

class Item
{
    /**
     * @param string $list
     * @param string $uuid
     * @param string $description
     * @return mixed
     */
    public function setItem(string $list, string $uuid, string $description)
    {
        $apiFactory = new ApiFactory();
        $item = $apiFactory->itemApi();

        $item->setItem($list, $uuid, $description);
    }
}