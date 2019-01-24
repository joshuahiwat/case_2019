<?php

namespace model;

use core\CoreApiFactory;

final class ApiFactory
{

    /**
     * @return TodoApi
     */
    public function todoApi()
    {
        $CoreApiFactory = new CoreApiFactory();

        return new TodoApi($CoreApiFactory->getDatabase());
    }

    /**
     * @return ItemApi
     */
    public function itemApi()
    {
        $CoreApiFactory = new CoreApiFactory();

        return new ItemApi($CoreApiFactory->getDatabase());
    }
}