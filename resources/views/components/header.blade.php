<!-- Page Heading -->
<header class="border-b bg-white dark:bg-gray-800 shadow">
    <div class="max-h-max max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="py-6">
                @isset($header)
                    {{$header}}
                @endisset
            </div>
            <div class="flex space-x-2 items-center">
                @isset($actions)
                    {{$actions}}
                @endisset
            </div>
        </div>
    </div>
</header>

@isset($tabs)
    <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="hidden space-x-8 sm:-my-px  sm:flex">
                        {{$tabs}}
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endisset
