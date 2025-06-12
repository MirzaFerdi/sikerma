@extends('layouts.main')

@section('title', 'IA PKS')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">IA PKS</h3>
                        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal"
                            data-target="#tambahModal">
                            Tambah IA PKS
                        </button>
                    </div>

                    <!-- Modal Tambah IA PKS -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
                        aria-labelledby="tambahModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalLabel">Tambah IA PKS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('ia-pks.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id_dudi">DUDI</label>
                                            <select name="id_dudi" id="id_dudi" class="form-control select2" required>
                                                <option hidden value="">Pilih DUDI</option>
                                                @foreach ($iaPks as $ia)
                                                    <option value="{{ $ia->dudi->id }}">{{ $ia->dudi->nama_dudi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_dokumen">No Dokumen</label>
                                            <input type="text" name="no_dokumen" id="no_dokumen" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_dokumen">Jenis Dokumen</label>
                                            <select name="jenis_dokumen" id="jenis_dokumen" class="form-control" required>
                                                <option hidden value="">Pilih Jenis Dokumen</option>
                                                <option value="IA">IA</option>
                                                <option value="PKS">PKS</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kategori">Jenis Kategori</label>
                                            <select name="jenis_kategori" id="jenis_kategori" class="form-control" required>
                                                <option hidden value="">Pilih Jenis Kategori</option>
                                                <option value="Industri">Industri</option>
                                                <option value="Magang">Magang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul_dokumen">Judul Dokumen</label>
                                            <input type="text" name="judul_dokumen" id="judul_dokumen"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_pks">File PKS</label>
                                            <div class="custom-file">
                                                <input type="file" name="file_pks" id="file_pks"
                                                    class="custom-file-input" accept=".pdf,.doc,.docx" required>
                                                <label class="custom-file-label" for="file_pks">Pilih file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                            <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                                class="form-control" required>
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
                                    <th>Nama DUDI</th>
                                    <th>No Dokumen</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Jenis Kategori</th>
                                    <th>Judul Dokumen</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>File PKS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iaPks as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->dudi->nama_dudi }}</td>
                                        <td>{{ $p->no_dokumen }}</td>
                                        <td>{{ $p->jenis_dokumen }}</td>
                                        <td>{{ $p->jenis_kategori }}</td>
                                        <td>{{ $p->judul_dokumen }}</td>
                                        <td>{{ $p->tanggal_mulai->format('d-m-Y') }}</td>
                                        <td>{{ $p->tanggal_selesai->format('d-m-Y') }}</td>
                                        <td>
                                            @if ($p->file_pks)
                                                <a href="{{ asset('storage/file/ia_pks/' . $p->file_pks) }}"
                                                    target="_blank">Lihat
                                                    File</a>
                                            @else
                                                Tidak ada file
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#editModal{{ $p->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('ia-pks.destroy', $p->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit IA PKS -->
                                    <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editModalLabel{{ $p->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $p->id }}">Edit
                                                        IA PKS</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('ia-pks.update', $p->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="id_dudi">DUDI</label>
                                                            <select name="id_dudi" id="id_dudi"
                                                                class="form-control select2" required>
                                                                <option hidden value="">Pilih DUDI</option>
                                                                @foreach ($iaPks as $ia)
                                                                    <option value="{{ $ia->dudi->id }}"
                                                                        {{ $p->dudi->id == $ia->dudi->id ? 'selected' : '' }}>
                                                                        {{ $ia->dudi->nama_dudi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_dokumen">No Dokumen</label>
                                                            <input type="text" name="no_dokumen" id="no_dokumen"
                                                                class="form-control" value="{{ $p->no_dokumen }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_dokumen">Jenis Dokumen</label>
                                                            <select name="jenis_dokumen" id="jenis_dokumen"
                                                                class="form-control" required>
                                                                <option hidden value="">Pilih Jenis Dokumen</option>
                                                                <option value="IA"
                                                                    {{ $p->jenis_dokumen == 'IA' ? 'selected' : '' }}>IA
                                                                </option>
                                                                <option value="PKS"
                                                                    {{ $p->jenis_dokumen == 'PKS' ? 'selected' : '' }}>PKS
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_kategori">Jenis Kategori</label>
                                                            <select name="jenis_kategori" id="jenis_kategori"
                                                                class="form-control" required>
                                                                <option hidden value="">Pilih Jenis Kategori</option>
                                                                <option value="Industri"
                                                                    {{ $p->jenis_kategori == 'Industri' ? 'selected' : '' }}>
                                                                    Industri</option>
                                                                <option value="Magang"
                                                                    {{ $p->jenis_kategori == 'Magang' ? 'selected' : '' }}>
                                                                    Magang</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="judul_dokumen">Judul Dokumen</label>
                                                            <input type="text" name="judul_dokumen" id="judul_dokumen"
                                                                class="form-control" value="{{ $p->judul_dokumen }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="file_pks">File PKS</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="file_pks" id="file_pks"
                                                                    class="custom-file-input" accept=".pdf,.doc,.docx">
                                                                <label class="custom-file-label" for="file_pks">Pilih
                                                                    file</label>
                                                            </div>
                                                            <small class="form-text text-muted">Biarkan kosong jika tidak
                                                                ingin mengubah file.</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                                class="form-control"
                                                                value="{{ $p->tanggal_mulai->format('Y-m-d') }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                                            <input type="date" name="tanggal_selesai"
                                                                id="tanggal_selesai" class="form-control"
                                                                value="{{ $p->tanggal_selesai->format('Y-m-d') }}"
                                                                required>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
