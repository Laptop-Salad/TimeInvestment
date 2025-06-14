@props([
    'title',
    'width' => 'min-w-[50%]',
    'height' => 'min=h-[50vh]'
])

<!-- Main modal -->
<div
    x-cloak
    x-data="{ open: false }"
    x-modelable="open"
    x-show="open"
    {{$attributes->except('class')}}
    tabindex="-1"
    class="bg-slate-800/25 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[100vh] max-h-full"
>
    <!-- Modal content -->
    <div class="flex flex-col relative bg-white rounded-lg shadow dark:bg-gray-700 {{$width}} {{$height}}">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                {{$title}}
            </h3>
            <x-button
                x-on:click="open = false"
                type="button"
                class="!text-lg !text-gray-200 hover:!text-gray-500 bg-transparent hover:!bg-transparent focus:!bg-transparent"
            >
                <i class="fa-solid fa-xmark"></i>
                <span class="sr-only">Close modal</span>
            </x-button>
        </div>
        <div class="flex flex-col flex-grow justify-between">
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                {{$slot}}
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                @isset($footer)
                    {{$footer}}
                @endisset
            </div>
        </div>
    </div>
</div>
