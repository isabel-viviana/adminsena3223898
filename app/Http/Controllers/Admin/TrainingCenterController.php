<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog\TrainingCenter;

class TrainingCenterController extends Controller
{
    public function index(Request $request){

        $query = trim($request->query('q', ''));

        $trainingCenters = TrainingCenter::query()
            ->when($query !== '', function ($builder) use ($query) {
                $builder->where(function ($builder) use ($query) {
                    $builder->where('name', 'like', "%{$query}%")
                        ->orWhere('location', 'like', "%{$query}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('trainingCenter.index',compact('trainingCenters'));

    }

    public function create (){

        return view('trainingCenter.create');

    }

    public function store(Request $request){
        $trainingCenter = TrainingCenter::create([
            'name' => $request->name,
            'location' => $request->location
        ]);
        return redirect()->route('trainingCenter.index');
    }

    public function edit(TrainingCenter $trainingCenter)
    {
        return view('trainingCenter.edit', compact('trainingCenter'));
    }

    public function update(Request $request, TrainingCenter $trainingCenter)
    {
        $trainingCenter->update([
            'name' => $request->name,
            'location' => $request->location
        ]);

        return redirect()->route('trainingCenter.index');
    }

    public function destroy(TrainingCenter $trainingCenter)
    {
        $trainingCenter->delete();

        return redirect()->route('trainingCenter.index');
    }
}
