<!-- Modal -->
<div class="modal fade" id="editpengguna{{ $list->id }}" tabindex="-1" aria-labelledby="editpengguna"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/update_petugas/{{ $list->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengguna</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pengguna/Petugas</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Contoh : Joko" value="{{ $list->nama }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Contoh : Joko@gmail.com" value="{{ $list->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Contoh : Bandung" value="{{ $list->alamat }}">
                    </div>

                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" id="umur" name="umur"
                            placeholder="Contoh : 20" value="{{ $list->umur }}">
                    </div>

                    <div class="mb-3">
                        <label for="notelepon" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="notelepon" name="no_telp"
                            placeholder="Contoh : 08123456789" value="{{ $list->no_telp }}">
                    </div>

                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" id="jk">
                            <option value="Laki-laki" {{ $list->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ $list->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password"
                            placeholder="Contoh : admin123">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
