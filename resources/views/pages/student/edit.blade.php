@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siswa') }}</div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{route('student.update', $student->id)}}" method="post" class="px-4 py-4">
                        @csrf
                        @method('PUT')
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $student->firstname }}">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $student->lastname }}">
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="hp" name="hp" value="{{ $student->hp }}">
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="{{ $student->nis }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="gender" value="{{ $student->gender }}">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
