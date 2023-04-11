<div class="block">
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center">
                <input type="checkbox" name="{{ $name }}" 
                
                    @isset($id)
                        id="{{ $id }}"
                    @endisset
                    @if($checked)
                        checked
                    @endif
                    @if(isset($required) and $required)
                        required
                    @endif

                    class="
                        rounded
                        border-gray-300
                        text-indigo-600
                        shadow-sm
                        focus:border-indigo-300
                        focus:ring
                        focus:ring-offset-0
                        focus:ring-indigo-200
                        focus:ring-opacity-50
                    "
                >
                <span class="ml-2">{{ $title }}</span>
            </label>
        </div>
    </div>
</div>
