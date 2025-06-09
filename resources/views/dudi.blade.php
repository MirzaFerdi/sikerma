@extends('layouts.main')

@section('title', 'Dudi')

@section('content')
    <div class="container-fluid">
        @if (auth()->user()->role == 'koordinator')
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Dudi</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDudiModal">
                        <i class="fas fa-plus"></i> Tambah Dudi
                    </button>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="tambahDudiModal" tabindex="-1" role="dialog"
                        aria-labelledby="tambahDudiModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('dudi.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahDudiModalLabel">Tambah Dudi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_dudi" class="form-label">Nama Dudi</label>
                                            <input type="text" class="form-control" id="nama_dudi" name="nama_dudi"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_contact_person" class="form-label">Nama Penanggung
                                                Jawab</label>
                                            <input type="text" class="form-control" id="nama_contact_person"
                                                name="nama_contact_person" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_telp" class="form-label">No. Telp</label>
                                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="catatan" class="form-label">Catatan</label>
                                            <textarea class="form-control" id="catatan" name="catatan" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dudi</th>
                                <th>Email</th>
                                <th>No.Telp</th>
                                <th>Alamat</th>
                                <th>Tanggal Input</th>
                                <th class="text-center">Status Validasi</th>
                                <th>Catatan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dudis as $dudi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dudi->nama_dudi }}</td>
                                    <td>{{ $dudi->email }}</td>
                                    <td>{{ $dudi->no_telp }}</td>
                                    <td>{{ $dudi->alamat }}</td>
                                    <td>{{ $dudi->created_at }}</td>
                                    <td class="text-center">
                                        @if ($dudi->status == 'accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif($dudi->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-warning">Request</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dudi->catatan)
                                            {{ $dudi->catatan }}
                                        @else
                                            <span class="text-muted d-block text-center">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm" style="margin-right: 5px;"
                                                data-toggle="modal" data-target="#editDudiModal{{ $dudi->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('dudi.destroy', $dudi->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus dudi ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editDudiModal{{ $dudi->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editDudiModalLabel{{ $dudi->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('dudi.update', $dudi->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDudiModalLabel{{ $dudi->id }}">
                                                        Edit Dudi</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama_dudi" class="form-label">Nama
                                                            Dudi</label>
                                                        <input type="text" class="form-control" id="nama_dudi"
                                                            name="nama_dudi" value="{{ $dudi->nama_dudi }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_contact_person" class="form-label">Nama
                                                            Penanggung Jawab</label>
                                                        <input type="text" class="form-control"
                                                            id="nama_contact_person" name="nama_contact_person"
                                                            value="{{ $dudi->nama_contact_person }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" value="{{ $dudi->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="no_telp" class="form-label">No. Telp</label>
                                                        <input type="text" class="form-control" id="no_telp"
                                                            name="no_telp" value="{{ $dudi->no_telp }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <textarea class="form-control" id="alamat" name="alamat" rows="2" required>{{ $dudi->alamat }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="catatan" class="form-label">Catatan</label>
                                                        <textarea class="form-control" id="catatan" name="catatan" rows="2">{{ $dudi->catatan }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="return confirm('Edit akan merubah status kembali menjadi Request. Lanjutkan?')">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif(auth()->user()->role == 'admin')
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Dudi</h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dudi</th>
                                <th>Email</th>
                                <th>No.Telp</th>
                                <th>Alamat</th>
                                <th>Tanggal Input</th>
                                <th class="text-center">Status Validasi</th>
                                <th>Catatan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dudis as $dudi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dudi->nama_dudi }}</td>
                                    <td>{{ $dudi->email }}</td>
                                    <td>{{ $dudi->no_telp }}</td>
                                    <td>{{ $dudi->alamat }}</td>
                                    <td>{{ $dudi->created_at }}</td>
                                    <td class="text-center">
                                        @if ($dudi->status == 'accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif($dudi->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-warning">Request</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dudi->catatan)
                                            {{ $dudi->catatan }}
                                        @else
                                            <span class="text-muted d-block text-center">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{ route('dudi.validate', $dudi->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin memvalidasi dudi ini?');"
                                                style="margin-right: 5px;">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_validasi" value="accepted">
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i> Terima
                                                </button>
                                            </form>
                                            <form action="{{ route('dudi.validate', $dudi->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menolak dudi ini?');">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_validasi" value="rejected">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i> Tolak
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
