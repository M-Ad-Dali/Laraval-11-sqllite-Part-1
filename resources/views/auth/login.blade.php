<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>

                        <div class="mt-2">
                            <x-form-input id="email" name="email" :value="old('email')" type="email" required />

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>

                        <div class="mt-2">
                            <x-form-input id="password" name="password" type="password" required />

                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-button>Login</x-form-button>
        </div>
    </form>

</x-layout>
