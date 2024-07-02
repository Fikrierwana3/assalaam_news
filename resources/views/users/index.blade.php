@extends('auth.home')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong><h4>Kumpulan Pengguna</h4></strong>
                    <a href="{{ route('users.create') }}" class="btn btn-primary"><small>Tambah User</small></a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table">
                    <tbody align="center">
                    @foreach ($user as $data)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->is_admin ? 'Admin' : 'User' }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <td align="center">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('users.edit', $data->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <button href="{{ route('users.destroy', $data->id) }}" class="dropdown-item"
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