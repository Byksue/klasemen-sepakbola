@extends('component.main')

@push('css')
    <style>
        .btn-close{
            background-color: #fff !important;
            border: none;
        }
    </style>
@endpush

@section('content')
<div class="px-4 pt-4 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">Klasemen Klub Sepak Bola</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Berikut adalah sajiab klasemen klub sepak bola liga legenda super terbaru. Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quae, assumenda ullam ratione suscipit excepturi quisquam! Accusantium eos soluta aliquid?</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" data-bs-toggle="modal" data-bs-target="#lihatKlasemen">Lihat Klasemen Terbaru</button>
        </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
        <img src="{{ asset('images/heroes-klasemen.jpeg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
        </div>
    </div>
</div>

{{-- Modal Lihat klub --}}
<div class="modal fade" id="lihatKlasemen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #0d6efd !important">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Klasemen Klub <img src="{{ asset('images/ex-logo2.png') }}" width="20" height="20" alt=""></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Klub</th>
                        <th scope="col">Main</th>
                        <th scope="col">Menang</th>
                        <th scope="col">Seri</th>
                        <th scope="col">Kalah</th>
                        <th scope="col">Goal Masuk</th>
                        <th scope="col">Goal Kebobolan</th>
                        <th scope="col">Point</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($klasemen_klub) }} --}}
                    @foreach ($klasemen_klub as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item['nama_klub'] }}</td>
                            <td>{{ $item['main'] }}</td>
                            <td>{{ $item['menang'] }}</td>
                            <td>{{ $item['seri'] }}</td>
                            <td>{{ $item['kalah'] }}</td>
                            <td>{{ $item['goal_masuk'] }}</td>
                            <td>{{ $item['goal_kebobolan'] }}</td>
                            <td>{{ $item['point'] }}</td>
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