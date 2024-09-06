<nav class="relative bg-slate-100 dark:bg-gray-700 shadow-lg" x-data="{ open: false }">
    <div class="static mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="static z-10 flex h-16 items-center justify-between">
        <div class="relative inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button x-on:click="open = true" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            {{-- logo --}}
          <a href="/" class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </a>
  
          {{-- Menu lg--}}
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex items-center">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              {{-- <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a> --}}
              <a href="{{route('posts.index')}}" class="text-center py-5 px-3 font-medium text-gray-600 hover:bg-slate-300 hover:text-gray-800 dark:text-gray-300  dark:hover:text-gray-100 dark:hover:bg-slate-800">
                Home
              </a> 
              @foreach ($categories as $category)
                <a href="{{route('posts.category', $category)}}" class="text-center py-5 px-3 font-medium text-gray-600 hover:bg-slate-300 hover:text-gray-800 {{ request()->is('category/'. $category->slug) ? 'bg-slate-300' : '' }} dark:text-gray-300  dark:hover:text-gray-100 dark:hover:bg-slate-800">
                  {{$category->name}}
                </a> 
              @endforeach
             
              
            </div>
          </div>
        </div>
  
        <livewire:search-input/>
        

        @auth
            
        <div class="static inset-y-0 right-0 top-1 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
  
              {{-- Notifications button --}}
            <button type="button" class="relative rounded-full bg-slate-300 p-1 text-gray-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 focus:ring-offset-gray-800 dark:bg-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>
    
            <!-- Profile dropdown -->
            <div class="relative ml-3" x-data="{ open: false }">
              <div>
                <button x-on:click="open = true" type="button" class="relative flex rounded-full bg-gray-800 text-sm border-gray-600 border focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-600" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                </button>
              </div>
    
              <!--
                Dropdown menu, show/hide based on menu state.
    
                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div x-show="open" x-on:click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
  
                <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                  Your Profile
                </a>
  
                @can('admin.home')
                  <a href="{{route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                    Dashboard
                  </a>
                @endcan
                
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
  
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2"
                  @click.prevent="$root.submit();">Sign out</a>
  
                </form>
  
              </div>
            </div>
  
        </div>
  
        @else
  
          <div>
            <a href="{{route('login')}}" class="rounded-md px-3 py-2 mr-2 text-sm font-medium text-gray-700 hover:bg-gray-600 hover:text-white dark:text-gray-100">
              Login
            </a>
  
            <a href="{{route('register')}}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-600 hover:text-white dark:text-gray-100">
              Register
            </a>
          </div>
  
        @endauth
  
       
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" x-show="open" x-on:click.away=" open = false" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        {{-- <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a> --}}
        @foreach ($categories as $category)
          <a href="{{route('posts.category', $category)}}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:bg-gray-700 hover:text-white">
            {{$category->name}}
          </a>  
        @endforeach
       
  
      </div>
    </div>
  </nav>  
