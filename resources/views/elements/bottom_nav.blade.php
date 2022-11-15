<header class="w-full max-w-md flex items-center bg-quarternary fixed bottom-0 z-[9999]">
    <div class="w-full flex items-center py-1.5">
        <div class="container mx-auto">
            <nav>
                <ul class="grid grid-cols-2">
                    <li class="flex flex-col items-center justify-center">
                        <a href="/" class="flex items-center justify-center {{ (request()->is('/')) ? 'bg-tertiary rounded-full' : '' }}  p-1.5 w-[40%]">
                            <span class="{{ (request()->is('/')) ? 'material-symbols-outlined text-slate-800' : 'material-symbols-rounded text-secondary' }}">import_contacts</span>
                        </a>
                        <span class="text-xs flex items-center justify-center text-secondary">Library</span>
                    </li>
                    <li class="flex flex-col items-center justify-center">
                        <a href="profile" class="flex items-center justify-center {{ (request()->is('profile*')) ? 'bg-tertiary rounded-full' : '' }} p-1.5 w-[40%]">
                            <span class="{{ (request()->is('profile*')) ? 'material-symbols-outlined text-slate-800' : 'material-symbols-rounded text-secondary' }}">person</span>
                        </a>
                        <span class="text-xs flex items-center justify-center text-secondary">Profile</span>
                    </li>
                </ul>
                
            </nav>
        </div>
    </div>
</header>