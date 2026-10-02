<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at'];
    protected $useTimestamps    = false;

    /**
     * Query and return tasks scheduled for today
     */
    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->findAll();
    }

    /**
     * Query all tasks ordered by date
     */
    public function getAllTasksOrderedByDate()
    {
        return $this->orderBy('task_date', 'ASC')
                    ->findAll();
    }
}