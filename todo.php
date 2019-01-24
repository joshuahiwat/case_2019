<?php

use model\Item;
use model\Todo;

$todo = new Todo();
$item = new Item();

//Before you can see the list, you first must create one.
$todo->setList('1', 'list one');

//Get the full list and information.
$getTodoList = $todo->getList();

//List id can you get from the array of getList method.
$item->setItem('1', '1', 'hello world');

