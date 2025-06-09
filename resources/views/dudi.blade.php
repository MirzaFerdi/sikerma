@extends('layouts.main')

@section('title', 'Dudi')

@section('content')
    <div class="container-fluid">
        {{-- <h3>Daftar Dudi</h3> --}}
        <div class="card">
            <div class="card-header">
                <h4>Daftar Dudi</h4>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDudiModal">
                        <i class="fas fa-plus"></i> Tambah Dudi
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tambahDudiModal" tabindex="-1" role="dialog" aria-labelledby="tambahDudiModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form action="#" method="POST">
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
                            <input type="text" class="form-control" id="nama_dudi" name="nama_dudi" required>
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                          </div>
                          <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                          </div>
                          <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
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
                            <th>Status Validasi</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
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
                                <td>{{ $dudi->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    @if ($dudi->status_validasi)
                                        <span class="badge bg-success">Accepted</span>
                                    @elseif($dudi->status_validasi)
                                        <span class="badge bg-danger">Requested</span>
                                    @else
                                        <span class="badge bg-warning">Requestes</span>
                                    @endif
                                </td>
                                <td>{{ $dudi->catatan }}</td>
                                <td>
                                    {{-- <a href="{{ route('dudi.edit', $dudi->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('dudi.destroy', $dudi->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus dudi ini?')">Hapus</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
