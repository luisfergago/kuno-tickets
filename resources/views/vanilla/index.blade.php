<form method="POST" action="/print"  enctype="multipart/form-data">
    @csrf
    <label for="first">Númeración de inicio:</label>
    <input type="text" name="first"><br>
    <label for="last">Númeración final:</label>
    <input type="text" name="last"><br>
    <label for="ticket-type">Tipo de ticket</label>
    <select name="type" id="ticket-type">
        <option value="2">2 partes</option>
        <option value="3">3 partes</option>
    </select>
    <br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" accept="image/*">
    <button>Imprimir</button>
</form>

