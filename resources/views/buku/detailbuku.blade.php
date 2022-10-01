@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Show Buku</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('buku.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;text-align: center;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong><br>
                {{ $buku->id }}
            </div>
        </div>
    
        <div class="row" style="margin-top: 20px;text-align: center;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul:</strong><br>
                {{ $buku->judul }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
            <div class="form-group">
                <strong>harga:</strong><br>
                {{ $buku->harga }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
            <div class="form-group">
                <strong>Image:</strong><br>
                <img src="/images/{{ $buku->thumbnail }}" width="200px">
            </div>
        </div>
    </div>
@endsection
