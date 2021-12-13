<div>
    <section class="flex justify-between mb-3 px-1">


        <a href="{{route('backend.article.create')}}" class="border border-indigo-300 rounded px-2">+ Add New</a>
        <a href="{{route('backend.article.autoimport')}}" class="border border-indigo-300 rounded px-2">+ Auto Import</a>
    </section>

    <section wire:loading.class="opacity-50">
        <x-backend.table>
            <x-slot name="head">
                <tr>
                    <x-backend.table.th>Title</x-backend.table.th>
                    <x-backend.table.th>Publication</x-backend.table.th>
                    @if(Auth::user()->roles->pluck('name')->first() == 'admin')
                    <x-backend.table.th>Operations</x-backend.table.th>
                    @endif
                </tr>
            </x-slot>

            <x-slot name="body">
                @forelse($articles as $article)
                    <livewire:backend.article.index-row :article="$article->id" wire:key="{{$article->id}}"/>
                @empty
                    <tr>
                        <x-backend.table.td colspan="100" class="text-gray-500 text-center">No article found</x-backend.table.td>
                    </tr>
                @endforelse
            </x-slot>
        </x-backend.table>

        <section class="pt-3">
            {{$articles->links()}}
        </section>
    </section>
</div>
