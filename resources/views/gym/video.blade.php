@extends('layouts.app')

@section('title', 'Video - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-24 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between p-6">
        <a href="{{ route('gym.workouts') }}" class="rounded-full p-2 hover:bg-secondary/50 transition-colors">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-lg font-bold">{{ $workout['title'] }}</h1>
        <button class="rounded-full p-2 hover:bg-secondary/50 transition-colors">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
            </svg>
        </button>
    </header>
    
    <main class="flex-1 px-6 space-y-6">
        <!-- YouTube Video Player -->
        <div class="relative overflow-hidden rounded-3xl bg-black aspect-video">
            <iframe 
                width="100%" 
                height="100%" 
                src="https://www.youtube-nocookie.com/embed/{{ $workout['video_id'] }}?rel=0&modestbranding=1&playsinline=1" 
                title="{{ $workout['title'] }}"
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen
                referrerpolicy="strict-origin-when-cross-origin"
                class="absolute inset-0 w-full h-full"
            ></iframe>
        </div>

        <!-- Workout Info -->
        <div class="space-y-4">
            <div class="flex items-center gap-2">
                <span class="inline-block rounded-md bg-primary/20 px-3 py-1 text-xs font-bold uppercase text-primary">
                    {{ $workout['level'] }}
                </span>
                <span class="inline-block rounded-md bg-card px-3 py-1 text-xs font-medium text-muted-foreground">
                    {{ $workout['category'] }}
                </span>
            </div>

            <h2 class="text-2xl font-bold">{{ $workout['title'] }}</h2>

            <div class="flex items-center gap-6 text-sm text-muted-foreground">
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ $workout['duration'] }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 23a7.5 7.5 0 0 1-5.138-12.963C8.204 8.774 11.5 6.5 11 1.5c6 4 9 8 3 14 1 0 2.5 0 5-2.47.27.773.5 1.604.5 2.47A7.5 7.5 0 0 1 12 23z"/>
                    </svg>
                    <span>{{ $workout['calories'] }}</span>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="rounded-2xl bg-card p-5 space-y-3">
            <h3 class="font-bold text-lg">Faahfaahinta</h3>
            <p class="text-sm text-muted-foreground leading-relaxed">
                Jimicsigan wuxuu ku caawiyaa inaad korodhsato xoogaaga, aad hagaajiso caafimaadkaaga, oo aad dhimiso miisaankaaga. Raac tilmaamaha macalinka si aad u hesho natiijooyinka ugu wanaagsan.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-2 gap-3">
            <button class="rounded-full bg-primary py-3 text-sm font-semibold text-white hover:bg-blue-600 transition-colors flex items-center justify-center gap-2">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                </svg>
                Kaydi
            </button>
            <button class="rounded-full bg-card border border-white/5 py-3 text-sm font-semibold text-foreground hover:bg-card/80 transition-colors flex items-center justify-center gap-2">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                </svg>
                Wadaag
            </button>
        </div>

        <!-- Related Workouts -->
        <div class="space-y-4">
            <h3 class="font-bold text-lg">Jimicsiyo Kale</h3>
            <div class="text-sm text-muted-foreground">
                Raadi jimicsiyo kale oo la mid ah...
            </div>
        </div>
    </main>
</div>
@endsection
