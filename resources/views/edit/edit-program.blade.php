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
    ul.form-style-1 input[type="date"],
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
    <h2>Mengubah Program</h2>

    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register.update', $register->id) }}" method="POST">
        @csrf
        @method('PUT')

        <ul class="form-style-1">
            <li>
                <label for="tmula">Tarikh Mula <span class="required">*</span></label>
                <input type="date" id="tmula" name="tmula" value="{{ $register->tmula }}" required>
            </li>
            <li>
                <label for="takhir">Tarikh Akhir <span class="required">*</span></label>
                <input type="date" id="takhir" name="takhir" value="{{ $register->takhir }}" required>
            </li>
            <li>
                <label for="nama">Nama Kursus/Seminar/Bengkel/Ceramah/Taklimat</label>
                <textarea name="nama" id="nama" class="field-long field-textarea">{{ $register->nama }}</textarea>
            </li>
            <li>
                <label for="kategori">Kategori</label>
                <p>
                    <input name="kategori" type="radio" value="PI" {{ $register->kategori == 'PI' ? 'checked' : '' }}> Profesional/Ikhtisas
                    <input name="kategori" type="radio" value="SM" {{ $register->kategori == 'SM' ? 'checked' : '' }}> Sahsiah/Motivasi
                    <input name="kategori" type="radio" value="LL" {{ $register->kategori == 'LL' ? 'checked' : '' }}> Lain-Lain
                </p>
            </li>
            <li>
                <label for="anjuran">Anjuran</label>
                <p>
                    <input name="anjuran" type="radio" value="INT" {{ $register->anjuran == 'INT' ? 'checked' : '' }}> PKPP
                    <input name="anjuran" type="radio" value="EXT" {{ $register->anjuran == 'EXT' ? 'checked' : '' }}> Pihak Luar (Sila nyatakan):
                    <input name="penganjur" type="text" id="penganjur" class="field-half" value="{{ $register->penganjur }}">
                </p>
            </li>
            <li>
                <label for="tempoh">Tempoh (Jam)</label>
                <input name="tempoh" id="tempoh" type="text" class="field-long" value="{{ $register->tempoh }}">
                <p class="note">Nota: 1 hari bersamaan 8 jam</p>
            </li>
            <li>
                <label for="lokasi">Lokasi</label>
                <input name="lokasi" id="lokasi" type="text" class="field-long" value="{{ $register->lokasi }}">
            </li>
            <li>
                <label for="ykos">Yuran/Kos Penganjuran</label>
                <input name="ykos" id="ykos" type="text" class="field-long" value="{{ $register->ykos }}">
            </li>
            <li>
                <label for="pkos">Kos Penginapan</label>
                <input name="pkos" id="pkos" type="text" class="field-long" value="{{ $register->pkos }}">
            </li>
            <li class="form-actions">
                <input type="submit" value="Update">
            </li>
        </ul>
    </form>
</div>
@endsection
<script>
        function goBack() {
            window.history.back();
        }
    </script>