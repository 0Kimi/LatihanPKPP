
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form name="frm" id="frm" action="{{ route('register.store') }}" method="POST">
    @csrf
    <ul class="form-style-1">
        <li>
            <label>Tarikh Mula<span class="required">*</span></label>
            <input type="date" name="tmula" class="field-divided" required>
        </li>
        <li>
            <label>Tarikh Akhir<span class="required">*</span></label>
            <input type="date" name="takhir" class="field-divided" required>
        </li>
        <li>
            <label>Nama Kursus/Seminar/Bengkel/Ceramah/Taklimat</label>
            <textarea name="nama" id="nama" class="field-long field-textarea"></textarea>
        </li>
        <li>
            <label>Kategori</label>
            <p>
                <input name="kategori" type="radio" value="PI"> Profesional/Ikhtisas
                <input name="kategori" type="radio" value="SM"> Sahsiah/Motivasi
                <input name="kategori" type="radio" value="LL"> Lain-Lain
            </p>
        </li>
        <li>
            <label>Anjuran</label>
            <p>
                <input name="anjuran" type="radio" value="INT"> PKPP
                <input name="anjuran" type="radio" value="EXT"> Pihak Luar (Sila nyatakan):
                <input name="penganjur" type="text" id="penganjur" class="field-half">
            </p>
        </li>
        <li>
            <label>Tempoh (Jam)</label>
            <input name="tempoh" id="tempoh" type="text" class="field-long">
            <p class="note">Nota: 1 hari bersamaan 8 jam</p>
        </li>
        <li>
            <label>Lokasi</label>
            <input name="lokasi" id="lokasi" type="text" class="field-long">
        </li>
        <li>
            <label>Yuran/Kos Penganjuran</label>
            <input name="ykos" id="ykos" type="text" class="field-long">
        </li>
        <li>
            <label>Kos Penginapan</label>
            <input name="pkos" id="pkos" type="text" class="field-long">
        </li>
    </ul>
    <div class="form-actions">
        <input type="submit" name="Submit" value="Simpan">
    </div>
</form>
