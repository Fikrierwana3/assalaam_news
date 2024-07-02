@extends('auth.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong><h4>Kumpulan Berita</h4></strong>
                    <a href="{{ route('berita.create') }}" class="btn btn-primary"><small>Tambah Berita</small></a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table">        
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($berita as $data)
                            <tr align="center">
                            <td scope="row">
                                <img src="{{asset('/img/berita/' . $data->cover)}}" width="70">
                            </td>
                            <td style="text-align: left">{{ $data->judul }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->kategori->nama }}</td>
                            <td style="text-align: left">{{ Str::limit($data->isi, 80) }}</td>
                            <td>
                            <form action="{{route('berita.destroy', $data->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <td align="center">
                                    <div class="dropdown mt-2">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('berita.edit', $data->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <button href="{{ route('berita.destroy', $data->id) }}" class="dropdown-item"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bx bx-trash-alt me-1"></i>
                                                Delete</button>
                                        </div>
                                    </div>  
                                </td>
                                </form>
                            </td>
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