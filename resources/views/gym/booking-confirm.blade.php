@extends('layouts.app')

@section('title', 'Xaqiijinta Ballanta - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-32 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-6 sticky top-0 z-50 bg-background/80 backdrop-blur-lg">
        <a href="{{ route('gym.schedule') }}" class="h-12 w-12 flex items-center justify-center rounded-2xl bg-slate-900/50 text-white border border-white/5 transition-all hover:bg-primary">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-xl font-black tracking-tight">Xaqiiji Ballanta</h1>
        <div class="h-12 w-12"></div>
    </header>
    
    <main class="flex-1 px-6 space-y-8">
        <!-- Session Summary Card -->
        <div class="card-base p-8 space-y-6 relative overflow-hidden">
            <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary/10 blur-2xl"></div>
            
            <div class="space-y-2">
                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-primary italic">Xulashadaada</span>
                <h2 class="text-4xl font-black italic tracking-tighter">{{ $session['title'] }}</h2>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Saacadda</span>
                    <div class="flex items-center gap-2 font-bold text-slate-200">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $session['time'] }}
                    </div>
                </div>
                <div class="space-y-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Macalinka</span>
                    <div class="flex items-center gap-2 font-bold text-slate-200">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        {{ $session['trainer'] }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirmation Form -->
        <form action="{{ route('gym.book.store') }}" method="POST" class="space-y-8">
            @csrf
            <input type="hidden" name="session_id" value="{{ $session['id'] }}">
            
            <div class="space-y-6">
                <div class="space-y-3">
                    <label class="text-sm font-black uppercase tracking-widest text-slate-400 ml-1">Nambarka Taleefanka</label>
                    <input type="tel" name="phone" required 
                           class="w-full rounded-[2rem] bg-slate-900/50 border border-white/5 p-6 text-xl font-bold focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all placeholder:text-slate-600 shadow-2xl"
                           placeholder="061XXXXXXX">
                </div>

                <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/5">
                    <div class="h-5 w-5 rounded-full border-2 border-primary flex-shrink-0 mt-1"></div>
                    <p class="text-[13px] font-bold text-slate-400 leading-relaxed">
                        Waxaan ogolahay in lala socodsiiyo macalinka ballantan, lana ii soo diwaangeliyo booska jimicsigan.
                    </p>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-primary w-full py-6 text-xl">
                    Xaqiiji Ballanta Hadda
                </button>
                <div class="mt-6 flex items-center justify-center gap-2 text-xs font-black uppercase tracking-widest text-slate-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Secure Booking System
                </div>
            </div>
        </form>
    </main>
</div>
@endsection
