<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    // Welcome page (/)[cite: 1]
    public function welcome()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTodayTasks(); // Only today's tasks[cite: 1]
        $data['title'] = "Today's Tasks";

        return view('welcome_tasks', $data);
    }

    // Task List page (/tasks)[cite: 1]
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getAllTasksOrderedByDate(); // All tasks by date[cite: 1]
        $data['title'] = "All Tasks";

        return view('task_list', $data);
    }
}