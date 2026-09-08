<?php

namespace App\Http\Controllers\Apprentice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Academic\Apprentice;
use App\Models\Academic\Course;
use App\Models\Resource\Computer;

class PortalController extends Controller
{
    public function index(Request $request){

        $query = trim($request->query('q', ''));

        $apprentices = Apprentice::query()
            ->when($query !== '', function ($builder) use ($query) {
                $builder->where(function ($builder) use ($query) {
                    $builder->where('id', 'like', "%{$query}%")
                        ->orWhere('name_apren', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%")
                        ->orWhere('cell', 'like', "%{$query}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('apprentice.index',compact('apprentices'));

    }

    public function create (){
        $courses = Course::all();
        $computers = Computer::all();

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $apprentice = Apprentice::create($request->all());
        $file=$request->file("urlFoto");

        if ($file) {
            $nombreArchivo = "foto_".time().".".$file->guessExtension();
            $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

            $apprentice->urlFoto = $nombreArchivo;
            $apprentice->save();
        }

        return redirect()->route('apprentice.index');
    }

    public function edit(Apprentice $apprentice)
    {
        $courses = Course::all();
        $computers = Computer::all();

        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, Apprentice $apprentice)
    {
        $apprentice->update($request->all());

        return redirect()->route('apprentice.index');
    }

    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();

        return redirect()->route('apprentice.index');
    }
}
