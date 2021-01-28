<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;

class TasksController extends Controller
{
    function index()
    {

        $tasks = new TaskRepository();

        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
        

            $task= new TaskRepository();
            $model= new TaskModel();
            $model->setTitle($_POST["title"]);
            $model->setDescription($_POST["description"]);

            if ($task->add($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
    
        $task= new TaskRepository();

        $d["task"] = $task->showId($id);


        if (isset($_POST["title"]))
        {
            $model = new TaskModel();
            $model->setId($id);
            $model->setTitle($_POST["title"]);
            $model->setDescription($_POST["description"]);


            if ($task->add($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
       
        $task = new TaskRepository();   
    
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>