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

        select.error {
            color: #F94687 !important;
            border: 1px solid #F94687;
        }
    </style>
@endpush

@section('content')
<div class="px-4 pt-1 my-3 text-center border-bottom">
    <h1 class="display-4 fw-bold">Tambah Skor Pertandingan Baru <br>Secara Sekaligus!</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Tambah skor pertandingan terbaru secara <i>multiple</i> agar memudahkan anda dalam menginput data score pertandingan lebih cepat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quae, assumenda ullam ratione suscipit excepturi quisquam! Accusantium eos soluta aliquid?</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" data-bs-toggle="modal" data-bs-target="#tambahPertandingan">Tambah Skor Pertandingan Multiple</button>
        </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
        <img src="{{ asset('images/heroes-pertandingan.jpg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
        </div>
    </div>
</div>

{{-- Modal Tambah klub --}}
<div class="modal fade" id="tambahPertandingan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #0d6efd !important">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Skor Pertandingan Baru Sekaligus<img src="{{ asset('images/ex-logo.png') }}" width="20" height="20" alt=""></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('pertandingan-tambah-banyak-simpan') }}" method="POST" id="formTambahPertandingan">
        @csrf
        <div class="modal-body" >
            <div class="container" id="listPertandingan">
                <div class="row my-3" id="pertandingan1">
                    <h4>Pertandingan 1</h4>
                    <hr>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="fw-bold">Klub Tuan Rumah</label>
                            <select name="klub_tuan_rumah_id[]" class="form-select" id="klub_tuan_rumah_id_1">
                                <option value="">Pilih Klub Tuan Rumah</option>
                                @foreach ($klubs as $klub)
                                    <option value="{{ $klub->id }}">{{ $klub->nama_klub }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="fw-bold">Klub Tamu</label>
                            <select name="klub_tamu_id[]" class="form-select" id="klub_tamu_id_1">
                                <option value="">Pilih Klub Tamu</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="fw-bold">Skor Klub Tuan Rumah</label>
                            <input type="number" name="skor_tuan_rumah[]" min="0" class="form-control" id="" placeholder="Masukkan skor klub tuan rumah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="fw-bold">Skor Klub Tamu</label>
                            <input type="number" name="skor_tamu[]" min="0" class="form-control" id="" placeholder="Masukkan skor klub tamu">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="tambahFromPertandingan">Tambah Form</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    {{-- From Repeater Pertandingan --}}
    <script>
        var pertandingan = 1;
        $(document).ready(function(){
            $("#tambahFromPertandingan").click(function(){
                pertandingan++;
                var html = '';
                html += '<div class="row my-3" id="pertandingan'+pertandingan+'">';
                html += '<h4>Pertandingan '+pertandingan+'</h4>';
                html += '<hr>';
                html += '<div class="col-md-6">';
                html += '<div class="form-group mb-3">';
                html += '<label for="" class="fw-bold">Klub Tuan Rumah</label>';
                html += '<select name="klub_tuan_rumah_id[]" class="form-select" id="klub_tuan_rumah_id_'+pertandingan+'">';
                html += '<option value="">Pilih Klub Tuan Rumah</option>';
                @foreach ($klubs as $klub)
                    html += '<option value="{{ $klub->id }}">{{ $klub->nama_klub }}</option>';
                @endforeach
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="form-group mb-3">';
                html += '<label for="" class="fw-bold">Klub Tamu</label>';
                html += '<select name="klub_tamu_id[]" class="form-select" id="klub_tamu_id_'+pertandingan+'">';
                html += '<option value="">Pilih Klub Tamu</option>';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="form-group mb-3">';
                html += '<label for="" class="fw-bold">Skor Klub Tuan Rumah</label>';
                html += '<input type="number" name="skor_tuan_rumah[]" min="0" class="form-control" id="" placeholder="Masukkan skor klub tuan rumah">';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="form-group mb-3">';
                html += '<label for="" class="fw-bold">Skor Klub Tamu</label>';
                html += '<input type="number" name="skor_tamu[]" min="0" class="form-control" id="" placeholder="Masukkan skor klub tamu">';
                html += '</div>';
                html += '</div>';

                html += '<div class="col-md-12">';
                html += '<button type="button" class="btn btn-danger" id="'+pertandingan+'" onclick="hapusPertandingan(this.id)">Hapus Pertandingan</button>';
                html += '</div>';
                html += '</div>';

                $("#listPertandingan").append(html);

                $("#klub_tuan_rumah_id_"+pertandingan).change(function(){
                    var klub_tuan_rumah_id = $(this).val();
                    var html = '';
                    $.ajax({
                        url: '/pertandingan/tambah-satu/get-klub-tamu/'+klub_tuan_rumah_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            html += '<option value="">Pilih Klub Tamu</option>';
                            for(var i = 0; i < data.length; i++){
                                html += '<option value="'+data[i].id+'">'+data[i].nama_klub+'</option>';
                            }
                            $("#klub_tamu_id_"+pertandingan).html(html);
                        }
                    });
                });
            });
            
            
        });

        function hapusPertandingan(id){
            $("#pertandingan"+id).remove();
            pertandingan--;s
        }
    </script>

    {{-- Validasi --}}
    <script>
        $(document).ready(function(){
            $("#formTambahPertandingan").validate({
                rules: {
                    klub_tuan_rumah_id: {
                        required: true
                    },
                    klub_tamu_id: {
                        required: true
                    },
                    skor_tuan_rumah: {
                        required: true,
                        min: 0
                    },
                    skor_tamu: {
                        required: true,
                        min: 0
                    }
                },
                messages: {
                    klub_tuan_rumah_id: {
                        required: "Klub tuan rumah harus dipilih"
                    },
                    klub_tamu_id: {
                        required: "Klub tamu harus dipilih"
                    },
                    skor_tuan_rumah: {
                        required: "Skor klub tuan rumah harus diisi",
                        min: "Skor tidak boleh kurang dari 0"
                    },
                    skor_tamu: {
                        required: "Skor klub tamu harus diisi",
                        min: "Skor tidak boleh kurang dari 0"
                    }
                }
            });

            $('#klub_tuan_rumah_id_1').on('change', function(){
                var klub_tuan_rumah_id = $(this).val();
                if(klub_tuan_rumah_id){
                    $.ajax({
                        url: '/pertandingan/tambah-satu/get-klub-tamu/'+klub_tuan_rumah_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('#klub_tamu_id_1').empty();
                            $.each(data, function(key, value){
                                $('#klub_tamu_id_1').append('<option value="'+ value.id +'">'+ value.nama_klub +'</option>');
                            });
                        }
                    });
                }else{
                    $('#klub_tamu_id_1').empty();
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

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ada yang kolom yang belum anda isi, silahkan anda isi semua kolom yang ada lalu klik tombol simpan'
            })
        </script>
    @endif
@endpush