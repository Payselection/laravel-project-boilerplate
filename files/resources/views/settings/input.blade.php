<label class="block">
    <span class="text-gray-700">{{ $title }}</span>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" value="{{ $value }}"
    
        @if(isset($required) and $required)
            required
        @endif
        @isset($pattern)
            pattern="{{ $pattern }}"
        @endisset

        class="
            mt-1
            block
            w-full
            rounded-md
            border-gray-300
            
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
        "
    >
</label>