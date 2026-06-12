<x-guest-layout>

    <div class="text-center mb-5">

        <img
            src="{{ asset('img/aprecia-logo.png') }}"
            alt="APRECIA"
            style="
                width:170px;
                display:block;
                margin:auto;
            ">

        <h2 style="
            font-size:34px;
            font-weight:700;
            color:#d90429;
            margin-top:12px;
            letter-spacing:1px;
        ">
            APRECIA 2.0
        </h2>

        <p style="
            color:#666;
            font-size:15px;
            margin-top:5px;
        ">
            Centro de Educación Especial
            <br>
            La Paz - Bolivia
        </p>

    </div>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div>

            <x-input-label
                for="email"
                value="Correo Electrónico" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                style="border-radius:15px;"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

        </div>

        <div class="mt-4">

            <x-input-label
                for="password"
                value="Contraseña" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                style="border-radius:15px;"
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        <div class="block mt-4">

            <label
                for="remember_me"
                class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-red-600 shadow-sm"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600">
                    Recordarme
                </span>

            </label>

        </div>

        <div class="flex items-center justify-between mt-6">

            @if (Route::has('password.request'))

                <a
                    class="underline text-sm text-gray-600 hover:text-red-700"
                    href="{{ route('password.request') }}">

                    ¿Olvidó su contraseña?

                </a>

            @endif

            <x-primary-button
                style="
                    background:#d90429;
                    border-color:#d90429;
                    border-radius:15px;
                    padding:10px 22px;
                    font-weight:bold;
                ">

                Iniciar Sesión

            </x-primary-button>

        </div>

    </form>

</x-guest-layout>