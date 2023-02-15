<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/niceventslogo-removebg.png" alt="">
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                @error('name')
                    <div class="container-fluid message-container">
                        <div class="row">
                            <span class="block alert invalid invalid-jetstream" role="alert">
                            <p>{{$message}} <ion-icon name="alert-circle-outline"></ion-icon></p>
                            </span>
                        </div>
                    </div>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                @error('email')
                    <div class="container-fluid message-container">
                        <div class="row">
                            <span class="block alert invalid invalid-jetstream" role="alert">
                            <p>{{$message}} <ion-icon name="alert-circle-outline"></ion-icon></p>
                            </span>
                        </div>
                    </div>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                @error('password')
                    <div class="container-fluid message-container">
                        <div class="row">
                            <span class="block alert invalid invalid-jetstream" role="alert">
                            <p>{{$message}} <ion-icon name="alert-circle-outline"></ion-icon></p>
                            </span>
                        </div>
                    </div>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                @error('password_confirmation')
                    <div class="container-fluid message-container">
                        <div class="row">
                            <span class="block alert invalid invalid-jetstream" role="alert">
                            <p>{{$message}} <ion-icon name="alert-circle-outline"></ion-icon></p>
                            </span>
                        </div>
                    </div>
                @enderror
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
