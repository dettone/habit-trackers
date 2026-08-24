<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
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


    
}
