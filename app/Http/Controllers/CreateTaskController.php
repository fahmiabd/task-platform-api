<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\NatsService;

class CreateTaskController extends Controller
{
    public function __invoke(
        Request $request,
        NatsService $nats
    ) {
        $task = Task::create([
            'type' => $request->type,
            'payload' => $request->payload,
            'status' => 'pending',
        ]);

        $nats->publish(
            "tasks.{$task->type}",
            [
                'task_id' => $task->id,
                'payload' => $task->payload,
            ]
        );

        return response()->json([
            'task_id' => $task->id,
        ]);
    }
}
