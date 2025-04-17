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
        max-width: 700px;
        margin: 50px auto;
        padding: 20px 30px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    h2 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #000000;
    }

    ul.form-style-1 {
        list-style: none;
        padding: 0;
    }

    ul.form-style-1 li {
        margin-bottom: 15px;
    }

    ul.form-style-1 label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }

    ul.form-style-1 .required {
        color: red;
    }

    ul.form-style-1 input[type="text"],
    ul.form-style-1 textarea,
    ul.form-style-1 .field-half {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    ul.form-style-1 textarea {
        height: 100px;
        resize: none;
    }

    ul.form-style-1 input[type="radio"] {
        margin-right: 5px;
    }

    ul.form-style-1 .field-half {
        display: inline-block;
        width: calc(50% - 10px);
    }

    .form-actions {
        text-align: center;
        margin-top: 20px;
    }

    .form-actions input[type="submit"] {
        background-color: #5bd75b;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-actions input[type="submit"]:hover {
        background-color: #4da621;
    }

    .note {
        font-size: 12px;
        color: #777;
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
   

    <h2>Kemasukan Program Latihan</h2>
    @include('register.submit-program')
</div>

@endsection

<script>
    function goBack() {
        window.history.back();
    }
</script>