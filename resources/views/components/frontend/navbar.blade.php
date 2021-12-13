<!--Medium Device-->
<div class="mb-0 py-2 justify-between items-center hidden md:flex">
    <a href="/" class="flex items-center">
        <img src="{{asset('img/logo.png')}}" alt="logo" class="rounded-full h-10 w-10 object-cover object-center">
        <div class="ml-4 font-semibold">Blog Platform</div>
        <a href="{{route('articles','sort')}}" class="font-semibold">Sort By Publication Date</a>
    </a>

    <div>
        <a href="{{route('signup-form')}}" class="uppercase hover:underline">Sign Up</a>
        <a href="{{route('login-form')}}" class="uppercase hover:underline">Log in</a>
    </div>
</div>

<!--Small device-->
<div class="mb-0 py-2 md:hidden">
    <div class="flex justify-between items-center">

        <a href="/" class="flex items-center">
            <img src="{{asset('img/logo.png')}}" alt="logo"
                 class="rounded-full h-10 w-10 object-cover object-center">
            <div class="ml-4 font-semibold">Al Imran Ahmed</div>
        </a>

        <a class="rounded-full text-red-900 bg-red-500 hidden sm-hide-menu"
           onclick="document.querySelector('.sm-navs').classList.add('hidden');
       document.querySelector('.sm-show-menu').classList.remove('hidden');
        document.querySelector('.sm-hide-menu').classList.add('hidden');">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                <path class="heroicon-ui"
                      d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/>
            </svg>
        </a>

        <a class="inset rounded-full text-blue-900 sm-show-menu"
           onclick="document.querySelector('.sm-navs').classList.remove('hidden');
       document.querySelector('.sm-show-menu').classList.add('hidden');
        document.querySelector('.sm-hide-menu').classList.remove('hidden');">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                <path class="heroicon-ui"
                      d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
            </svg>
        </a>
    </div>

    <div class="sm-navs hidden">

        <div class="mt-4">
            <a href="{{route('articles')}}" class="uppercase hover:underline">Blog</a>
        </div>

    </div>
</div>
