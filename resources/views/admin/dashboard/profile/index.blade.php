@extends('layouts.admin')
@section('header')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Dashboard /</span> <b>Data Profile Panti Asuhan</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="m-3 quick-sand">
                <h3 class="card-hearder">
                    Profile Panti Asuhan Dharma Jati II
                </h3>
                <div class="card-body">
                    <form action="{{ route('profile-panti.update') }}" enctype="multipart/form-data" method="POST"
                        id="profileForm">
                        @method('PATCH')
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Nama Panti Asuhan</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data->name }}" placeholder="Nama Panti Asuhan"
                                aria-describedby="defaultFormControlHelp" />
                            <div id="nameError" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-5">
                            <label for="description" class="form-label">Deskripsi Panti Asuhan</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $data->description }}</textarea>
                            <div id="descriptionError" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-4 row px-3">
                            <div class="col-md-4 py-3 border rounded-2 border-2">
                                <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="" width="100%"
                                    height="250px" id="thumbnailImage">
                            </div>
                            <div class="col-md-8">
                                <label for="thumbnail" class="form-label">Foto Thumbnail Panti
                                    Asuhan</label>
                                <input class="form-control" type="file" id="thumbnail" name="thumbnail" />
                                <div id="thumbnailError" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <button type="button" id="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.dashboard.profile.js.index')
@endsection
