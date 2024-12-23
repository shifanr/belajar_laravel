@extends('layouts.app')

@section('content')
<h1>Daftar Barang</h1>

@if(auth()->user()->isAdmin())
    <a href="{{ route('barang.create') }}">Tambah Barang</a>
@endif

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $barang)
            <tr>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->stok }}</td>
                <td>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('barang.edit', $barang) }}">Edit</a>
                        <form action="{{ route('barang.destroy', $barang) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
