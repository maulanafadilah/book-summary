<header class="w-full max-w-md flex items-center bg-quarternary fixed top-0 z-[9999]">
    <div class="w-full flex items-center py-1.5">
        <div class="container mx-auto">
            <nav>
                <ul class="grid grid-cols-3">
                    <li class="flex items-center justify-start">
                    @if(session()->has('success'))
                        <a href="javascript:window.history.go(-3);" class="flex items-center justify-center py-1 w-[50%]">
                            <span class="material-symbols-rounded text-lg text-gray-700">arrow_back_ios_new</span>
                        </a>
                    @else
                        <a href="javascript:window.history.go(-1);" class="flex items-center justify-center py-1 w-[50%]">
                            <span class="material-symbols-rounded text-lg text-gray-700">arrow_back_ios_new</span>
                        </a>
                    @endif
                    </li>
                    <li class="flex items-center justify-center">
                        <h4 class="text-sm flex items-center justify-center font-semibold text-slate-900">{{ $page_title }}</h4>
                    </li>
                </ul>
                
            </nav>
        </div>
    </div>
</header>