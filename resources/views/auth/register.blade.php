<x-layout>
    <x-slot:title>Registrarse</x-slot>
    <div class="container mt-4">
        <h1 class="mb-3">Registrarse</h1>

        <form method="POST" action="{{ route('auth.register.submit') }}">
            @csrf
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
                    @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Repetir Contraseña" required>
            <button type="submit">Registrarse</button>

        </form>
    </div>
</x-layout>
