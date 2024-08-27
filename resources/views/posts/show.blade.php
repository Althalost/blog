<x-app-layout>
    
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

        <div class="text-lg text-gray-600 mb-2">
            {!!$post->extract!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Main Content --}}
            <div class="lg:col-span-2">

                <figure>
                    @if ($post->image)
                       <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg" alt=""> 
                    @endif
                </figure>

                <div class="text-base text-gray-600 mt-4">
                    {!!$post->body!!}
                </div>
                
            </div>

            {{-- Related Content --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">More of {{$post->category->name}}</h1>

                <ul>
                    @foreach ($similar as $oneSimilar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $oneSimilar)}}">
                                @if ($oneSimilar->image)
                                    <img class="flex-initial h-20 w-36 object-cover object-center" src="{{Storage::url($oneSimilar->image->url)}}" alt="">
                                @else
                                    <img class="flex-initial h-20 w-36 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg" alt=""> 
                                @endif

                                <span class="flex-1 ml-2 text-gray-600">{{$oneSimilar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>

</x-app-layout>