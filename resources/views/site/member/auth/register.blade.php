@extends('layouts.app')

@section('title', 'Registrieren')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 rounded-lg border-2 border-accent-500 dark:border-accent-600 shadow">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Registrieren</h2>

            @livewire('member.auth.register.form')
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        const colors = [
            ['!bg-red-300', 'dark:!bg-red-400'],
            ['!bg-orange-300', 'dark:!bg-orange-400'],
            ['!bg-amber-300', 'dark:!bg-amber-400'],
            ['!bg-yellow-300', 'dark:!bg-yellow-400'],
            ['!bg-lime-300', 'dark:!bg-lime-400'],
            ['!bg-green-300', 'dark:!bg-green-400'],
        ]

        window.addEventListener('DOMContentLoaded', function () {
            const passwordLength = $('#password-length')
            const passwordUppercase = $('#password-uppercase')
            const passwordLowercase = $('#password-lowercase')
            const passwordNumber = $('#password-number')
            const passwordSpecial = $('#password-special')

            $('#password').on('input', function () {
                const value = $(this).val()

                const length = value.length >= 8
                const uppercase = /[A-Z]/u.test(value)
                const lowercase = /[a-z]/u.test(value)
                const number = /[0-9]/u.test(value)
                const special = /\p{Z}|\p{S}|\p{P}/u.test(value)

                const strength = length + uppercase + lowercase + number + special + ((value.length >= 12) ? 1 : 0)

                for (let i = 1; i < 7; i++) {
                    const passwordStrength = $(`#password-strength-${i}`)
                    for (const color of colors) passwordStrength.removeClass(color)

                    if (i <= strength) passwordStrength.addClass(colors[strength - 1])
                }

                passwordLength.children('svg').addClass('hidden')
                if (length) passwordLength.children('svg').last().removeClass('hidden')
                else passwordLength.children('svg').first().removeClass('hidden')

                passwordUppercase.children('svg').addClass('hidden')
                if (uppercase) passwordUppercase.children('svg').last().removeClass('hidden')
                else passwordUppercase.children('svg').first().removeClass('hidden')

                passwordLowercase.children('svg').addClass('hidden')
                if (lowercase) passwordLowercase.children('svg').last().removeClass('hidden')
                else passwordLowercase.children('svg').first().removeClass('hidden')

                passwordNumber.children('svg').addClass('hidden')
                if (number) passwordNumber.children('svg').last().removeClass('hidden')
                else passwordNumber.children('svg').first().removeClass('hidden')

                passwordSpecial.children('svg').addClass('hidden')
                if (special) passwordSpecial.children('svg').last().removeClass('hidden')
                else passwordSpecial.children('svg').first().removeClass('hidden')
            })
        })
    </script>
@endpush
