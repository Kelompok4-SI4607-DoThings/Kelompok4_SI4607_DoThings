@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kampanye Donasi</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('campaigns.update', $campaign->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label>Judul Kampanye</label>
                            <input type="text" name="title" 
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $campaign->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea name="description" 
                                      class="form-control @error('description') is-invalid @enderror"
                                      rows="5" required>{{ old('description', $campaign->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Target Donasi</label>
                            <input type="number" name="target_amount" 
                                   class="form-control @error('target_amount') is-invalid @enderror"
                                   value="{{ old('target_amount', $campaign->target_amount) }}" required>
                            @error('target_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Deadline</label>
                            <input type="date" name="deadline" 
                                   class="form-control @error('deadline') is-invalid @enderror"
                                   value="{{ old('deadline', $campaign->deadline) }}" required>
                            @error('deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Gambar Kampanye</label>
                            <input type="file" name="image" 
                                   class="form-control @error('image') is-invalid @enderror">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <img src="{{ asset('images/'.$campaign->image) }}" 
                                 alt="Current Image" 
                                 class="img-thumbnail" 
                                 style="max-height: 200px">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Kampanye</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection