@extends('auth.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Brand</div>
                <div class="card-body">
                    <form action="{{route('berita.update', $berita->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="gambar">gambar</label>
                                @if ($berita->cover)
                                    <p><img src="{{ asset('img/berita/' . $berita->cover) }}" alt="cover" width="100px">
                                    </p>
                                @endif
                                <input type="file" name="cover"
                                    class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror

                            <label class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" name="judul" value="{{$berita->judul}}">

                            <label for="exampleInputEmail1">Pengguna</label>
                            <select class="form-control" name="id_user">
                                @foreach($user as $data)
                                    <option value="{{$data->id}}"
                                        {{$data->id == $berita->id_user ? 'selected' : ''}}>
                                        {{$data->name}}</option>
                                @endforeach
                            </select>

                            <label for="exampleInputEmail1">Kategori</label>
                            <select class="form-control" name="id_kategori">
                                @foreach($kategori as $data)
                                    <option value="{{$data->id}}"
                                        {{$data->id == $berita->id_kategori ? 'selected' : ''}}>
                                        {{$data->nama}}</option>
                                @endforeach
                            </select>
                            
                            <label class="form-label">Isi Berita</label>
                            <input type="text" class="form-control" name="isi" value="{{$berita->isi}}">

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