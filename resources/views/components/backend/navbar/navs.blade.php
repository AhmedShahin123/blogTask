@props(['isMobile' => false])
<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

@php

    $menus = [
        'Articles' => route('backend.article.index'),
        'Users' => route('backend.user.index'),
        ];


@endphp

@foreach($menus as $menu => $url)
    @php
        $isActive = request()->url() == $url;
    @endphp

    <a href="{{$url}}" @class([
        'px-3 py-2 rounded-md font-medium',
        'text-sm' => !$isMobile,
        'text-base block' => $isMobile,
        'bg-gray-900 text-white' => $isActive,
        'text-gray-300 hover:bg-gray-700 hover:text-white' => !$isActive,
    ])>

        {{$menu}}

    </a>

@endforeach
