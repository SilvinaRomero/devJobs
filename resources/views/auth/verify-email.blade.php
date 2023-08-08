<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Es necesario verificar tu cuenta antes de continuar, revisa tu email y presiona sobre el enlace de confirmación.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Hemos enviado un nuevo email de confirmación al email que se utilizó para el registro.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                @if (session('status') == 'verification-link-sent')
                <x-primary-button>
                    {{ __('Reenviar email de confirmacion') }}
                </x-primary-button>
                @else
                <x-primary-button>
                    {{ __('Enviar email de confirmacion') }}
                </x-primary-button>
                @endif
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
