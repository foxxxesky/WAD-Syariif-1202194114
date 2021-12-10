@extends('layouts.main')

@section('Content')
<div class="container pt-5 pb-5">
    <div class="row justify-content-center">
        <h4 class="text-center">Input Vaccine</h4>
        <div class="col-10">
            <form action="/Inputvaccine" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Vaccine Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Vaccine Name</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                </div>

                <!-- Price -->
                <label for="product_name" class="form-label">Price</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" id="price" name="price" required value="{{ old('price') }}">

                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('desccription') is-invalid @enderror" id="description"
                        name="description" rows="3" required></textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- File Input -->
                <div class="mb-3">
                    <label for="img_path" class="form-label">Image</label>
                    <input class="form-control" type="file" id="img_path" name="img_path">
                </div>

                <!-- Button -->
                <div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection