<x-table.x :paginator="$users" searchable>
    <x-slot name="header">
        <x-table.header.sortable
            name="Benutzer"
            :current-field="$sortField"
            :current-direction="$sortDirection"
            field="name" />

        <x-table.header.sr name="Aktionen" />
    </x-slot>

    @foreach($users as $user)
        <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
            <x-table.body.cell>
                <div class="flex items-center whitespace-nowrap dark:text-white">
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center">
                        @if($user->profile_picture_id)
                            <img class="w-10 h-10 rounded-lg" src="{{ route('public.file', $user->profile_picture_id) }}" alt="Profilbild">
                        @else
                            <div class="relative rounded-lg overflow-hidden w-10 h-10">
                                <div class="bg-gray-100 dark:bg-gray-600 w-full h-full">
                                    <svg class="absolute w-10 h-10 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z" fill-rule="evenodd"></path></svg>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{ $user->display_name }}</div>
                    </div>
                </div>
            </x-table.body.cell>

            <x-table.body.cell>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.user.edit', $user) }}">
                        <svg class="w-6 h-6 hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
                    </a>
                </div>
            </x-table.body.cell>
        </x-table.body.row>
    @endforeach
</x-table.x>
