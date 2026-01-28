@extends('layouts.app')

@section('title', 'Kharash Gym - Home')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-32 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-5 sticky top-0 z-50 bg-background/80 backdrop-blur-lg">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary text-white shadow-xl shadow-primary/30">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4-1.4l-1.6-1.6a1 1 0 0 0-1.4 0ZM7.3 17.7a1 1 0 0 0 0-1.4l-1.6-1.6a1 1 0 0 0-1.4 1.4l1.6 1.6a1 1 0 0 0 1.4 0ZM14.7 17.7a1 1 0 0 1 0-1.4l1.6-1.6a1 1 0 0 1 1.4 1.4l-1.6 1.6a1 1 0 0 1-1.4 0ZM7.3 6.3a1 1 0 0 1 0 1.4l-1.6-1.6a1 1 0 0 1-1.4-1.4l1.6 1.6a1 1 0 0 1 1.4 0Z M12 7v10M7 12h10" />
                </svg>
            </div>
            <span class="text-xl font-black uppercase tracking-tight">Kharash <span class="text-white">Gym</span></span>
        </div>
        @auth
        <div class="flex items-center gap-4">
            <button class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-800/50 text-white transition-all hover:bg-slate-700">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22zm7-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C8.63 5.36 7 7.92 7 11v5l-2 2v1h14v-1l-2-2z"/>
                </svg>
            </button>
            <div class="h-12 w-12 overflow-hidden rounded-full border-2 border-white/10 bg-slate-800 shadow-xl">
                <img src="https://i.pravatar.cc/150" alt="Profile" class="h-full w-full object-cover">
            </div>
        </div>
        @endauth
    </header>

    <main class="flex-1 px-6 space-y-10">
        <!-- Hero Section -->
        <section class="relative mt-2 h-[500px] overflow-hidden rounded-[3rem] bg-[#0A0F1C] border border-white/5">
            <div class="absolute inset-0">
                <img 
                    src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?q=80&w=1000&auto=format&fit=crop" 
                    alt="Gym"
                    class="h-full w-full object-cover opacity-60"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0A0F1C] via-transparent to-transparent"></div>
            </div>

            <div class="relative z-10 flex h-full flex-col justify-end p-8 pb-10 space-y-4">
                <p class="text-[11px] font-black uppercase tracking-[0.3em] text-primary">Elite Fitness Hub</p>
                <h1 class="text-[42px] font-black leading-[1.05] tracking-tight text-white">
                    Ku soo <br />
                    dhawaaw <br />
                    <span class="text-primary">KHARASH GYM</span>
                </h1>
                <p class="max-w-[85%] text-sm font-medium text-slate-300 leading-relaxed">
                    Bilow safarkaaga jirdhiska maanta adoo isticmaalaya qalabka ugu casrisan.
                </p>
                <div class="flex flex-col gap-3 mt-4">
                    @auth
                    <a href="{{ route('gym.dashboard') }}" class="btn-primary w-full flex items-center justify-center">
                        <span>Tag Dashboard-ka</span>
                        <svg class="ml-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    @else
                    <a href="{{ route('register') }}" class="btn-primary w-full flex items-center justify-center">
                        <span>Ku biir hadda</span>
                        <svg class="ml-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('login') }}" class="w-full py-4 text-center font-black uppercase tracking-widest text-sm text-slate-400 hover:text-white transition-colors">
                        Horey u lahayd koonto? <span class="text-primary">Soo Gal</span>
                    </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-black tracking-tight">Adeegyada aan bixino</h2>
                <a href="#" class="text-sm font-bold text-primary hover:underline">Eeg dhammaan</a>
            </div>

            <div class="grid gap-5 grid-cols-2">
                <!-- Cardio -->
                <a href="{{ route('gym.workouts') }}" class="card-base p-6 space-y-6 group hover:border-primary/50 transition-all cursor-pointer">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-500/10 text-primary">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM9.8 8.9L7 23h2.1l1.8-8 2.1 2v6h2V15l-2.1-2 .6-3C15.3 11 18.1 12 20 12v-2c-1.9 0-4.5-1-5.7-2.8l-1-1.6c-.4-.7-1.1-1.1-1.8-1.1-.3 0-.6.1-.9.2L6 6.9V12h2V8.9l1.8-.7"/>
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-xl font-black">Cardio</h3>
                        <p class="text-sm font-semibold text-slate-500">24 Kalfadhi todobaadkii</p>
                    </div>
                </a>

                <!-- Bodybuilding -->
                <a href="{{ route('gym.workouts') }}" class="card-base p-6 space-y-6 group hover:border-primary/50 transition-all cursor-pointer">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-500/10 text-primary">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.57 14.86L22 13.43l-1.43-1.43l-1.43 1.43c-1.4 1.4-3.6 1.4-5 0l-.36-.36l.71-.71c.78-.78.78-2.05 0-2.83l-.71-.71l2.43-2.43c.78.78 2.05.78 2.83 0l.71.71l1.43-1.43L19.43 4.3l-1.43 1.43l-.71-.71c-.78-.78-2.05-.78-2.83 0l-.71-.71L11.3 6.74c-.78-.78-2.05-.78-2.83 0l-.71-.71L6.34 6.74l1.43 1.43L6.34 9.6l-1.43-1.43L3.48 9.6c1.4 1.4 1.4 3.6 0 5L2.05 16l1.43 1.43l1.43-1.43c1.4-1.4 3.6-1.4 5 0l.36.36l-.71.71c-.78.78-.78 2.05 0 2.83l.71.71l-2.43 2.43c-.78-.78-2.05-.78-2.83 0l-.71-.71l-1.43 1.43l1.43 1.43l1.43-1.43c1.4 1.4 3.6 1.4 5 0l.36-.36l2.14 2.14c.78.78 2.05.78 2.83 0l.71.71l2.43-2.43c.78.78 2.05.78 2.83 0l.71.71l1.43-1.43l-1.43-1.43c-1.4 1.4-3.6 1.4-5 0l-.36-.36l.71-.71c.78-.78.78-2.05 0-2.83l-.71-.71l2.43-2.43c.78.78 2.05.78 2.83 0l.71.71l1.43-1.43L20.57 14.86z"/>
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-xl font-black">Bodybuilding</h3>
                        <p class="text-sm font-semibold text-slate-500">Tababarka xoogga</p>
                    </div>
                </a>

                <!-- Yoga -->
                <a href="{{ route('gym.workouts') }}" class="card-base p-6 col-span-2 flex items-center justify-between group hover:border-primary/50 transition-all cursor-pointer">
                    <div class="flex items-center gap-6">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-500/10 text-primary">
                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 4.5C13.38 4.5 14.5 3.38 14.5 2S13.38-.5 12-.5s-2.5 1.13-2.5 2.5 1.12 2.5 2.5 2.5zm10.5 4.5V11c0 .55.45 1 1 1s1-.45 1-1V5.5c0-1.1-.9-2-2-2h-17c-1.1 0-2 .9-2 2V11c0 .55.45 1 1 1s1-.45 1-1V9h3.5v11.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V16h2v4.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V9H22.5z"/>
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-xl font-black">Yoga & Meditation</h3>
                            <p class="text-sm font-semibold text-slate-500">Nasashada maskaxda iyo jidhka</p>
                        </div>
                    </div>
                    <svg class="h-6 w-6 text-slate-600 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </section>

        <!-- Promo Banner -->
        <div class="relative overflow-hidden rounded-[2rem] bg-primary p-7 shadow-2xl shadow-primary/30 flex items-center justify-between">
            <div class="space-y-1 relative z-10">
                <h3 class="text-2xl font-black text-white">Dhimis 20% ah</h3>
                <p class="text-sm font-bold text-white/80">Xubinimada bisha koowaad</p>
            </div>
            <a href="{{ route('gym.promo') }}" class="relative z-10 px-6 py-3 rounded-full bg-white text-primary font-bold shadow-xl transition-all hover:scale-105 active:scale-95">
                Isticmaal
            </a>
            <!-- Orbs -->
            <div class="absolute -right-10 top-0 h-32 w-32 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -left-10 bottom-0 h-24 w-24 bg-black/10 rounded-full blur-2xl"></div>
        </div>
    </main>
</div>
@endsection
