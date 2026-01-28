@extends('layouts.app')

@section('title', 'Diwan Galin - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-28 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between p-6 sticky top-0 z-40 backdrop-blur-md bg-background/50">
        <a href="{{ route('gym.home') }}" class="h-10 w-10 flex items-center justify-center rounded-xl glass text-foreground hover:bg-primary hover:text-white transition-all">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-xl font-black tracking-tight">Ku Biir Kharash Gym</h1>
        <div class="w-10"></div>
    </header>
    
    <main class="flex-1 px-6 space-y-10 max-w-lg mx-auto w-full">
        <!-- Welcome Message -->
        <div class="text-center space-y-4 pt-4">
            <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-primary/10 text-primary mx-auto mb-6 shadow-xl shadow-primary/5">
                <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-black tracking-tighter">Bilow Safarkaaga</h2>
            <p class="text-sm text-slate-500 font-medium max-w-[80%] mx-auto">Kuso dhawaaw qoyska Kharash Gym</p>
        </div>

        <div class="glass-card mb-20">
            <form action="{{ route('register') }}" method="POST" class="space-y-8">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-2xl text-sm font-bold animate-pulse">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="space-y-8">
                    <!-- Full Name -->
                    <div class="space-y-3">
                        <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-primary/80 ml-1">Magaca Oo Dhan</label>
                        <div class="relative group">
                            <input type="text" name="name" placeholder="Axmed Cali Maxamed" required class="input-premium" />
                            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 transition-colors group-focus-within:text-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Email -->
                        <div class="space-y-3">
                            <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-primary/80 ml-1">Email</label>
                            <div class="relative group">
                                <input type="email" name="email" placeholder="axmed@mail.com" required class="input-premium" />
                                <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 transition-colors group-focus-within:text-primary">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="space-y-3">
                            <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-primary/80 ml-1">Telefoon</label>
                            <div class="relative group">
                                <input type="tel" name="phone" placeholder="061 234 5678" required class="input-premium" />
                                <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 transition-colors group-focus-within:text-primary">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div class="space-y-3">
                            <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-primary/80 ml-1">Password</label>
                            <div class="relative group">
                                <input type="password" name="password" placeholder="••••••••" required class="input-premium" />
                                <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 transition-colors group-focus-within:text-primary">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="space-y-3">
                            <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-primary/80 ml-1">Xaqiiji Password</label>
                            <div class="relative group">
                                <input type="password" name="password_confirmation" placeholder="••••••••" required class="input-premium" />
                                <div class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 transition-colors group-focus-within:text-primary">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Membership Plan -->
                    <div class="space-y-4">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Qorshaha Xubinimada</label>
                        <div class="grid grid-cols-1 gap-4">
                            <label class="group relative flex items-center justify-between rounded-2xl bg-slate-900 border border-white/5 p-5 cursor-pointer transition-all hover:bg-slate-800/50 has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <div>
                                    <div class="font-black text-base">Bisha</div>
                                    <div class="text-[10px] font-bold text-slate-500">$30 / bil</div>
                                </div>
                                <input type="radio" name="plan" value="monthly" checked class="h-5 w-5 text-primary">
                            </label>
                            
                            <label class="group relative flex items-center justify-between rounded-2xl bg-slate-900 border border-white/5 p-5 cursor-pointer transition-all hover:bg-slate-800/50 has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <div>
                                    <div class="font-black text-base">3 Bilood</div>
                                    <div class="text-[10px] font-bold text-slate-500">$80 (Kaydi $10)</div>
                                </div>
                                <input type="radio" name="plan" value="quarterly" class="h-5 w-5 text-primary">
                            </label>
                            
                            <label class="group relative overflow-hidden flex items-center justify-between rounded-2xl bg-gradient-to-r from-primary/20 to-blue-700/20 border border-primary/30 p-5 cursor-pointer transition-all hover:scale-[1.01] has-[:checked]:border-primary has-[:checked]:bg-gradient-to-r has-[:checked]:from-primary has-[:checked]:to-blue-700">
                                <div class="relative z-10">
                                    <div class="font-black text-base flex items-center gap-3">
                                        Sannadka
                                        <span class="text-[8px] bg-primary text-white px-2 py-0.5 rounded-full font-black uppercase">Most Popular</span>
                                    </div>
                                    <div class="text-[10px] font-bold text-slate-400 mt-0.5 group-has-[:checked]:text-blue-100">$288 (Kaydi $72)</div>
                                </div>
                                <input type="radio" name="plan" value="yearly" class="relative z-10 h-5 w-5 text-primary group-has-[:checked]:text-white">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary w-full py-5 group flex items-center justify-center">
                    <span class="relative z-10">Dhammaystir Diwan Galinta</span>
                    <svg class="relative z-10 ml-2 h-6 w-6 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
            </form>
        </div>
    </main>
</div>
@endsection
