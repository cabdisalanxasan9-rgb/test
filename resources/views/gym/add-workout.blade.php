@extends('layouts.app')

@section('title', 'Ku dar Jimicsi - Kharash Gym')

@section('content')
<div class="flex min-h-screen flex-col bg-background pb-28 text-foreground">
    <!-- Header -->
    <header class="flex items-center justify-between p-6 sticky top-0 z-40 backdrop-blur-md bg-background/50">
        <a href="{{ url()->previous() }}" class="h-10 w-10 flex items-center justify-center rounded-xl glass text-foreground hover:bg-primary hover:text-white transition-all">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-xl font-black tracking-tight">Ku dar Jimicsi</h1>
        <div class="w-10"></div>
    </header>
    
    <main class="flex-1 px-6 space-y-10 pt-4">
        <form action="{{ route('gym.add-workout.submit') }}" method="POST" class="space-y-8 pb-10">
            @csrf
            
            <!-- Workout Name -->
            <div class="space-y-2">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-1">Magaca Jimicsiga</label>
                <input type="text" name="title" placeholder="Tusaale: Cardio HIIT" required class="w-full rounded-2xl bg-slate-900 border border-white/5 px-5 py-4 text-foreground placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all shadow-xl" />
            </div>

            <!-- Category -->
            <div class="space-y-4">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-1">Nooca</label>
                <input type="hidden" name="category" value="Cardio" id="category-input">
                <div class="grid grid-cols-3 gap-3">
                    @foreach(['Cardio', 'Strength', 'Yoga'] as $cat)
                    <button type="button" onclick="selectCategory('{{ $cat }}', this)" class="category-btn rounded-2xl py-4 text-xs font-black uppercase tracking-widest transition-all {{ $cat === 'Cardio' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'glass text-slate-500 hover:text-slate-300' }}">
                        {{ $cat }}
                    </button>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Duration -->
                <div class="space-y-2">
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-1">Mudada (daq)</label>
                    <input type="number" name="duration" placeholder="30" required class="w-full rounded-2xl bg-slate-900 border border-white/5 px-5 py-4 text-foreground placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all shadow-xl" />
                </div>
                <!-- Calories -->
                <div class="space-y-2">
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-1">Kaloori (kcal)</label>
                    <input type="number" name="calories" placeholder="300" required class="w-full rounded-2xl bg-slate-900 border border-white/5 px-5 py-4 text-foreground placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all shadow-xl" />
                </div>
            </div>

            <!-- Level -->
            <div class="space-y-4">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-1">Heerka Adkaanta</label>
                <input type="hidden" name="level" value="Dhexdhexaad" id="level-input">
                <div class="grid grid-cols-3 gap-3">
                    @foreach(['Fudud', 'Dhexdhexaad', 'Adag'] as $lvl)
                    <button type="button" onclick="selectLevel('{{ $lvl }}', this)" class="level-btn rounded-2xl py-4 text-[10px] font-black uppercase tracking-widest transition-all {{ $lvl === 'Dhexdhexaad' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'glass text-slate-500 hover:text-slate-300' }}">
                        {{ $lvl }}
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Video URL -->
            <div class="space-y-2">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 ml-1">YouTube URL</label>
                <input type="url" name="video_url" placeholder="https://youtube.com/watch?v=..." class="w-full rounded-2xl bg-slate-900 border border-white/5 px-5 py-4 text-foreground placeholder:text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all shadow-xl" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary w-full py-5 text-lg group">
                Kaydi Jimicsiga
            </button>
        </form>
    </main>
</div>

<script>
function selectCategory(category, button) {
    document.getElementById('category-input').value = category;
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.className = 'category-btn rounded-2xl py-4 text-xs font-black uppercase tracking-widest transition-all glass text-slate-500 hover:text-slate-300';
    });
    button.className = 'category-btn rounded-2xl py-4 text-xs font-black uppercase tracking-widest transition-all bg-primary text-white shadow-lg shadow-primary/20';
}

function selectLevel(level, button) {
    document.getElementById('level-input').value = level;
    document.querySelectorAll('.level-btn').forEach(btn => {
        btn.className = 'level-btn rounded-2xl py-4 text-[10px] font-black uppercase tracking-widest transition-all glass text-slate-500 hover:text-slate-300';
    });
    button.className = 'level-btn rounded-2xl py-4 text-[10px] font-black uppercase tracking-widest transition-all bg-primary text-white shadow-lg shadow-primary/20';
}
</script>
@endsection
