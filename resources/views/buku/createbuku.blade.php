@extends('layouts.app')
{{-- @extends('header') --}}

@section('content')
<form>
    <div class="mb-3">
      <label for="judul" class="form-label">Judul Buku</label>
      <input type="text" class="form-control" id="judul" aria-describedby="emailHelp">  
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection