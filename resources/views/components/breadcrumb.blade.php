<section class="bg-gray-100 py-6 mt-20">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex items-center space-x-2 text-sm">
            @foreach($items as $key => $item)
                @if(isset($item['url']) && $key !== array_key_last($items))
                    <a href="{{ $item['url'] }}" class="text-gray-600 hover:text-red-900 transition">
                        {{ $item['label'] }}
                    </a>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                @else
                    <span class="text-red-900 font-semibold">{{ $item['label'] }}</span>
                @endif
            @endforeach
        </div>
    </div>
</section>
