<x-layout>
        <x-slot:title>Editar Entrada</x-slot>
            <div class="container mt-4">
                <h1 class="mb-3" >Editar: {{ $blog->titulo }}</h1>

                <form action="{{ route('blogs.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $blog->titulo) }}">
                    </div>

                    <!--Imagen Actual-->

                    @if($blog->imagen)
                        <div class="mb-3">
                            <label class="form-label">Imagen Actual</label>
                            <img src="{{ asset('storage/' . $blog->imagen) }}">
                        </div>
                      @endif

                      <div class="mb-3">
                            <label for="imagen" class="form-label">Nueva imagen (opcional)</label>
                            <input type="file" name="imagen" class="form-control">
                      </div>

                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido</label>
                        <textarea name="contenido" class="form-control" required>{{ old('contenido', $blog->contenido) }}</textarea>
                    </div>



                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>


            </div>



</x-layout>
