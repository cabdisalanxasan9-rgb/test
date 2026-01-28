@extends('layouts.app')

@section('title', 'Dashboard - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-32 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-6 sticky top-0 z-50 bg-background/80 backdrop-blur-lg">
        <div class="flex items-center gap-4">
            <div class="h-12 w-12 overflow-hidden rounded-full border-2 border-white/10 shadow-xl">
                <img src="{{ $user['avatar'] ?? 'https://i.pravatar.cc/150?u=axmedcali' }}" alt="Profile" class="h-full w-full object-cover">
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-500">Ku soo dhawaaw</p>
                <h1 class="text-xl font-black tracking-tight">{{ $user['name'] }}</h1>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex h-12 w-12 items-center justify-center rounded-full bg-red-500/10 text-red-500 transition-all hover:bg-red-500 hover:text-white" title="Kabax">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
            </button>
            <button class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-800/50 text-white transition-all hover:bg-slate-700">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22zm7-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C8.63 5.36 7 7.92 7 11v5l-2 2v1h14v-1l-2-2z"/>
                </svg>
            </button>
        </div>
    </header>

    <main class="flex-1 px-6 space-y-10">
        <!-- Weekly Goal Card -->
        <section class="card-base p-8 bg-gradient-to-br from-slate-900 to-slate-900 border-none relative overflow-hidden">
            <div class="flex items-center justify-between relative z-10">
                <div class="space-y-4">
                    <p class="text-[11px] font-black uppercase tracking-[0.2em] text-primary">Hadafka Toddobaadka</p>
                    <div class="space-y-1">
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black">{{ $weeklyGoal['percentage'] }}%</span>
                            <span class="text-lg font-black tracking-tight">Dhammaystiran</span>
                        </div>
                    </div>
                </div>
                
                <div class="relative flex items-center justify-center">
                    <svg class="h-24 w-24 transform -rotate-90">
                        <circle cx="48" cy="48" r="42" stroke="currentColor" stroke-width="10" fill="transparent" class="text-slate-800" />
                        <circle cx="48" cy="48" r="42" stroke="currentColor" stroke-width="10" fill="transparent" stroke-dasharray="264" stroke-dashoffset="{{ 264 - (264 * $weeklyGoal['percentage'] / 100) }}" class="text-primary" />
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-xl font-black">{{ $weeklyGoal['current'] }}/{{ $weeklyGoal['total'] }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-6 h-2 w-full rounded-full bg-slate-800">
                <div class="h-full bg-primary rounded-full" style="width: {{ $weeklyGoal['percentage'] }}%"></div>
            </div>
        </section>

        <!-- Stats Grid -->
        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-black tracking-tight">Xogtaada Maanta</h2>
                <a href="#" class="text-sm font-bold text-primary hover:underline">Faahfaahin</a>
            </div>
            
            <div class="grid grid-cols-3 gap-4">
                @foreach($stats as $stat)
                <div class="card-base p-5 flex flex-col items-center border-none bg-slate-900/40">
                    <div class="h-12 w-12 rounded-2xl bg-{{ $stat['color'] }}-500/10 text-{{ $stat['color'] }}-500 flex items-center justify-center mb-4">
                        @if($stat['icon'] === 'flame')
                        <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 23a7.5 7.5 0 0 1-5.138-12.963C8.204 8.774 11.5 6.5 11 1.5c6 4 9 8 3 14 1 0 2.5 0 5-2.47.27.773.5 1.604.5 2.47A7.5 7.5 0 0 1 12 23z"/>
                        </svg>
                        @elseif($stat['icon'] === 'timer')
                        <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm.5-13H11v6l5.2 3.1.8-1.2-4.5-2.7V7z"/>
                        </svg>
                        @else
                        <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        @endif
                    </div>
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-widest mb-1">{{ $stat['label'] }}</span>
                    <span class="text-2xl font-black">{{ $stat['value'] }}</span>
                    <span class="text-[10px] font-bold text-slate-600">{{ $stat['unit'] }}</span>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Jimicsiga Maanta -->
        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-black tracking-tight">Jimicsiga Maanta</h2>
                <span class="text-sm font-bold text-slate-500">Isniin, 22 Okt</span>
            </div>
            
            <div class="relative overflow-hidden rounded-[3rem] bg-slate-900 border border-white/5 aspect-[1.2/1]">
                <img src="{{ $todayWorkout['image'] }}" alt="Workout" class="h-full w-full object-cover grayscale-[0.2] opacity-70" />
                <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
                
                <div class="absolute bottom-8 left-8 right-8 flex items-end justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-primary text-[11px] font-black uppercase tracking-widest text-white italic">{{ strtoupper($todayWorkout['level']) }}</span>
                        <h3 class="text-3xl font-black text-white italic">{{ $todayWorkout['title'] }}</h3>
                        <div class="flex items-center gap-3 text-sm font-bold text-slate-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $todayWorkout['duration'] }} • {{ $todayWorkout['calories'] }}</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('gym.video', $todayWorkout['id']) }}" class="h-16 w-16 rounded-full bg-primary text-white flex items-center justify-center shadow-2xl shadow-primary/50 hover:scale-110 transition-transform">
                        <svg class="h-10 w-10 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Qorshaha Berri -->
        <section class="space-y-6">
            <h2 class="text-2xl font-black tracking-tight">Qorshaha Berri</h2>
            <div class="card-base p-6 border-none bg-slate-900/40 flex items-center justify-between">
                <div class="flex items-center gap-5">
                    <div class="h-16 w-16 overflow-hidden rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?q=80&w=400" alt="Next Workout" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <h3 class="text-xl font-black tracking-tight">Xabadka & Gacmaha</h3>
                        <p class="text-sm font-bold text-slate-500">Khamiis • 07:00 Subaxnimo</p>
                    </div>
                </div>
                <button class="text-slate-500">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </section>
    </main>
</div>
@endsection
