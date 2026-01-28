@extends('layouts.app')

@section('title', 'Soo Gal - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-28 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between p-6 sticky top-0 z-40 backdrop-blur-md bg-background/50">
        <a href="{{ route('gym.home') }}" class="h-10 w-10 flex items-center justify-center rounded-xl glass text-foreground hover:bg-primary hover:text-white transition-all">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-xl font-black tracking-tight">Kharash Gym</h1>
        <div class="w-10"></div>
    </header>
    
    <main class="flex-1 px-6 space-y-10 flex flex-col justify-center max-w-md mx-auto w-full">
        <!-- Welcome Message -->
        <div class="text-center space-y-4">
            <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-primary/10 text-primary mx-auto mb-6 shadow-xl shadow-primary/5">
                <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
            </div>
            <h2 class="text-3xl font-black tracking-tighter">Kuso Dhawaaw</h2>
            <p class="text-sm text-slate-500 font-medium">Geli macluumaadkaaga si aad u gasho</p>
        </div>

        <div class="glass-card">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-2xl text-sm font-bold animate-pulse">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="space-y-8">
                    <!-- Email -->
                    <div class="space-y-3">
                        <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-primary/80 ml-1">Email</label>
                        <div class="relative group">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="axmed@mail.com" required class="input-premium" />
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 transition-colors group-focus-within:text-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Password -->
                    <div class="space-y-3">
                        <div class="flex justify-between items-center mr-1">
                            <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-primary/80 ml-1">Password</label>
                            <a href="#" class="text-[10px] font-black uppercase tracking-[0.1em] text-primary hover:underline">Ma ilowday?</a>
                        </div>
                        <div class="relative group">
                            <input type="password" name="password" placeholder="••••••••" required class="input-premium" />
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 transition-colors group-focus-within:text-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary w-full py-5 group">
                    <span class="relative z-10">Soo Gal</span>
                    <svg class="relative z-10 ml-2 h-6 w-6 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
            </form>
        </div>

        <!-- Register Link -->
        <p class="text-center text-sm text-slate-500 font-medium pb-10">
            Ma haysatid akoon? <a href="{{ route('register') }}" class="text-primary font-black hover:underline">Is diwan geli</a>
        </p>
    </main>
</div>
@endsection
