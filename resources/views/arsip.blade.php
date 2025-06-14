@extends('layouts.main')

@section('title', 'Arsip Dokumen')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Arsip Dokumen</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dudi</th>
                                    <th>Judul Dokumen</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Jenis Kategori</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp

                                @foreach ($arsip['mou'] as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->dudi->nama_dudi }}</td>
                                        <td>{{ $item->judul_dokumen }}</td>
                                        <td>MoU</td>
                                        <td>-</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#editMouModal{{ $item->id }}">
                                                <i class="fas fa-edit"></i> Perbarui
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal MoU -->
                                    <div class="modal fade" id="editMouModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editMouModalLabel{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editMouModalLabel{{ $item->id }}">Edit
                                                        MoU
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('mou.update', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="dudi_id">Dudi</label>
                                                            <select name="dudi_id" id="dudi_id" class="form-control"
                                                                required>
                                                                <option hidden value="">Pilih Dudi</option>
                                                                @foreach ($dudis as $dudi)
                                                                    <option value="{{ $dudi->id }}"
                                                                        {{ $item->id_dudi == $dudi->id ? 'selected' : '' }}>
                                                                        {{ $dudi->nama_dudi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_mou">No. MoU</label>
                                                            <input type="text" name="no_mou" id="no_mou"
                                                                class="form-control" value="{{ $item->no_mou }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="judul_dokumen">Judul Dokumen</label>
                                                            <input type="text" name="judul_dokumen" id="judul_dokumen"
                                                                class="form-control" value="{{ $item->judul_dokumen }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>File MoU</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="file_mou"
                                                                    class="custom-file-input" id="file_mou">
                                                                <label class="custom-file-label" for="file_mou">Choose
                                                                    file</label>
                                                                @if ($item->file_mou)
                                                                    <small class="form-text text-muted">
                                                                        File saat ini: <a
                                                                            href="{{ asset('storage/file_mous/' . $item->file_mou) }}"
                                                                            target="_blank">{{ $item->file_mou }}</a>
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
                                                                value="{{ $item->tanggal_mulai->format('Y-m-d') }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                                            <input type="date" name="tanggal_selesai"
                                                                id="tanggal_selesai" class="form-control"
                                                                value="{{ $item->tanggal_selesai->format('Y-m-d') }}"
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

                                @foreach ($arsip['ia_pks'] as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->dudi->nama_dudi }}</td>
                                        <td>{{ $item->judul_dokumen }}</td>
                                        <td>{{ $item->jenis_dokumen }}</td>
                                        <td>{{ $item->jenis_kategori }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#editModal{{ $item->id }}">
                                                <i class="fas fa-edit"></i> Perbarui
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal IA dan PKS -->
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit
                                                        IA PKS</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('ia-pks.update', $item->id) }}" method="POST"
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
                                                                        {{ $item->dudi->id == $ia->dudi->id ? 'selected' : '' }}>
                                                                        {{ $ia->dudi->nama_dudi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_dokumen">No Dokumen</label>
                                                            <input type="text" name="no_dokumen" id="no_dokumen"
                                                                class="form-control" value="{{ $item->no_dokumen }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_dokumen">Jenis Dokumen</label>
                                                            <select name="jenis_dokumen" id="jenis_dokumen"
                                                                class="form-control" required>
                                                                <option hidden value="">Pilih Jenis Dokumen</option>
                                                                <option value="IA"
                                                                    {{ $item->jenis_dokumen == 'IA' ? 'selected' : '' }}>IA
                                                                </option>
                                                                <option value="PKS"
                                                                    {{ $item->jenis_dokumen == 'PKS' ? 'selected' : '' }}>PKS
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_kategori">Jenis Kategori</label>
                                                            <select name="jenis_kategori" id="jenis_kategori"
                                                                class="form-control" required>
                                                                <option hidden value="">Pilih Jenis Kategori</option>
                                                                <option value="Industri"
                                                                    {{ $item->jenis_kategori == 'Industri' ? 'selected' : '' }}>
                                                                    Industri</option>
                                                                <option value="Magang"
                                                                    {{ $item->jenis_kategori == 'Magang' ? 'selected' : '' }}>
                                                                    Magang</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="judul_dokumen">Judul Dokumen</label>
                                                            <input type="text" name="judul_dokumen" id="judul_dokumen"
                                                                class="form-control" value="{{ $item->judul_dokumen }}"
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
                                                            @if ($item->file_pks)
                                                                <small class="form-text text-muted">
                                                                    File saat ini: <a
                                                                        href="{{ asset('storage/file_ia_pks/' . $item->file_pks) }}"
                                                                        target="_blank">{{ $item->file_pks }}</a>
                                                                </small>
                                                            @else
                                                                <small class="form-text text-muted">Tidak ada file saat
                                                                    ini</small>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                                class="form-control"
                                                                value="{{ $item->tanggal_mulai->format('Y-m-d') }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                                            <input type="date" name="tanggal_selesai"
                                                                id="tanggal_selesai" class="form-control"
                                                                value="{{ $item->tanggal_selesai->format('Y-m-d') }}"
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
