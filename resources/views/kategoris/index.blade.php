@extends('auth.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong><h4>Kumpulan Kategori</h4></strong>
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary"><small>Tambah Kategori</small></a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Kategori</th>
                        <th scope="col" style="text-align: left">jumlah Berita</th>
                        <th scope="col" style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kategori as $data)
                            <tr>
                            <td scope="row"><strong><h5>{{ $data->nama }}</h5></strong>
                                <p><small>{{$data->deskripsi}}</small></p>
                            </td> 
                            <td><button disabled="disabled" class="btn btn-primary mt-2">{{$totberita}} + Berita Tersedia</button></td>
                            <form action="{{route('kategori.destroy', $data->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td align="center">
                                    <div class="dropdown mt-3">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('kategori.edit', $data->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <button href="{{ route('kategori.destroy', $data->id) }}" class="dropdown-item"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bx bx-trash-alt me-1"></i>
                                                Delete</button>
                                        </div>
                                    </div>  
                                </td>
                            </form>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection