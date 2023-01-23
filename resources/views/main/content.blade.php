@extends('main.index')

@push('css')
    <style>
        body {
            background-color: #eee;
        }

        .card:hover {
            cursor: pointer;
            background-color: #eee;
        }

        .done {
            background-color: darkorchid;
        }

        .icon:hover {
            background-color: transparent;
        }
    </style>
@endpush

@section('content')

    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="col-12 col-sm-8 col-md-12">
                <form action="{{ url('search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="cari tugas ..." name="keyword"
                            value="{{ request('keyword') }}">
                        <button class="input-group-text btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col text-end">
            {{-- <a class="btn btn-secondary" href="{{ url('/') }}">Home</a> --}}

            <button class="btn btn-success text-white mx-auto" type="button" id="button-addon2" data-bs-toggle="modal"
                data-bs-target="#createModal">Tambah Tugas</button>

            {{-- <a class="btn btn-danger" href="{{ url('logout') }}">Logout</a> --}}
        </div>
    </div>



    <div class="input-group mb-3 my-4">
        {{-- <input type="text" class="form-control" placeholder="cari tugas ..." aria-label="Recipient's username"
            aria-describedby="button-addon2"> --}}
        {{-- <button class="btn btn-secondary btn-sm text-white" type="button" id="button-addon2" data-bs-toggle="modal"
            data-bs-target="#createModal">Tambah Tugas</button> --}}

        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button> --}}
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @includeIf('component.create')
    @includeIf('component.edit')
    @includeIf('component.delete')
    @includeIf('component.check')
    @includeIf('component.restore')

    @if ($todos->count())
        {{-- card --}}
        @foreach ($todos as $todo)
            <div class="list" id="container-list">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if ($todo->status == '0')
                                    <b>{{ $todo->name }}</b>
                                    {{-- <sup class="text-white badge text-bg-info mx-1">proses</sup> --}}
                                @else
                                    <b class="text-decoration-line-through fst-italic">{{ $todo->name }}</b><sup
                                        class="text-white badge text-bg-success mx-1">selesai</sup>
                                @endif
                            </div>
                            <div class="col-md-6 text-end">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    @if ($todo->status == '0')
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#checkModal{{ $todo->id }}"><i
                                                class="fa-solid fa-check"></i></button>

                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $todo->id }}"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $todo->id }}"><i
                                                class="fa-solid fa-trash"></i></button>
                                    @else
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#restoreModal{{ $todo->id }}"><i
                                                class="fa-solid fa-plus"></i></button>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $todo->id }}"><i
                                                class="fa-solid fa-trash"></i></button>
                                    @endif

                                    {{-- contoh link untuk delete data dari WPU --}}
                                    {{-- <form action="/dashboard/posts{{ $todo->id }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you sure?')"><span
                                                data-feather="x-circle"></span></button>
                                    </form> --}}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{-- {{ $todo->status }} --}}
                                {{-- <br> --}}
                                <p>dibuat : {{ $todo->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center text-capitalize fs-4"><b>tidak ditemukan!</b></p>
    @endif

@endsection
