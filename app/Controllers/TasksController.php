<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TasksController extends BaseController
{
    private function taskRules(): array
    {
        return [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]',
        ];
    }

    public function index()
    {
        $taskModel = new TaskModel();
        return view('welcome_message', ['tasks' => $taskModel->getTodaysTasks()]);
    }

    public function listAll()
    {
        $taskModel = new TaskModel();
        return view('tasks/index', ['tasks' => $taskModel->getActiveTasks()]);
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

    public function newTask()
    {
        return view('tasks/form', [
            'pageTitle' => 'Add New Task',
            'formAction' => site_url('tasks/create'),
            'task' => ['title' => '', 'task_date' => date('Y-m-d'), 'status' => 'pending'],
            'errors' => [],
        ]);
    }

    public function create()
    {
        if (!$this->validate($this->taskRules())) {
            return view('tasks/form', [
                'pageTitle' => 'Add New Task',
                'formAction' => site_url('tasks/create'),
                'task' => [
                    'title' => (string) old('title'),
                    'task_date' => (string) old('task_date'),
                    'status' => (string) old('status', 'pending'),
                ],
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $taskModel = new TaskModel();
        $taskModel->insert([
            'title' => trim((string) $this->request->getPost('title')),
            'task_date' => (string) $this->request->getPost('task_date'),
            'status' => (string) $this->request->getPost('status'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created successfully.');
    }

    public function edit(int $id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('is_archived', 0)->find($id);

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks/form', [
            'pageTitle' => 'Edit Task',
            'formAction' => site_url('tasks/' . $id . '/update'),
            'task' => $task,
            'errors' => [],
        ]);
    }

    public function update(int $id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('is_archived', 0)->find($id);

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        if (!$this->validate($this->taskRules())) {
            return view('tasks/form', [
                'pageTitle' => 'Edit Task',
                'formAction' => site_url('tasks/' . $id . '/update'),
                'task' => [
                    'id' => $id,
                    'title' => (string) old('title'),
                    'task_date' => (string) old('task_date'),
                    'status' => (string) old('status', 'pending'),
                ],
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $taskModel->update($id, [
            'title' => trim((string) $this->request->getPost('title')),
            'task_date' => (string) $this->request->getPost('task_date'),
            'status' => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully.');
    }

    public function archive(int $id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('is_archived', 0)->find($id);

        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found or already archived.');
        }

        $taskModel->update($id, ['is_archived' => 1]);
        return redirect()->to('/tasks')->with('success', 'Task archived successfully.');
    }
}
