@extends('layouts.admin')

@section('title')
    Ubah Pengeluaran
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row px-4">
        <div class="col-12 text-center">
            <h2 class="text-white">Ubah Data Pengeluaran {{ $data->keterangan }}</h2>
        </div>
    </div>
    <div class="row p-4">
        <div class="col-12">
            {{-- start:validasi input alert --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- end:validasi input alert --}}
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">
                    <form action="{{ route('pengeluaran.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Masukan Keterangan</label>
                            <input value="{{ old($data->keterangan) ?? $data->keterangan }}" type="text" class="form-control" name="keterangan" placeholder="Isi data dengan benar">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Masukan Jumlah Pemasukan</label>
                            <input value="{{ old($data->jumlah) ?? $data->jumlah }}" type="number" class="form-control" name="jumlah" placeholder="Isi data berupa nilai angka">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="w-100 btn btn-warning">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection