@extends('layouts.app')
{{-- @extends('header') --}}

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Master BUKU</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('buku.create') }}"> Create Buku</a>
            </div>
        </div>
    </div>
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Harga</th>
                <th>Thumbnail</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $bk)
                <tr>
                    <td>{{ $bk->id }}</td>
                    <td>{{ $bk->judul }}</td>
                    <td>{{ $bk->harga }}</td>
                    <td>{{ $bk->thumbnail }}</td>
                    <td>
                        {{-- <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {{-- {!! $companies->links() !!} --}}
</div>
@endsection