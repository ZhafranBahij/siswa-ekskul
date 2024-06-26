@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siswa') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('student.create') }}">Tambah Siswa</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Action</th>
                            <th scope="col">Nama Depan</th>
                            <th scope="col">Nama Belakang</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $item)
                                <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                    <a href="{{ route('student.edit', $item->id) }}" >
                                        Edit
                                    </a>
                                    <form action="{{ route('student.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $item->firstname }}</td>
                                <td>{{ $item->lastname }}</td>
                                <td>{{ $item->hp }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->gender }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
