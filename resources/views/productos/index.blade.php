{{-- @php
    dd($productos);
@endphp --}}


<x-layout>
    <x-slot:title>Nuestro Producto</x-slot>
    <h1 class="row justify-content-center">Conoce más sobre Nuestro producto</h1>

    <div class="row justify-content-center">
        @forelse ($productos as $producto)
            <div class="col-md-6 mt-5">
                <h3 class="row justify-content-center">{{ $producto->nombre }}</h3>
                <div class="card shadow" style="overflow: visible;">
                    @if ($producto->imagen)
                        <img
                            src="{{ asset('images/' . $producto->imagen) }}"
                            class="card-img-top"
                            alt="{{ $producto->nombre }}"
                            style="height: 200px; object-fit: contain; "
                        >
                    @else
                        <img
                            src="https://via.placeholder.com/300x200"
                            class="card-img-top"
                            alt="Imagen no disponible"
                            style="height: 200px; object-fit: contain"
                        >
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text fw-bold text-primary">${{ $producto->precio }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay productos cargados aún.</p>
        @endforelse
    </div>
</x-layout>
