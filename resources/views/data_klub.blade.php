@extends('component.main')

@push('css')
    <style>
        .btn-close{
            background-color: #fff !important;
            border: none;
        }

        label.error {
            color: #F94687;
            font-size: 13px;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            margin-top: 5px;
            padding: 0;
        }
    
        input.error {
            color: #F94687 !important;
            border: 1px solid #F94687;
        }
    </style>
@endpush

@section('content')
<div class="px-4 pt-4 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">List Klub Sepakbola</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Berikut adalah list klub sepakbola legenda yang telah menciptakan sejarah panjang dalam dunia sepakbola. Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quae, assumenda ullam ratione suscipit excepturi quisquam! Accusantium eos soluta aliquid?</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" data-bs-toggle="modal" data-bs-target="#tambahKlub">Tambah Klub Baru</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4" data-bs-toggle="modal" data-bs-target="#lihatKlub">Lihat List Klub</button>
        </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
        <img src="{{ asset('images/heroes.jpg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
        </div>
    </div>
</div>

{{-- Modal Tambah klub --}}
<div class="modal fade" id="tambahKlub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #0d6efd !important">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Klub Baru <img src="{{ asset('images/ex-logo.png') }}" width="20" height="20" alt=""></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('tambah-klub') }}" method="POST" id="formTambahKlub">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="namaKlub" class="form-label">Nama Klub</label>
                <input type="text" class="form-control" id="namaKlub" name="nama_klub" placeholder="Masukkan Nama Klub...">
            </div>
            <div class="mb-3">
                <label for="asalWilayahKlub" class="form-label">Asal Wilayah Klub</label>
                <input type="text" class="form-control" id="asalWilayahKlub" name="asal_wilayah" placeholder="Masukkan Asal Wilayah Klub...">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>

{{-- Modal Lihat klub --}}
<div class="modal fade" id="lihatKlub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #0d6efd !important">
            <h1 class="modal-title fs-5" id="exampleModalLabel">List Klub Tersedia <img src="{{ asset('images/ex-logo2.png') }}" width="20" height="20" alt=""></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Klub</th>
                        <th scope="col">Asal Wilayah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klubs as $klub)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $klub->nama_klub }}</td>
                        <td>{{ $klub->asal_wilayah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    {{-- Validasi --}}
    <script>
        $(document).ready(function(){
            $("#formTambahKlub").validate({
                rules: {
                    nama_klub: {
                        required: true,
                        minlength: 3,
                        maxlength: 20,
                    },
                    asal_wilayah: {
                        required: true,
                        minlength: 3,
                        maxlength: 20,
                    }
                },
                messages: {
                    nama_klub: {
                        required: "Kolom nama klub wajib di isi!",
                        minlength: "Kolom nama klub tidak boleh kurang dari 3 karakter",
                        maxlength: "Kolom nama klub tidak boleh lebih dari 20 karakter"
                    },
                    asal_wilayah: {
                        required: "Kolom asal wilayah wajib di isi!",
                        minlength: "Kolom asal wilayah tidak boleh kurang dari 3 karakter",
                        maxlength: "Kolom asal wilayah tidak boleh lebih dari 20 karakter"
                    }
                }
            });
        });
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            })
        </script>
    @endif
@endpush