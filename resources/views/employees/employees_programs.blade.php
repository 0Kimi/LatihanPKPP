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
    <h1>All Employee Programs</h1>
    @if(isset($employees) && count($employees) > 0)
    <table id="registersTable">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Program Name</th>
                <th>Departments</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Organizer</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            @foreach($employee->participations as $participation)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $participation->register->name ?? 'N/A' }}</td>
                <td>
                    @foreach($participation->departments as $department)
                        {{ $department->name ?? 'N/A' }}
                        @if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>{{ $participation->register->tmula ?? 'N/A' }}</td>
                <td>{{ $participation->register->takhir ?? 'N/A' }}</td>
                <td>{{ $participation->register->penganjur ?? 'N/A' }}</td>
                <td>{{ $participation->register->kategori ?? 'N/A' }}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @else
    <p>No programs found.</p>
    @endif
</div>
@endsection

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#registersTable').DataTable();
    });
</script>