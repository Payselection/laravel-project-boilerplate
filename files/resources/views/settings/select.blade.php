<label class="block">
    <span class="text-gray-700">{{ $title }}</span>
    <select name="{{ $name }}"

        @if(isset($required) and $required)
            required
        @endif

        class="
            block
            w-full
            mt-1
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
        "
    >
        @foreach ($options as $option)
            <option value="{{ $option->value }}" {{ ($value === $option->value) ? 'selected' : '' }}>{{ $option->title() }}</option>
        @endforeach
    </select>
</label>
