@extends('layouts.app')

@section('title', 'Dhimis 20% - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-28 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between p-6 sticky top-0 z-40 backdrop-blur-md bg-background/50">
        <a href="{{ route('gym.home') }}" class="h-10 w-10 flex items-center justify-center rounded-xl glass text-foreground hover:bg-primary hover:text-white transition-all">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-xl font-black tracking-tight">Dhimis Khaas ah</h1>
        <div class="w-10"></div>
    </header>
    
    <main class="flex-1 px-6 space-y-8">
        <!-- Promo Hero -->
        <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-primary via-blue-800 to-indigo-950 p-10 text-center shadow-2xl">
            <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute -left-16 -bottom-16 h-48 w-48 rounded-full bg-black/20 blur-3xl"></div>
            
            <div class="relative z-10 space-y-6">
                <div class="inline-flex rounded-full glass px-4 py-1.5 text-[10px] font-black uppercase tracking-widest text-white">
                    Fursad Khaas ah
                </div>
                <h2 class="text-7xl font-black text-white tracking-tighter">20%<span class="text-3xl ml-2 text-blue-200">OFF</span></h2>
                <p class="text-lg font-bold text-blue-100/80 leading-tight">Xubinimada Bisha Koowaad <br/>ama Sannadka</p>
                <div class="pt-2">
                    <div class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-slate-300 bg-black/20 px-4 py-2 rounded-full backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                        Expires in: 5 days
                    </div>
                </div>
            </div>
        </div>

        <!-- Offer Details -->
        <div class="space-y-5">
            <h3 class="text-xl font-black tracking-tight ml-1">Faa'iidooyinka</h3>
            
            <div class="grid gap-4">
                @foreach([
                    ['title' => 'Kaydi $72 Sannadkii', 'desc' => 'Dhimis 20% ah qorshaha sanadlaha', 'icon' => 'banknotes'],
                    ['title' => 'Personal Trainer free', 'desc' => 'Hel 2 kalfadhi oo bilaash ah', 'icon' => 'user'],
                    ['title' => 'Full Class Access', 'desc' => 'Yoga, Cardio, Strength sessions', 'icon' => 'sparkles']
                ] as $item)
                <div class="glass-card rounded-[2rem] p-6 flex items-start gap-5 border-none shadow-xl">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary flex-shrink-0">
                        @if($item['icon'] === 'banknotes')
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        @elseif($item['icon'] === 'user')
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @else
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        @endif
                    </div>
                    <div>
                        <div class="font-black text-lg">{{ $item['title'] }}</div>
                        <div class="text-sm font-medium text-slate-500 mt-0.5">{{ $item['desc'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="space-y-4 pt-4">
            <a href="{{ route('register') }}" class="btn-primary w-full py-5 text-lg flex items-center justify-center">
                Isticmaal Dhimista Hadda
            </a>
            
            <a href="{{ route('gym.home') }}" class="block w-full rounded-3xl glass py-5 text-center text-sm font-black uppercase tracking-widest text-slate-400 hover:text-white transition-all">
                Ku Noqo Bogga Hore
            </a>
        </div>
    </main>
</div>
@endsection
