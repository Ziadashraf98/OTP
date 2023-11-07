<x-guest-layout>
    <div class="mb-4 text-sm text-green-600">
        {{ __('يرجي ادخال رمز التحقق المرسل لكم الى الايميل') }}
    </div>

    <form method="POST" action="{{ route('verify.store') }}">
        @csrf

        {{-- @if(session()->has('success'))

        <div class="alert alert-success">

        {{session()->get('success')}}

        </div>

        @endif --}}

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('كود التحقق')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="text"
                            name="code"
                             autocomplete="current-password" />

            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('تأكيد') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
