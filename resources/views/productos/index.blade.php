@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>

        @if($productos->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>${{ $producto->precio }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>
                                @if($producto->imagen)
                                    <img src="{{ Storage::url($producto->imagen) }}" width="100" alt="Imagen del producto">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay productos disponibles.</p>
        @endif
    </div>
@endsection