<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use Illuminate\Contracts\View\View;

class HabitsController extends Controller
{
    public function create(): View{
        return view('habits.create');
    }

    public function store(HabitRequest $request){
        $validated = $request->validated();
        auth()->user()->habits()->create($validated);

        return redirect(route('site.dashboard'))->with('success', 'Hábito criado com sucesso!');
    }

    public function destroy(Habit $habit){

        if($habit->user_id !== auth()->user()->id){
            abort(403, "Este hábito não é seu!");
        }

        $habit->delete();

        return redirect(route('site.dashboard'))->with('success', 'Hábito deletado com sucesso!');
    }

    public function edit(Habit $habit): View{
        if($habit->user_id !== auth()->user()->id){
            abort(403, "Este hábito não é seu!");
        }

        return view('habits.edit', compact('habit'));
    }

    public function update(Habit $habit, HabitRequest $request){
        $validated = $request->validated();
        $habit->update($validated);

        return redirect(route('site.dashboard'))->with('success', 'Hábito atualizado com sucesso!');
    }
    
}
