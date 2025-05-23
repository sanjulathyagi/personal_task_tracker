<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;
use App\Repositories\GoalRepositoryInterface;

class GoalController extends Controller
{
    protected $goalRepo;

    public function __construct(GoalRepositoryInterface $goalRepo)
    {
        $this->middleware('auth:sanctum'); // Protect routes
        $this->goalRepo = $goalRepo;
    }

    public function index()
    {
        return response()->json($this->goalRepo->allWithTasks());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            
        ]);

        $data['user_id'] = auth()->id();

        $goal = $this->goalRepo->create($data);

        return response()->json($goal, 201);
    }
    public function destroy(Goal $goal)
{
    $goal->delete();
    return response()->json(['message' => 'Goal deleted successfully.']);
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
    ]);

   $goal = Goal::find($id);
if (!$goal) {
    return response()->json(['error' => 'Goal not found'], 404);
}

    $goal->update($validated);

    return response()->json($goal);
}


}
