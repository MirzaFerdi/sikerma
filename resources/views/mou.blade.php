@extends('layouts.main')

@section('title', 'MoU')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar MoU</h4>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                    data-target="#addMouModal">
                    <i class="fas fa-plus"></i> Tambah MoU
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addMouModal" tabindex="-1" role="dialog" aria-labelledby="addMouModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMouModalLabel">Tambah MoU</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('mou.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="dudi_id">Dudi</label>
                                    <select name="dudi_id" id="dudi_id" class="form-control" required>
                                        <option hidden value="">Pilih Dudi</option>
                                        @foreach ($dudis as $dudi)
                                            <option value="{{ $dudi->id }}">{{ $dudi->nama_dudi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_mou">No. MoU</label>
                                    <input type="text" name="no_mou" id="no_mou" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="judul_dokumen">Judul Dokumen</label>
                                    <input type="text" name="judul_dokumen" id="judul_dokumen" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>File MoU</label>
                                    <div class="custom-file">
                                        <input type="file" name="file_mou" class="custom-file-input" id="file_mou">
                                        <label class="custom-file-label" for="file_mou">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dudi</th>
                            <th>No. MoU</th>
                            <th>Judul Dokumen</th>
                            <th>File MoU</th>
                            <th>Tgl. Mulai</th>
                            <th>Tgl. Selesai</th>
                            <th class="text-center">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mous as $mou)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mou->dudi->nama_dudi }}</td>
                                <td>{{ $mou->no_mou }}</td>
                                <td>{{ $mou->judul_dokumen }}</td>
                                <td>
                                    @if ($mou->file_mou)
                                        <a href="{{ asset('storage/file/mou/' . $mou->file_mou) }}" target="_blank">
                                            Lihat File
                                        </a>
                                    @else
                                        Tidak ada file
                                    @endif
                                <td>{{ $mou->tanggal_mulai->format('d-m-Y') }}</td>
                                <td>{{ $mou->tanggal_selesai->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" style="margin-right: 5px;" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#editMouModal{{ $mou->id }}">
                                            <i class="fas fa-edit"></i>Edit MoU
                                        </button>
                                        <form action="{{ route('mou.destroy', $mou->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus MoU ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editMouModal{{ $mou->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editMouModalLabel{{ $mou->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editMouModalLabel{{ $mou->id }}">Edit MoU
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('mou.update', $mou->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="dudi_id">Dudi</label>
                                                    <select name="dudi_id" id="dudi_id" class="form-control" required>
                                                        <option hidden value="">Pilih Dudi</option>
                                                        @foreach ($dudis as $dudi)
                                                            <option value="{{ $dudi->id }}"
                                                                {{ $mou->dudi_id == $dudi->id ? 'selected' : '' }}>
                                                                {{ $dudi->nama_dudi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_mou">No. MoU</label>
                                                    <input type="text" name="no_mou" id="no_mou"
                                                        class="form-control" value="{{ $mou->no_mou }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="judul_dokumen">Judul Dokumen</label>
                                                    <input type="text" name="judul_dokumen" id="judul_dokumen"
                                                        class="form-control" value="{{ $mou->judul_dokumen }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>File MoU</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="file_mou" class="custom-file-input"
                                                            id="file_mou">
                                                        <label class="custom-file-label" for="file_mou">Pilih
                                                            file</label>
                                                        @if ($mou->file_mou)
                                                            <small class="form-text text-muted">
                                                                File saat ini: <a
                                                                    href="{{ asset('storage/file/mou/' . $mou->file_mou) }}"
                                                                    target="_blank">{{ $mou->file_mou }}</a>
                                                            </small>
                                                        @else
                                                            <small class="form-text text-muted">Tidak ada file saat
                                                                ini</small>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                        class="form-control"
                                                        value="{{ $mou->tanggal_mulai->format('Y-m-d') }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                                        class="form-control"
                                                        value="{{ $mou->tanggal_selesai->format('Y-m-d') }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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
    </div>
@endsection
