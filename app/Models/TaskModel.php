<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at', 'is_archived'];
    protected $useTimestamps    = false;

    /**
     * Query today's non-archived tasks
     */
    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->where('is_archived', 0)
                    ->findAll();
    }

    /**
     * Query all non-archived tasks ordered by date
     */
    public function getAllTasksOrderedByDate()
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date', 'ASC')
                    ->findAll();
    }
}