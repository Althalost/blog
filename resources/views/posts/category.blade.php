<x-app-layout>
    <div class="mx-auto max-w-4xl md:max-w-4xl lg:max-w-6xl px-4 py-8 md:px-2">
        <div class=" border-b-2 mt-4 mb-6 mx-4 border-gray-500">
        <h1 class="uppercase inline-block text-left text-gray-500 border-b-4 border-gray-500 text-3xl font-bold py-1 px-2  dark:text-gray-300 ">
            {{$category->name}}
        </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-wrap" >
            @foreach ($posts as $post)
                <x-card-post :post="$post"/>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>
</x-app-layout>