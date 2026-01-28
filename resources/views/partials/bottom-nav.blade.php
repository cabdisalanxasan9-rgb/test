<div class="fixed bottom-0 left-0 right-0 z-50 flex h-24 items-center justify-around bg-background/80 px-6 pb-6 backdrop-blur-2xl border-t border-white/5 shadow-[0_-10px_40px_rgba(0,0,0,0.5)]">
    <!-- Home -->
    <a href="{{ route('gym.home') }}" class="relative flex flex-col items-center justify-center space-y-1 group">
        <div class="transition-all {{ request()->routeIs('gym.home') ? 'text-primary' : 'text-slate-500 hover:text-white' }}">
            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
        </div>
        <span class="text-[11px] font-black uppercase tracking-widest {{ request()->routeIs('gym.home') ? 'text-primary' : 'text-slate-500' }}">Hoyga</span>
    </a>

    <!-- Schedule -->
    <a href="{{ route('gym.schedule') }}" class="relative flex flex-col items-center justify-center space-y-1 group">
        <div class="transition-all {{ request()->routeIs('gym.schedule') ? 'text-primary' : 'text-slate-500 hover:text-white' }}">
            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/>
            </svg>
        </div>
        <span class="text-[11px] font-black uppercase tracking-widest {{ request()->routeIs('gym.schedule') ? 'text-primary' : 'text-slate-500' }}">Jadwalka</span>
    </a>

    <!-- Add Button -->
    <div class="relative -top-10">
        <a href="{{ route('gym.add-workout') }}" class="flex h-16 w-16 items-center justify-center rounded-full bg-primary text-white nav-glow hover:scale-110 active:scale-95 transition-all shadow-2xl">
            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
            </svg>
        </a>
    </div>

    <!-- Workouts/Results -->
    <a href="{{ route('gym.workouts') }}" class="relative flex flex-col items-center justify-center space-y-1 group">
        <div class="transition-all {{ request()->routeIs('gym.workouts') ? 'text-primary' : 'text-slate-500 hover:text-white' }}">
            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21 5H3c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-8 12h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
        </div>
        <span class="text-[11px] font-black uppercase tracking-widest {{ request()->routeIs('gym.workouts') ? 'text-primary' : 'text-slate-500' }}">Jimicsi</span>
    </a>

    <!-- Dashboard -->
    <a href="{{ route('gym.dashboard') }}" class="relative flex flex-col items-center justify-center space-y-1 group">
        <div class="h-9 w-9 overflow-hidden rounded-full border-2 {{ request()->routeIs('gym.dashboard') ? 'border-primary' : 'border-white/10' }} group-hover:border-primary transition-all shadow-lg mb-1">
            <img src="{{ Auth::user()->avatar ?? 'https://i.pravatar.cc/150' }}" alt="Profile" class="h-full w-full object-cover">
        </div>
        <span class="text-[10px] font-black uppercase tracking-widest {{ request()->routeIs('gym.dashboard') ? 'text-primary' : 'text-slate-500' }}">Dashboard</span>
    </a>
</div>
