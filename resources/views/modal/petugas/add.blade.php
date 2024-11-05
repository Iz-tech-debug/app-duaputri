<!-- Modal -->
<div class="modal fade" id="tambahpengguna" tabindex="-1" aria-labelledby="tambahpengguna" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/tambah_petugas" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pengguna/Petugas</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Contoh : Joko">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Contoh : Joko@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Contoh : Bandung">
                    </div>

                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" id="umur" name="umur"
                            placeholder="Contoh : 20">
                    </div>

                    <div class="mb-3">
                        <label for="notelepon" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="notelepon" name="no_telp"
                            placeholder="Contoh : 08123456789">
                    </div>

                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" id="jk">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_role" class="form-label">Hak Akses</label>
                        <select name="id_role" class="form-select" id="id_role">
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_role }}</option>
                            @endforeach
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
