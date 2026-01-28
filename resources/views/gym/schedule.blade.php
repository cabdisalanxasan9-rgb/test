@extends('layouts.app')

@section('title', 'Schedule - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-32 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-6 sticky top-0 z-50 bg-background/80 backdrop-blur-lg">
        <div class="h-12 w-12 flex items-center justify-center rounded-2xl bg-slate-900/50 text-primary border border-white/5">
            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/>
            </svg>
        </div>
        <h1 class="text-xl font-black tracking-tight">Jadwalka Jimicsiyada</h1>
        <button class="h-12 w-12 flex items-center justify-center rounded-full bg-slate-800/50 text-white transition-all hover:bg-slate-700">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22zm7-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C8.63 5.36 7 7.92 7 11v5l-2 2v1h14v-1l-2-2z"/>
            </svg>
        </button>
    </header>
    
    <main class="flex-1 px-6 space-y-10">
        <!-- Success Message -->
        @if(session('success'))
        <div class="glass-card !bg-primary/20 !border-primary/50 !p-6 flex items-center gap-4 animate-in slide-in-from-top duration-500">
            <div class="h-12 w-12 rounded-full bg-primary text-white flex items-center justify-center flex-shrink-0">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="font-black text-sm text-primary tracking-wide">{{ session('success') }}</p>
        </div>
        @endif

        <!-- Date Strip -->
        <section>
            <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-hide">
                @foreach($dates as $item)
                <button class="flex min-w-[85px] flex-col items-center justify-center rounded-[2rem] py-8 border border-white/5 transition-all {{ $item['active'] ? 'bg-primary text-white shadow-2xl shadow-primary/40' : 'bg-slate-900/40 text-slate-500' }}">
                    <span class="text-[11px] font-black uppercase tracking-widest mb-3 opacity-80">{{ $item['day'] }}</span>
                    <span class="text-3xl font-black leading-none">{{ $item['date'] }}</span>
                </button>
                @endforeach
            </div>
        </section>

        <!-- Categories -->
        <section class="space-y-6">
            <h2 class="text-2xl font-black tracking-tight">Noocyada Jimicsiga</h2>
            <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-hide">
                @foreach($categories as $index => $cat)
                <button class="rounded-full px-8 py-3.5 text-sm font-black transition-all {{ $index === 0 ? 'bg-primary text-white shadow-xl shadow-primary/30' : 'bg-slate-900/60 text-slate-500 hover:text-white border border-white/5' }}">
                    {{ $cat }}
                </button>
                @endforeach
            </div>
        </section>

        <!-- Sessions List -->
        <section class="space-y-6 pb-10">
            @foreach($sessions as $session)
            <div class="card-base p-7 border-none bg-slate-900/40 space-y-8">
                <div class="flex justify-between items-start">
                    <div class="space-y-3">
                        @if($session['active'])
                        <div class="flex items-center gap-2 text-primary">
                            <span class="h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                            <span class="text-[11px] font-black uppercase tracking-[0.2em]">HADDA SOCDA</span>
                        </div>
                        @else
                        <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 italic">{{ strtoupper($session['category'] ?? 'Jimicsi') }}</span>
                        @endif
                        <h3 class="text-2xl font-black leading-tight">{{ $session['title'] }}</h3>
                        <div class="flex items-center gap-2 text-sm font-bold text-slate-500">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $session['time'] }}</span>
                        </div>
                    </div>
                    <div class="h-20 w-20 rounded-[1.75rem] overflow-hidden shadow-2xl">
                        <img src="{{ $session['image'] }}" alt="" class="h-full w-full object-cover">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="h-12 w-12 overflow-hidden rounded-full border border-white/10 shadow-lg font-black tracking-tight">
                            <img src="https://i.pravatar.cc/150?u={{ $session['trainer'] }}" alt="" class="h-full w-full object-cover">
                        </div>
                        <span class="text-sm font-bold text-slate-300">{{ $session['trainer'] }}</span>
                    </div>
                    
                    @php
                        $isBooked = in_array($session['id'], session('booked_sessions', []));
                    @endphp

                    @if($session['status'] === 'Full')
                    <button class="px-8 py-3.5 rounded-full bg-[#111928] text-primary/60 text-sm font-black shadow-inner">
                        Full
                    </button>
                    @elseif($isBooked)
                    <div class="flex items-center gap-2 px-6 py-3.5 rounded-full bg-primary/10 text-primary border border-primary/30">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        <span class="text-sm font-black">Ballansan</span>
                    </div>
                    @else
                    <a href="{{ route('gym.book.confirm', $session['id']) }}" class="px-8 py-3.5 rounded-full bg-primary text-white text-sm font-black shadow-xl shadow-primary/30 active:scale-95 transition-all hover:scale-105">
                        Boos qabso
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </section>
    </main>
</div>
@endsection
