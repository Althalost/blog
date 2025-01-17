<div class="container py-8 relative">
    @if ($search == '')
    <div class="text-lg font-sans  text-gray-600 mb-6 dark:text-gray-200 w-full rounded relative left-0 block bg-gray-200 dark:bg-slate-600 p-6">
        <h1 class="text-4xl font-bold text-gray-600 my-6 dark:text-gray-200">{{$post->name}}</h1>
        {!!$post->extract!!}
            <div class="block">
                <img class="w-10 h-10 rounded-full mr-3 mb-4 border-2 border-gray-500 inline-block" src="{{$post->user->profile_photo_url}}" alt="author-profile-photo">
            <div class="inline-block h-10">
                <span class="text-gray-700 text-sm mt-4 dark:text-gray-300 block">{{$post->user->name}}</span>
                <span class="text-gray-600 text-sm dark:text-gray-400 block">Published on {{$post->created_at->format('M d, Y')}}</span>
            </div>
        </div>
    </div>     


    <div class="grid grid-cols-1 lg:grid-cols-3 grid-flow-row gap-8">

       
        {{-- Main Content --}}
        <div class="col-span-1 lg:col-span-2">

            <figure>
                @if ($post->image)
                   <img class="w-full h-96 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                @else
                    <img class="w-full h-96 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg" alt=""> 
                @endif
            </figure>

            <div class="text-lg font-sans text-gray-700 mt-8 dark:text-gray-300">
                {!!$post->body!!}
            </div>

        </div>

        {{-- Related Content --}}
        <div class="col-span-1 lg:col-span-1">
            <aside>
                <h1 class="text-2xl font-bold border-b-2 border-gray-400 text-gray-600 mb-4 dark:text-gray-100">More of "{{$post->category->name}}"</h1>

                <ul>
                    @foreach ($similar as $oneSimilar)
                        <li class="mb-4 leading-4 text-sm">
                            <a class="flex text-ellipsis overflow-hidden bg-white shadow h-20 dark:bg-gray-500" href="{{route('posts.show', $oneSimilar)}}">
                                @if ($oneSimilar->image)
                                    <img class="flex-initial h-20 w-36 object-cover object-center" src="{{Storage::url($oneSimilar->image->url)}}" alt="">
                                @else
                                    <img class="flex-initial h-20 w-36 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg" alt=""> 
                                @endif

                                <span class="flex-1 w-36 ml-2 text-gray-600 px-2 py-5 dark:text-gray-100">{{$oneSimilar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>

        {{-- Author And Comments --}}
        <div class="col-span-1 lg:col-span-2">
            
            <div class="p-5 rounded text-gray-500 my-8 bg-gray-200 shadow dark:bg-slate-700 dark:text-gray-200">
                <div class="flex items-center">
                    <img class="w-16 h-16 rounded-full mr-3 border-2 border-gray-500" src="{{$post->user->profile_photo_url}}" alt="author-profile-photo">
                    <div class="text-sm">
                        <a href="{{route('posts.blogger', $post->user->id)}}"
                            class="font-medium leading-none text-gray-900 hover:text-indigo-600 transition duration-500 ease-in-out dark:text-gray-200 dark:hover:text-white">
                            {{$post->user->name}}
                        </a>
                        <p>Author</p>
                    </div>
                </div>
            
                @if (isset($post->user->blogger->presentation))
                    <p class="mt-2 text-sm text-gray-900 dark:text-gray-200">
                        {{$post->user->blogger->presentation}}
                    </p>
                @endif
            
                <div class="flex mt-4">
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600 dark:hover:text-gray-200" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <path id="Twitter" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                                5.373,-12 12,-12c6.627,0 12,5.373 12,12Zm-6.465,-3.192c-0.379,0.168
                                -0.786,0.281 -1.213,0.333c0.436,-0.262 0.771,-0.676
                                0.929,-1.169c-0.408,0.242 -0.86,0.418 -1.341,0.513c-0.385,-0.411
                                -0.934,-0.667 -1.541,-0.667c-1.167,0 -2.112,0.945 -2.112,2.111c0,0.166
                                0.018,0.327 0.054,0.482c-1.754,-0.088 -3.31,-0.929
                                -4.352,-2.206c-0.181,0.311 -0.286,0.674 -0.286,1.061c0,0.733 0.373,1.379
                                0.94,1.757c-0.346,-0.01 -0.672,-0.106 -0.956,-0.264c-0.001,0.009
                                -0.001,0.018 -0.001,0.027c0,1.023 0.728,1.877 1.694,2.07c-0.177,0.049
                                -0.364,0.075 -0.556,0.075c-0.137,0 -0.269,-0.014 -0.397,-0.038c0.268,0.838
                                1.048,1.449 1.972,1.466c-0.723,0.566 -1.633,0.904 -2.622,0.904c-0.171,0
                                -0.339,-0.01 -0.504,-0.03c0.934,0.599 2.044,0.949 3.237,0.949c3.883,0
                                6.007,-3.217 6.007,-6.008c0,-0.091 -0.002,-0.183 -0.006,-0.273c0.413,-0.298
                                0.771,-0.67 1.054,-1.093Z"></path>
                        </svg>
                    </a>
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600 dark:hover:text-gray-200" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <path id="Facebook" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                                5.373,-12 12,-12c6.627,0 12,5.373
                                12,12Zm-11.278,0l1.294,0l0.172,-1.617l-1.466,0l0.002,-0.808c0,-0.422
                                0.04,-0.648 0.646,-0.648l0.809,0l0,-1.616l-1.295,0c-1.555,0 -2.103,0.784
                                -2.103,2.102l0,0.97l-0.969,0l0,1.617l0.969,0l0,4.689l1.941,0l0,-4.689Z"></path>
                        </svg>
                    </a>
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600 dark:hover:text-gray-200" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <g id="Layer_1">
                                <circle id="Oval" cx="12" cy="12" r="12"></circle>
                                <path id="Shape" d="M19.05,8.362c0,-0.062 0,-0.125 -0.063,-0.187l0,-0.063c-0.187,-0.562
                                    -0.687,-0.937 -1.312,-0.937l0.125,0c0,0 -2.438,-0.375 -5.75,-0.375c-3.25,0
                                    -5.75,0.375 -5.75,0.375l0.125,0c-0.625,0 -1.125,0.375
                                    -1.313,0.937l0,0.063c0,0.062 0,0.125 -0.062,0.187c-0.063,0.625 -0.25,1.938
                                    -0.25,3.438c0,1.5 0.187,2.812 0.25,3.437c0,0.063 0,0.125
                                    0.062,0.188l0,0.062c0.188,0.563 0.688,0.938 1.313,0.938l-0.125,0c0,0
                                    2.437,0.375 5.75,0.375c3.25,0 5.75,-0.375 5.75,-0.375l-0.125,0c0.625,0
                                    1.125,-0.375 1.312,-0.938l0,-0.062c0,-0.063 0,-0.125
                                    0.063,-0.188c0.062,-0.625 0.25,-1.937 0.25,-3.437c0,-1.5 -0.125,-2.813
                                    -0.25,-3.438Zm-4.634,3.927l-3.201,2.315c-0.068,0.068 -0.137,0.068
                                    -0.205,0.068c-0.068,0 -0.136,0 -0.204,-0.068c-0.136,-0.068 -0.204,-0.204
                                    -0.204,-0.34l0,-4.631c0,-0.136 0.068,-0.273 0.204,-0.341c0.136,-0.068
                                    0.272,-0.068 0.409,0l3.201,2.316c0.068,0.068 0.136,0.204
                                    0.136,0.34c0.068,0.136 0,0.273 -0.136,0.341Z" style="fill: rgb(255, 255, 255);"></path>
                            </g>
                        </svg>
                    </a>
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600 dark:hover:text-gray-200" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <path id="Shape" d="M7.3,0.9c1.5,-0.6 3.1,-0.9 4.7,-0.9c1.6,0 3.2,0.3 4.7,0.9c1.5,0.6 2.8,1.5
                                3.8,2.6c1,1.1 1.9,2.3 2.6,3.8c0.7,1.5 0.9,3 0.9,4.7c0,1.7 -0.3,3.2
                                -0.9,4.7c-0.6,1.5 -1.5,2.8 -2.6,3.8c-1.1,1 -2.3,1.9 -3.8,2.6c-1.5,0.7
                                -3.1,0.9 -4.7,0.9c-1.6,0 -3.2,-0.3 -4.7,-0.9c-1.5,-0.6 -2.8,-1.5
                                -3.8,-2.6c-1,-1.1 -1.9,-2.3 -2.6,-3.8c-0.7,-1.5 -0.9,-3.1 -0.9,-4.7c0,-1.6
                                0.3,-3.2 0.9,-4.7c0.6,-1.5 1.5,-2.8 2.6,-3.8c1.1,-1 2.3,-1.9
                                3.8,-2.6Zm-0.3,7.1c0.6,0 1.1,-0.2 1.5,-0.5c0.4,-0.3 0.5,-0.8 0.5,-1.3c0,-0.5
                                -0.2,-0.9 -0.6,-1.2c-0.4,-0.3 -0.8,-0.5 -1.4,-0.5c-0.6,0 -1.1,0.2
                                -1.4,0.5c-0.3,0.3 -0.6,0.7 -0.6,1.2c0,0.5 0.2,0.9 0.5,1.3c0.3,0.4 0.9,0.5
                                1.5,0.5Zm1.5,10l0,-8.5l-3,0l0,8.5l3,0Zm11,0l0,-4.5c0,-1.4 -0.3,-2.5
                                -0.9,-3.3c-0.6,-0.8 -1.5,-1.2 -2.6,-1.2c-0.6,0 -1.1,0.2 -1.5,0.5c-0.4,0.3
                                -0.8,0.8 -0.9,1.3l-0.1,-1.3l-3,0l0.1,2l0,6.5l3,0l0,-4.5c0,-0.6 0.1,-1.1
                                0.4,-1.5c0.3,-0.4 0.6,-0.5 1.1,-0.5c0.5,0 0.9,0.2 1.1,0.5c0.2,0.3 0.4,0.8
                                0.4,1.5l0,4.5l2.9,0Z"></path>
                        </svg>
                    </a>
                </div>

            </div>

            <div class="py-3 h-10 relative justify-items-end border-b-2 border-gray-400">
                <div class="inline-block absolute right-6 top-1">
                    <livewire:like-buttom :key="$post->id" :post="$post"/>
                </div>
            </div>

            <livewire:post-comments :key="'comments' . $post->id" :$post />

        </div>
    </div> 
    @else
        <div class="relative container py-3 px-4 lg:px-0 lg:py-8">
            @livewire('post-list', ['search' => $search])
        </div>
    @endif

</div>

