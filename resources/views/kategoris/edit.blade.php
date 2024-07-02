@extends('auth.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Brand</div>
                <div class="card-body">
                    <form action="{{route('kategori.update', $kategori->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{url('kategori')}}" class="btn btn-primary mt-2">Back</a>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection