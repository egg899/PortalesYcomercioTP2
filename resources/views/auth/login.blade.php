<x-layout>
    <x-slot:title>Iniciar Sesión</x-slot>
    <div class="container mt-4">
        <h1 class="mb-3">Iniciar Sesión</h1>

        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="passowrd" name="password" placeholder="Contraseña" required>
             <button type="submit">Entrar</button>

        </form>
    </div>
</x-layout>
