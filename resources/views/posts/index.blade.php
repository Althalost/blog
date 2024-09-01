<x-app-layout>

    <div class="container py-8">
        <header>
            <h2 class="text-2xl text-start text-gray-500 font-bold">Lastest posts</h2>
        </header>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($posts as $post)
                @if ($loop->first)
                    <article class="w-full h-96 bg-cover bg-center rounded shadow col-span-1 md:col-span-2 lg:col-span-3 my-11 bg-transparen" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg @endif )">
                        <div class="w-full h-full px-8 flex flex-col justify-center my-11">

                            <div>
                                
                                @foreach ($post->tags as $tag)
                                    <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-md">{{$tag->name}}</a>
                                @endforeach
                            </div>

                            <h1 class="text-4xl text-white leading-10 font-bold mt-2 text-ellipsis overflow-hidden">
                                <a href="{{route('posts.show', $post)}}">
                                    {{$post->name}}
                                </a>
                            </h1>
                        </div>
                    </article>
                @else
                    <article class="w-full h-80 bg-cover bg-center rounded shadow col-span-1 md:col-span-1 lg:col-span-1" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg @endif )">
                        <div class="w-full h-full px-8 flex flex-col justify-center my-11">

                            <div>
                                
                                @foreach ($post->tags as $tag)
                                    <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-md">{{$tag->name}}</a>
                                @endforeach
                            </div>

                            <h1 class="text-4xl text-white leading-10 font-bold mt-2 text-ellipsis overflow-hidden">
                                <a href="{{route('posts.show', $post)}}">
                                    {{$post->name}}
                                </a>
                            </h1>
                        </div>
                    </article>
                @endif
                
            @endforeach

            {{-- @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center rounded shadow @if($loop->first) md:col-span-3 my-11 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg @endif )">
                    <div class="w-full h-full px-8 flex flex-col justify-center my-11">

                        <div>
                            
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-10 font-bold mt-2 text-ellipsis overflow-hidden">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach --}}

        </div>

        <div class="mt-4">
            {{$posts->Links()}}
        </div>
       
    </div>

</x-app-layout>