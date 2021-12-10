@extends('layouts.main')

@section('Content')
<div class="container pt-5 pb-5">
    <div class="row justify-content-center">
        <h4 class="text-center">Update Patient {{ $patient->name }}</h4>
        <div class="col-10">
            <form action="{{ route('updatePatient', $patient->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Vaccine id -->
                <div class="mb-3">
                    <label for="vaccine_id" class="form-label">Vaccine id</label>
                    <input type="text" class="form-control" id="vaccine_id" name="vaccine_id"
                        value="{{ $patient->vaccine_id }}" readonly>
                </div>

                <!-- Patient name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Petient Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name',$patient->name) }}" required>
                </div>

                <!-- NIK -->
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik',$patient->nik) }}"
                        required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="{{ old('alamat',$patient->alamat) }}" required>
                </div>

                <!-- File Input -->
                <div class="mb-3">
                    <label for="ktp" class="form-label">KTP</label>
                    <input class="form-control" type="file" id="image_ktp" name="image_ktp"
                        value="{{ old('image_ktp',$patient->image_ktp) }}" required>
                </div>

                <!-- No HP -->
                <div class="mb-3">
                    <label for="nohp" class="form-label">No Hp</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                        value="{{ old('no_hp',$patient->no_hp) }}" required>
                </div>

                <!-- Button -->
                <div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection