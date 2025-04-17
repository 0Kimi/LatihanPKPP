@extends('layout.layout')

@section('content')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<style>
    body {
        font-family: Poppins, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.5rem;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        color: #333;
    }

    .form-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px 30px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #000000;
    }

    .add-program-container {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    .add-program {
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .add-program:hover {
        background-color: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-family: Poppins, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .btn-edit {
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        width: 50px;
        padding: 10px 0;
        text-align: center;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        text-decoration: none;
        width: 50px;
        padding: 15px 0;
        text-align: center;
    }

    .btn-edit:hover,
    .btn-delete:hover {
        opacity: 0.8;
    }
</style>

<div class="form-container">
    <h1>Program Didaftar</h1>
    <div class="add-program-container">
        <a href="{{ route('register.create') }}" class="add-program">Tambah Program</a>
    </div>
    @if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
    @endif
    @if(isset($registers) && count($registers) > 0)
    <table id="registersTable">
        <thead>
            <tr>
                <th>Tarikh Mula</th>
                <th>Tarikh Akhir</th>
                <th>Nama Kursus</th>    
                <th>Tempoh (Jam)</th>
                <th>Lokasi</th>
                <th>Yuran/Kos Penganjuran</th>
                <th>Kos Penginapan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registers as $register)
            <tr>
                <td>{{ $register->tmula }}</td>
                <td>{{ $register->takhir }}</td>
                <td>{{ $register->nama }}</td>
                <td>{{ $register->tempoh }}</td>
                <td>{{ $register->lokasi }}</td>
                <td>{{ $register->ykos }}</td>
                <td>{{ $register->pkos }}</td>
                <td class="actions">
                    <a href="{{ route('register.edit', $register->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('register.destroy', $register->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')   
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No registers found.</p>
    @endif
</div>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#registersTable').DataTable();
    });
</script>
@endsection