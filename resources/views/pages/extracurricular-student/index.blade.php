@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siswa Ikut Ekskul') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('extracurricular-student.create') }}">Tambah Siswa Ikut Ekskul</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Action</th>
                            <th scope="col">Siswa</th>
                            <th scope="col">Ekskul</th>
                            <th scope="col">Bergabung</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                                <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                    <a href="{{ route('extracurricular-student.edit', $item->id) }}" >
                                        Edit
                                    </a>
                                    <form action="{{ route('extracurricular-student.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $item->student->firstname ?? '-' }}</td>
                                <td>{{ $item->extracurricular->name ?? '-' }}</td>
                                <td>{{ $item->tahun_bergabung }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
