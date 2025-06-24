@extends('layouts.app')
{{-- memanggil isi konten layouts --}}

@section('title', Detail Kontak)
{{-- memanggil yield --}}

@section('content')
{{-- memanggil yield konten --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            ><h2>Detail Kontak</h2>
            <div class="card-body">
                <h5 class="card-title">{{ $kontak->nama}}</h5>
                {{-- memanggil aray dari valiabel controller "kontak" --}}
                <p class="card-text"><strong>Alamat:</strong> {{ $kontak->alamat}}</p>
                <p class="card-text"><strong>No HP:</strong> {{ $kontak->no_hp}}</p>
                <a href="{{ route('kontaks.edit', $kontak->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('kontaks.destroy', $kontak->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                </form>
                <a href="{{ route('kontaks.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection