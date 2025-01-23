<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //1. Pido al modelo que busque todos los animales en la BD
        $animals = Animal::all(); //Recibe todos los animal de la base de datos
       //creo una vista con dichos animales
       return view('animal.index', compact('animals')); //Muestra la vista index y le pasa los datos
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //Suministramos una vista con una fomulario en blanco de creación
        return view('animal.create'); //Muestra la vista (formulario)
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Animal::create($request->all());
        return redirect()->route('animal.index')
        ->with('success', 'Animal actualizado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {

        return view("animal.show", compact("animal"));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animal.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //1. Pido al modelo que actualice el animal en la BD
        $animal->update($request->all());
        //2. Redirecciono a la vista de index
        return redirect()->route('animal.index')
        ->with('success', 'Animal actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //1. Pido al modelo que elimine el animal de la BD
        $animal->delete();
        
        //2. Redirecciono a la vista de index
        return redirect()->route('animal.index')
        ->with('success', 'Animal eliminado con exito');
        
    }
}