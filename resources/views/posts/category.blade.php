<x-app-layout>

    <div class="relative container py-3 px-4 lg:px-0 lg:py-8">
        @livewire('post-list', ['category_id' => $category->id])
    </div>
    
</x-app-layout>