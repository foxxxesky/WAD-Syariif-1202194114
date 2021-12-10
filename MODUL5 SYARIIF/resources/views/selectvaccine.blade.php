@extends('layouts.main')

@section('Content')
<div class="container pt-5 pb-5">
    <h4 class="text-center pb-3">List Vaccine</h4>
    <div class="row justify-content-center">
        @foreach ($vaccine as $index => $vaccine)
        <div class="col-4">
            <div class="card">
                <img src="{{ asset('storage/' .$vaccine->img_path) }}" class="card-img-top" alt="{{ $vaccine->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $vaccine->name }}</h5>
                    <p class="card-text text-secondary">Rp {{ $vaccine->price }}</p>
                    <p class="card-text fw-light">{{ $vaccine->description }}</p>
                    <a href="{{ route('selectVaccine', $vaccine->id) }}" class="btn btn-primary"
                        style="width: 100%;">Vaccine Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection