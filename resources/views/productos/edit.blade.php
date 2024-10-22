@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $producto->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="{{ $producto->precio }}" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                @if($producto->imagen)
                    <img src="{{ Storage::url($producto->imagen) }}" width="100" alt="Imagen del producto">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Actualizar Producto</button>
        </form>
    </div>
@endsection