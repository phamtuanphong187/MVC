<?php

namespace MVC\Models;

use MVC\Core\ResourceModel;

class TaskResource extends ResourceModel
{
    public function __construct()
    {
        parent::_init('tasks', 'id', new TaskModel);
    }
}