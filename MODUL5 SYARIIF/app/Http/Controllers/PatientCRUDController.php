<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class PatientCRUDController extends Controller
{
    // patient page
    public function index()
    {
        $patient = Patient::all();

        return view('patient', ['title' => 'Patient'], ['patient' => $patient]);
    }

    // updatepatient page
    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('updatepatient', ['title' => 'Patient'], ['patient' => $patient]);
    }

    // selectvaccine page
    public function selectVaccine()
    {
        $vaccine = Vaccine::all();

        return view('selectvaccine', [
            'title' => 'Patient'
        ], compact('vaccine'));
    }

    // registervaccine page
    public function registerVaccine($id)
    {
        $vaccine = Vaccine::find($id);

        return view('registervaccine', ['title' => 'Patient'], ['vaccine' => $vaccine]);
    }

    // insertdata dari registervaccine
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vaccine_id' => 'required',
            'name' => 'required|max:255',
            'nik' => 'required',
            'alamat' => 'required|max:255',
            'no_hp' => 'required',
            'image_ktp' => 'image|file'
        ]);

        $validatedData['image_ktp'] = $request->file('image_ktp')->store('post-images-register');

        Patient::create($validatedData);
        return redirect('/Patient')->with('success', 'Vaksin Berhasil Ditambahkan!');
        
    }


    // update data register vaccine
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'vaccine_id' => 'required',
            'name' => 'required|max:255',
            'nik' => 'required',
            'alamat' => 'required|max:255',
            'no_hp' => 'required',
            'image_ktp' => 'image|file'
        ]);

        $validatedData['image_ktp'] = $request->file('image_ktp')->store('post-images-register');
        
        $data = Patient::find($id);
        $data->vaccine_id = $request->vaccine_id;
        $data->name = $request->name;
        $data->nik = $request->nik;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->image_ktp = $validatedData['image_ktp'];
        $data->save();

        return redirect('/Patient')->with('success', 'Data Pasien Berhasil Diupdate!');
    }

    // delete data patient
    public function destroy(Request $request)
    {   
        $patient = Patient::find($request->id);
        $patient->delete();
        
        return redirect('/Patient')->with('success', 'Pasien Berhasil Dihapus!');
    }
}