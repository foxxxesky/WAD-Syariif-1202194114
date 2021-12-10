<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineCRUDController extends Controller
{
    // vaccine page
    public function index()
    {
        $vaccine = Vaccine::all();

        return view('vaccine', ['title' => 'Vaccine'], ['vaccine' => $vaccine]);
    }

    // input vaccine page
    public function inputVaccine()
    {
        return view('inputvaccine', ['title' => 'Vaccine']);
    }

    // insert data vaccine
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|min:10|max:550',
            'img_path' => 'image|file'
        ]);

        $validatedData['img_path'] = $request->file('img_path')->store('post-images');

        Vaccine::create($validatedData);
        return redirect('/Vaccine')->with('success', 'Vaksin Berhasil Ditambahkan!');
        
    }

    // updatevaccine page
    public function edit($id)
    {
        $vaccine = Vaccine::find($id);

        return view('updatevaccine', ['title' => 'Vaccine'], ['vaccine' => $vaccine]);
    }

    // update data vaccine
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|min:10|max:550',
            'img_path' => 'image|file'
        ]);

        $validatedData['img_path'] = $request->file('img_path')->store('post-images');
        
        $data = Vaccine::find($id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->img_path = $validatedData['img_path'];
        $data->save();

        return redirect('/Vaccine')->with('success', 'Vaksin Berhasil Diupdate!');
    }

    // delete data vaccine
    public function destroy(Request $request)
    {   
        $vaccine = Vaccine::find($request->id);
        $vaccine->delete();
        
        return redirect('/Vaccine')->with('success', 'Vaksin Berhasil Dihapus!');
    }
}