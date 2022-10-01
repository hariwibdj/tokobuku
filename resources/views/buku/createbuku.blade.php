@extends('layouts.app')
{{-- @extends('header') --}}

@section('content')

<div class="container mt-2">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left mb-2">
              <h2>Add Buku</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('buku.index') }}"> Back</a>
          </div>
      </div>
  </div>
  @if(session('status'))
  <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
  </div>
  @endif
  <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label for="judulbuku" class="form-label">Judul Buku:</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" id="judulbuku">
                @error('judul')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label for="hargalbuku" class="form-label">Harga Buku:</label>
                <input type="text" name="harga" class="form-control" placeholder="Harga Buku">
                @error('harga')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label for="ThumbnailBuku" class="form-label">Thumbnail Buku:</label>
                  <input class="form-control" type="file" id="formFile" name="thumbnail" id="ThumbnailBuku">
                  @error('thumbnail')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>

@endsection