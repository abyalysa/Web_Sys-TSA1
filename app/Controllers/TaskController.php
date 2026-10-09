<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    // Public Welcome page (today's non-archived tasks)[cite: 1, 4]
    public function welcome()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTodayTasks();
        $data['title'] = "Today's Tasks";

        return view('welcome_tasks', $data);
    }

    // Public Task List page (all non-archived tasks)[cite: 1, 4]
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getAllTasksOrderedByDate();
        $data['title'] = "All Tasks";

        return view('task_list', $data);
    }

    // New Task Form (/tasks/new)
    public function new()
    {
        $data['title'] = "Create New Task";
        return view('tasks_new', $data);
    }

    // Process New Task Submission
    public function create()
    {
        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskModel->save([
            'title'      => $this->request->getPost('title'),
            'status'     => $this->request->getPost('status') ?? 'pending',
            'task_date'  => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived'=> 0,
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created successfully!');
    }

    // Edit Task Form (/tasks/edit/{id})
    public function edit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (! $task || $task['is_archived'] == 1) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        $data['task']  = $task;
        $data['title'] = "Edit Task";

        return view('tasks_edit', $data);
    }

    // Update Task Action
    public function update($id)
    {
        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();
        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully!');
    }

    // Soft Delete (Archive Task)[cite: 4]
    public function delete($id)
    {
        $taskModel = new TaskModel();
        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived successfully!');
    }
}