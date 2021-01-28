<?php

namespace MVC\Models;

use MVC\Models\TaskResource;

class TaskRepository 
{
    protected $taskRepo;
    public function __construct()
    {
        $this->taskRepo= new TaskResource();
    }

    public function add($model)
    {
        return $this->taskRepo->save($model);
    }
    public function get($id)
    {
        return $this->taskRepo->show($id);
    }
    public function delete($model)
    {
        return $this->taskRepo->delete($model);

    }
    public function getAll()
    {
        return $this->taskRepo->show();
    }
    public function showId($id)
    {
        return $this->taskRepo->find($id);
    }



}