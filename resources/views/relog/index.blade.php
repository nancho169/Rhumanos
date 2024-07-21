<x-app-layout>
<div class="b-example-divider"></div>
<br>
<form action="{{route('uploadExcel')}}" method="POST" class="form-control" enctype="multipart/form-data">
    @csrf
    <label for="file">Selecciona un archivo Excel:</label>
    <input type="file" name="file" id="file" required>
    <button type="submit">Subir</button>
</form>
<br>
</x-app-layout>