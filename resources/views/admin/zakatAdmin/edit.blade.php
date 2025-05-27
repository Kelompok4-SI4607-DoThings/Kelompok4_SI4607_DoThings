@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Zakat</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('zakatAdmin.update', $zakat->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label>Nama Pembayar Zakat</label>
                            <input type="text" name="nama_pembayar_zakat" 
                                   class="form-control @error('nama_pembayar_zakat') is-invalid @enderror"
                                   value="{{ old('nama_pembayar_zakat', $zakat->nama_pembayar_zakat) }}" required>
                            @error('nama_pembayar_zakat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Penghasilan Per Bulan</label>
                            <input type="number" name="penghasilan_perbulan" 
                                   class="form-control @error('penghasilan_perbulan') is-invalid @enderror"
                                   value="{{ old('penghasilan_perbulan', $zakat->penghasilan_perbulan) }}" required>
                            @error('penghasilan_perbulan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Bonus</label>
                            <input type="number" name="bonus" 
                                   class="form-control @error('bonus') is-invalid @enderror"
                                   value="{{ old('bonus', $zakat->bonus) }}">
                            @error('bonus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Utang</label>
                            <input type="number" name="utang" 
                                   class="form-control @error('utang') is-invalid @enderror"
                                   value="{{ old('utang', $zakat->utang) }}">
                            @error('utang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Panti Asuhan</label>
                            <input type="text" name="pantiasuhan" 
                                   class="form-control @error('pantiasuhan') is-invalid @enderror"
                                   value="{{ old('pantiasuhan', $zakat->pantiasuhan) }}" required>
                            @error('pantiasuhan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Data Zakat</button>
                        <a href="{{ route('zakatAdmin.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection