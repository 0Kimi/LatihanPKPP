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

    .add-participation-container {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    .add-participation {
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .add-participation:hover {
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
    <h1>Participations</h1>
    <div class="add-participation-container">
        <a href="{{ route('participations.create') }}" class="add-participation">Add Participation</a>
    </div>
    @if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
    @endif
    @if(isset($participations) && count($participations) > 0)
    <table id="participationsTable">
        <thead>
            <tr>
                <th>Program</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participations as $participation)
            <tr>
                <td>{{ $participation->register->nama }}</td>
                <td>{{ $participation->department->name }}</td>
                <td class="actions">
                    <a href="{{ route('participations.edit', $participation->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('participations.destroy', $participation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this participation?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No Participations Found</p>
    @endif
</div>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#participationsTable').DataTable();
    });
</script>
@endsection