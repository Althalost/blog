<x-app-layout>
    <div class="mx-auto max-w-5xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-gray-600 text-3xl font-bold py-4 mt-4 mb-6 rounded dark:text-gray-300 bg-gray-200 shadow-lg">
            <span class="hidden md:inline">Category:</span> 
            {{$category->name}}
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-wrap" >
            @foreach ($posts as $post)
                <x-card-post :post="$post"/>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>
</x-app-layout>