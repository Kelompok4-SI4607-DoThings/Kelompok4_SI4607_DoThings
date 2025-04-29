@extends('layouts.app')

@section('content')
    <h1>Edit Zakat</h1>
    <form action="{{ route('zakat.update', $zakat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_pembayar_zakat">Nama Pembayar Zakat</label>
            <input type="text" name="nama_pembayar_zakat" class="form-control" value="{{ $zakat->nama_pembayar_zakat }}" required>
        </div>
        <div class="form-group">
            <label for="penghasilan_perbulan">Penghasilan Perbulan</label>
            <input type="number" name="penghasilan_perbulan" class="form-control" value="{{ $zakat->penghasilan_perbulan }}" required>
        </div>
        <div class="form-group">
            <label for="bonus">Bonus</label>
            <input type="number" name="bonus" class="form-control" value="{{ $zakat->bonus }}">
        </div>
        <div class="form-group">
            <label for="utang">Utang</label>
            <input type="number" name="utang" class="form-control" value="{{ $zakat->utang }}">
        </div>
        <div class="form-group">
            <label for="pantiasuhan">Panti Asuhan</label>
            <input type="text" name="pantiasuhan" class="form-control" value="{{ $zakat->pantiasuhan }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
@endsection