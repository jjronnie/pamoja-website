<section class="mt-28">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex items-center justify-center space-x-2 text-sm flex-wrap">
            @foreach($items as $key => $item)
                @if(isset($item['url']) && $key !== array_key_last($items))
                    <a href="{{ $item['url'] }}" class="text-gray-700 hover:text-red-900 transition">
                        {{ $item['label'] }}
                    </a>
                    <span class="text-gray-700 text-xs">/</span>
                @else
                    <span class="text-red-900 font-semibold max-w-[150px] truncate block">
                        {{ $item['label'] }}
                    </span>
                @endif
            @endforeach
        </div>
    </div>
</section>
