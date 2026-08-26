<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
class HabitsController extends Controller

{

     use AuthorizesRequests;

    public function create(): View{
        return view('habits.create');
    }

    public function store(HabitRequest $request){
        $validated = $request->validated();
        Auth::user()->habits()->create($validated);

        return redirect(route('site.dashboard'))->with('success', 'Hábito criado com sucesso!');
    }

    public function destroy(Habit $habit){

            $this->authorize('delete', $habit);

        $habit->delete();

        return redirect(route('site.dashboard'))->with('success', 'Hábito deletado com sucesso!');
    }

    public function edit(Habit $habit): View{
        // if($habit->user_id !== Auth::user()->id){
        //     abort(403, "Este hábito não é seu!");
        // }
        

        $this->authorize('update', $habit);



        return view('habits.edit', compact('habit'));
    }

    public function update(Habit $habit, HabitRequest $request){
        $validated = $request->validated();

                $this->authorize('update', $habit);

        $habit->update($validated);

        return redirect(route('site.dashboard'))->with('success', 'Hábito atualizado com sucesso!');
    }

    public function history(): View{
        $habits = auth()->user()->habits;

        return view('habits.history', compact('habits'));
    }

    public function check(Habit $habit){
        $this->authorize('update', $habit);

        $today = Carbon::today()->toDateString();
        
        $log =  HabitLog::query()->where('habit_id', $habit->id)->whereDate('completed_at', $today)->first();

        if($log){
            $log->delete();

            return redirect(route('site.dashboard'))->with('success', 'Hábito desmarcado com sucesso!');
        }
        
        HabitLog::create([
            'user_id' => Auth::user()->id,
            'habit_id' => $habit->id,
            'completed_at' => $today,
        ]);

        return redirect(route('site.dashboard'))->with('success', 'Hábito marcado com sucesso!');
    }

    
    
}
