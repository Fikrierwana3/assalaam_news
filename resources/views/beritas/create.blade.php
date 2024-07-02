@extends('auth.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Data Product</div>
                <div class="card-body">
                    <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Cover Berita</label>
                            <input type="file" class="form-control" name="cover">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Pengguna</label>
                            <select class="form-control" name="id_user">
                                @foreach ($user as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Pengguna</label>
                            <select class="form-control" name="id_kategori">
                                @foreach ($kategori as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Isi Berita</label>
                            <input type="text" class="form-control" name="isi">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{url('berita')}}" class="btn btn-primary mt-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection