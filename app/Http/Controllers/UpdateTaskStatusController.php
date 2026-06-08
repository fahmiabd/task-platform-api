<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class UpdateTaskStatusController extends Controller
{
    public function __invoke(
        Request $request,
        string $id
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:pending,processing,completed,failed',
            ],
        ]);

        $task = Task::findOrFail($id);

        $task->status = $validated['status'];

        if ($validated['status'] === 'processing') {
            $task->started_at = now();
        }

        if ($validated['status'] === 'completed') {
            $task->completed_at = now();
        }

        $task->save();

        return response()->json([
            'id' => $task->id,
            'status' => $task->status,
        ]);
    }
}