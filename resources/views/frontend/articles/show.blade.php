<x-frontend :title="$article->heading">
    <div>
        <h1 class="font-semibold sm:text-xl md:text-2xl mb-1 leading-tight">
            {{$article->heading}}
        </h1>
        <div class="text-gray-600 text-xs md:text-sm mb-3">
            Published {{$article->createdAtHuman}}
            </a>
            <span class="whitespace-no-wrap">by <span class="text-gray-800">{{$article->user->name}}</span></span>
            </a>
            At {{$article->published_date_formatted}},
        </div>



        <div class="text-sm md:text-lg leading-relaxed">
            {!! $article->contentAsHtml !!}
        </div>
    </div>


</x-frontend>
