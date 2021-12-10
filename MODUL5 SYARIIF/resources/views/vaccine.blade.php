@extends('layouts.main')

@section('Content')
@if (count($vaccine) === 0)
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="text-center mb-3">
                <p>There is no data...</p>
                <a class="btn btn-primary" href="/Inputvaccine">Add Vaccine</a>
            </div>
        </div>
    </div>
</div>
@else
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container pt-4">
    <div class="row justify-content-center">
        <h4 class="text-center pb-3">List Vaccine</h4>
        <div class="col-10">
            <a class="btn btn-primary" href="/Inputvaccine">Add Vaccine</a>
            <div class="card-body bg-white" style="border-radius: 10px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($vaccine as $index => $vaccine)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $vaccine->name }}</td>
                            <td>{{ $vaccine->price }}</td>
                            <td style="width: 15rem;">

                                <form action="{{ route('deleteVaccine') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $vaccine->id }}" name='id'>
                                    <!-- Update Button -->
                                    <a href="{{ route('updateVaccine', $vaccine->id) }}"
                                        class="btn btn-warning">Update</a>

                                    <span>&emsp;&emsp;</span>

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Apakah Anda Ingin Menghapus {{ $vaccine->name }} dari List?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection