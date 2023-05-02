<div x-data="{members: @entangle('members').defer}">
    @if(session()->has('created'))
        <x-alert.x
            title="Team erstellt"
            :style="\App\Models\Components\Styled\Style::Success">
            <p>Du hast dein Team erfolgreich erstellt.</p>
            <p class="mt-1">Es wurde eine E-Mail an alle Mitglieder versendet, in der sie aufgefordert werden, dem Team beizutreten.</p>

            <x-slot name="actions">
                <x-button.big.link
                    id="team-link" href="#" full-width
                    :style="\App\Models\Components\Styled\OutlinedStyle::FilledSuccess">
                    Zum Team
                </x-button.big.link>
            </x-slot>
        </x-alert.x>
    @else
        <x-form.x>
            <x-form.input.x
                id="name" label="Name"
                :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <div>
                <div class="relative">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="members">
                        Mitglieder
                    </label>

                    <input x-ref="input" type="text" id="members" name="members"
                           class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600"
                           placeholder="E-Mail-Adresse"
                           @keydown.enter="members.push($refs.input.value); $refs.input.value = ''">

                    <ul class="ml-5 mt-4 list-disc">
                        <template x-for="(member, index) in members" :key="index">
                            <li>
                                <div class="flex justify-between">
                                    <span x-text="member"></span>

                                    <svg @click="members.splice(index, 1)"
                                         class="h-6 text-red-400 dark:text-red-600 hover:text-red-500 cursor-pointer" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </li>
                        </template>
                    </ul>

                    @if(count($errors->get('members')) > 1)
                        <ul class="mt-2 text-xs text-red-400 dark:text-red-600 list-disc ml-4">
                            @foreach($errors->get('members') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @elseif($errors->has('members'))
                        <p class="mt-2 text-xs text-red-400 dark:text-red-600">
                            {{ $errors->first('members') }}
                        </p>
                    @endif
                </div>
            </div>

            <x-button.big.livewire
                id="create-team" action="createTeam"
                prevent loading full-width>
                Team erstellen
            </x-button.big.livewire>
        </x-form.x>
    @endif
</div>
