<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TasksController extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTodaysTasks();
        return view('welcome_message', $data);
    }

    public function listAll()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->orderBy('task_date', 'ASC')->findAll();
        return view('tasks/index', $data);
    }

    public function profile()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->first();
        return view('profile', $data);
    }

    public function about()
    {
        return view('about');
    }
}