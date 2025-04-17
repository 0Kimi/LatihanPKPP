@extends('layout.layout')

@section('content')
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
        max-width: 600px;
        margin: 50px auto;
        padding: 20px 30px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    .form-container h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #000000;
    }

    .alert.alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .alert.alert-danger ul {
        margin: 0;
        padding: 0;
    }

    .alert.alert-danger ul li {
        list-style-type: none;
    }

    .form-style-1 {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .form-style-1 li {
        margin-bottom: 15px;
    }

    .form-style-1 label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .form-style-1 input[type="text"],
    .form-style-1 input[type="email"],
    .form-style-1 input[type="url"],
    .form-style-1 input[type="tel"],
    .form-style-1 input[type="number"],
    .form-style-1 input[type="date"],
    .form-style-1 input[type="password"],
    .form-style-1 textarea,
    .form-style-1 select {
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 14px;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }

    .form-style-1 .required {
        color: red;
    }

    .form-actions {
        text-align: center;
    }

    .form-actions input[type="submit"] {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-actions input[type="submit"]:hover {
        background-color: #218838;
    }

    .back-button {
        padding: 5px 5px;
        background-color: #ffffff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #777;
    }
</style>

<div class="form-container">
    <button class="back-button" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
        </svg></button>
    <h1>Edit Participation</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('participations.update', $participation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <ul class="form-style-1">
            <li>
                <label for="register_id">Program <span class="required">*</span></label>
                <select name="register_id" required>
                    @foreach($registers as $register)
                    <option value="{{ $register->id }}" {{ $participation->register_id == $register->id ? 'selected' : '' }}>
                        {{ $register->nama }}
                    </option>
                    @endforeach
                </select>
            </li>
            <li>
                <label for="department_id">Department <span class="required">*</span></label>
                <select name="department_id" id="department_id" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $participation->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                    @endforeach
                </select>
            </li>
            <li>
                <label for="employees">Employees</label>
                <select name="employees[]" id="employees" multiple>
                    @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" data-department="{{ $employee->department_id }}" {{ in_array($employee->id, $participation->employees->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $employee->name }} ({{ $employee->department->name }})
                    </option>
                    @endforeach
                </select>
            </li>
            <li class="form-actions">
                <input type="submit" value="Update">
            </li>
        </ul>
    </form>
</div>

<script>
    function goBack() {
        window.history.back();
    }

    document.getElementById('department_id').addEventListener('change', function() {
        var departmentId = this.value;
        var employees = document.getElementById('employees').options;

        for (var i = 0; i < employees.length; i++) {
            if (employees[i].getAttribute('data-department') == departmentId || departmentId == "") {
                employees[i].style.display = 'block';
            } else {
                employees[i].style.display = 'none';
            }
        }
    });

    // Trigger the change event to filter the employees initially based on the selected department
    document.getElementById('department_id').dispatchEvent(new Event('change'));
</script>
@endsection