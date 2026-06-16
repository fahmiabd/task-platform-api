<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class GetTaskDetailController extends Controller
{
    public function __invoke(
        string $id
    ) {
        $task = Task::findOrFail($id);

        return response()->json([
            'id' => $task->id,
            'type' => $task->type,
            'payload' => $task->payload,
            'status' => $task->status,
            'started_at' => $task->started_at,
            'completed_at' => $task->completed_at,
            'retry_count' => $task->retry_count,
        ]);
    }
}