@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siswa Ikut Ekskul') }}</div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{route('extracurricular-student.store')}}" method="post" class="px-4 py-4">
                        @csrf
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Murid</label>
                            <select class="form-select" aria-label="Default select example" name="student_id">
                                <option value="">Pilih Murid</option>
                                @foreach ($students as $item)
                                <option value="{{ $item->id }}">{{ $item->firstname.' '.$item->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="extracurricular_id" class="form-label">Ekskul</label>
                            <select class="form-select" aria-label="Default select example" name="extracurricular_id">
                                <option value="">Pilih Ekskul</option>
                                @foreach ($extracurriculars as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_bergabung" class="form-label">Tahun Gabung</label>
                            <input type="text" class="form-control" id="tahun_bergabung" name="tahun_bergabung">
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
