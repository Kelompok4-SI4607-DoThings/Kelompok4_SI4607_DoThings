@extends('layouts.app')

@section('content')
    <h1>Tambah Zakat</h1>
    <form action="{{ route('zakat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_pembayar_zakat">Nama Pembayar Zakat</label>
            <input type="text" name="nama_pembayar_zakat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="penghasilan_perbulan">Penghasilan Perbulan</label>
            <input type="number" name="penghasilan_perbulan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bonus">Bonus</label>
            <input type="number" name="bonus" class="form-control">
        </div>
        <div class="form-group">
            <label for="utang">Utang</label>
            <input type="number" name="utang" class="form-control">
        </div>
        <div class="form-group">
            <label for="pantiasuhan">Panti Asuhan</label>
            <input type="text" name="pantiasuhan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection