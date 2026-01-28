@extends('layouts.app')

@section('title', 'Jimicsi - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-32 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-6 sticky top-0 z-50 bg-background/80 backdrop-blur-lg">
        <div class="flex items-center gap-4">
            <a href="{{ route('gym.home') }}" class="h-12 w-12 flex items-center justify-center rounded-2xl bg-slate-900/50 text-white border border-white/5 transition-all hover:bg-primary">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h1 class="text-2xl font-black tracking-tight">Jimicsiga</h1>
        </div>
        <button class="h-12 w-12 flex items-center justify-center rounded-2xl bg-slate-800/50 text-white transition-all hover:bg-slate-700">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16a6.471 6.471 0 0 0 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            </svg>
        </button>
    </header>
    
    <main class="flex-1 px-6 space-y-10">
        <!-- Categories -->
        <section>
            <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-hide">
                @foreach(['Dhammaan', 'Cardio', 'Strength', 'Yoga', 'HIIT'] as $index => $cat)
                <button class="rounded-full px-8 py-3.5 text-sm font-black transition-all {{ $index === 0 ? 'bg-primary text-white shadow-xl shadow-primary/30' : 'bg-slate-900/60 text-slate-500 hover:text-white border border-white/5' }}">
                    {{ $cat }}
                </button>
                @endforeach
            </div>
        </section>

        <!-- Workouts Grid -->
        <section class="grid grid-cols-1 gap-8 pb-10">
            @foreach($workouts as $workout)
            <a href="{{ route('gym.video', $workout['id']) }}" class="relative block group overflow-hidden rounded-[3rem] bg-slate-900 border border-white/5 aspect-[1.3/1]">
                <img src="{{ $workout['image'] }}" alt="{{ $workout['title'] }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-70 grayscale-[0.3] group-hover:grayscale-0" />
                <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
                
                <div class="absolute bottom-8 left-8 right-8 flex items-end justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-slate-800/80 backdrop-blur-md text-[11px] font-black uppercase tracking-widest text-white italic border border-white/10">{{ strtoupper($workout['level']) }}</span>
                        <h3 class="text-3xl font-black text-white italic transition-colors group-hover:text-primary">{{ $workout['title'] }}</h3>
                        <div class="flex items-center gap-5 text-sm font-bold text-slate-300">
                            <div class="flex items-center gap-2">
                                <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $workout['duration'] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="h-5 w-5 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 23a7.5 7.5 0 0 1-5.138-12.963C8.204 8.774 11.5 6.5 11 1.5c6 4 9 8 3 14 1 0 2.5 0 5-2.47.27.773.5 1.604.5 2.47A7.5 7.5 0 0 1 12 23z"/>
                                </svg>
                                <span>{{ $workout['calories'] }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <button class="h-16 w-16 rounded-full bg-primary text-white flex items-center justify-center shadow-2xl shadow-primary/50 group-hover:scale-110 transition-transform">
                        <svg class="h-10 w-10 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </button>
                </div>
            </a>
            @endforeach
        </section>
    </main>
</div>
@endsection
