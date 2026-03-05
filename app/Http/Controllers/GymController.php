<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GymController extends Controller
{
    public function index()
    {
        return view('gym.home');
    }

    public function dashboard()
    {
        $authUser = Auth::user();

        $user = [
            'name' => $authUser->name,
            'avatar' => $authUser->avatar ?: ('https://i.pravatar.cc/150?u=' . Auth::id()),
        ];

        $weeklyGoal = [
            'percentage' => 85,
            'current' => 4,
            'total' => 5
        ];

        $stats = [
            ['icon' => 'flame', 'value' => '750', 'label' => 'Kaloori', 'unit' => 'kcal', 'color' => 'orange'],
            ['icon' => 'timer', 'value' => '1.5', 'label' => 'Saacadaha', 'unit' => 'h', 'color' => 'blue'],
            ['icon' => 'heart', 'value' => '110', 'label' => 'Garaaca', 'unit' => 'bpm', 'color' => 'red']
        ];

        $allWorkouts = array_merge($this->defaultWorkouts(), session('custom_workouts', []));
        $todayWorkout = !empty($allWorkouts)
            ? end($allWorkouts)
            : [
                'id' => 1,
                'title' => 'Cidhibta & Lugaha',
                'duration' => '45 daqiiqo',
                'calories' => '320 kcal',
                'level' => 'Dhexdhexaad',
                'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2670&auto=format&fit=crop',
            ];

        return view('gym.dashboard', compact('user', 'weeklyGoal', 'stats', 'todayWorkout'));
    }

    public function schedule()
    {
        $dates = [
            ['day' => 'ISN', 'date' => '12', 'active' => true],
            ['day' => 'TAL', 'date' => '13', 'active' => false],
            ['day' => 'ARB', 'date' => '14', 'active' => false],
            ['day' => 'KHA', 'date' => '15', 'active' => false],
            ['day' => 'JIM', 'date' => '16', 'active' => false],
        ];

        $categories = ['Dhammaan', 'Cardio', 'Strength', 'Yoga'];

        $sessions = [
            [
                'id' => 1,
                'title' => 'Boxing Session',
                'time' => '08:00 AM - 09:00 AM',
                'trainer' => 'Macalin Axmed',
                'image' => 'https://images.unsplash.com/photo-1549719386-74dfcbf7dbed?q=80&w=400',
                'category' => 'Cardio',
                'status' => 'Boos qabso',
                'active' => true
            ],
            [
                'id' => 2,
                'title' => 'CrossFit Challenge',
                'time' => '10:30 AM - 11:30 AM',
                'trainer' => 'Macalin Jaamac',
                'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=400',
                'category' => 'Strength',
                'status' => 'Boos qabso',
                'active' => false
            ],
            [
                'id' => 3,
                'title' => 'Zen Yoga Flow',
                'time' => '04:00 PM - 05:00 PM',
                'trainer' => 'Layla Maxamed',
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=400',
                'category' => 'Yoga',
                'status' => 'Full',
                'active' => false
            ]
        ];

        return view('gym.schedule', compact('dates', 'categories', 'sessions'));
    }

    public function bookingConfirm($id)
    {
        $sessions = [
            1 => ['id' => 1, 'title' => 'Boxing Session', 'time' => '08:00 AM - 09:00 AM', 'trainer' => 'Macalin Axmed'],
            2 => ['id' => 2, 'title' => 'CrossFit Challenge', 'time' => '10:30 AM - 11:30 AM', 'trainer' => 'Macalin Jaamac'],
            3 => ['id' => 3, 'title' => 'Zen Yoga Flow', 'time' => '04:00 PM - 05:00 PM', 'trainer' => 'Layla Maxamed'],
        ];

        $session = $sessions[$id] ?? abort(404);

        return view('gym.booking-confirm', compact('session'));
    }

    public function bookingStore(Request $request)
    {
        $request->validate([
            'session_id' => 'required|integer',
            'phone' => 'required|string',
        ]);

        // Simulating booking storage
        $booked = session('booked_sessions', []);
        $booked[] = $request->session_id;
        session(['booked_sessions' => array_unique($booked)]);

        return redirect()->route('gym.schedule')->with('success', 'Ballantaada si guul leh ayaa loo diwaangeliyay!');
    }

    public function workouts()
    {
        $workouts = array_merge($this->defaultWorkouts(), session('custom_workouts', []));

        return view('gym.workouts', compact('workouts'));
    }

    public function video($id)
    {
        $workouts = array_merge($this->defaultWorkouts(), session('custom_workouts', []));
        $workoutsById = [];

        foreach ($workouts as $workout) {
            $workoutsById[(int) $workout['id']] = $workout;
        }

        $workout = $workoutsById[(int) $id] ?? abort(404);
        
        return view('gym.video', compact('workout'));
    }

    public function addWorkout()
    {
        return view('gym.add-workout');
    }

    public function addWorkoutSubmit(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'category' => 'required|string|in:Cardio,Strength,Yoga',
            'duration' => 'required|integer|min:1|max:600',
            'calories' => 'required|integer|min:1|max:5000',
            'level' => 'required|string|in:Fudud,Dhexdhexaad,Adag',
            'video_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Extract YouTube video ID from URL
        $videoUrl = $validated['video_url'] ?? null;
        $videoId = null;
        $videoSource = 'url';
        $storedVideoUrl = 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4';
        
        if ($videoUrl) {
            // Parse YouTube URL to get video ID
            // Supports formats: youtube.com/watch?v=ID, youtu.be/ID, youtube.com/embed/ID
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $videoUrl, $matches);
            $videoId = $matches[1] ?? null;

            if ($videoId) {
                $videoSource = 'youtube';
                $storedVideoUrl = null;
            } else {
                $storedVideoUrl = $videoUrl;
            }
        }

        // Get existing custom workouts from session
        $customWorkouts = session('custom_workouts', []);

        $allIds = array_map(function ($workout) {
            return (int) ($workout['id'] ?? 0);
        }, array_merge($this->defaultWorkouts(), $customWorkouts));

        $newId = !empty($allIds) ? (max($allIds) + 1) : 1;

        $imageUrl = 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2670&auto=format&fit=crop';

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('workouts', 'public');
            $imageUrl = Storage::url($path);
        }
        
        // Create new workout
        $newWorkout = [
            'id' => $newId,
            'title' => $validated['title'],
            'duration' => $validated['duration'] . ' daqiiqo',
            'calories' => $validated['calories'] . ' kcal',
            'level' => $validated['level'],
            'category' => $validated['category'],
            'image' => $imageUrl,
            'video_source' => $videoSource,
            'video_id' => $videoId,
            'video_url' => $storedVideoUrl,
        ];
        
        // Add to custom workouts
        $customWorkouts[] = $newWorkout;
        
        // Save to session
        session(['custom_workouts' => $customWorkouts]);
        
        return redirect()->route('gym.workouts')->with('success', 'Jimicsiga cusub waa la keenay!');
    }

    public function updateProfileImage(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $user = Auth::user();

        if (!empty($user->avatar) && str_starts_with($user->avatar, '/storage/avatars/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $user->avatar));
        }

        $path = $validated['avatar']->store('avatars', 'public');
        $user->avatar = Storage::url($path);
        $user->save();

        return back()->with('success', 'Profile image waa la cusbooneysiiyay.');
    }


    public function register()
    {
        return view('gym.register');
    }

    public function registerSubmit(Request $request)
    {
        // For now, just redirect to dashboard with success message
        // In a real app, you would validate and save to database
        return redirect()->route('gym.dashboard')->with('success', 'Mahadsanid! Diwan galintaada waa la dhammaystirtay.');
    }

    public function promo()
    {
        return view('gym.promo');
    }

    private function defaultWorkouts(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Cartoon Lugaha Burn',
                'duration' => '45 daqiiqo',
                'calories' => '320 kcal',
                'level' => 'Dhexdhexaad',
                'category' => 'Strength',
                'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2670&auto=format&fit=crop',
                'video_source' => 'youtube',
                'video_id' => 'aUD4GIS_Pgc',
            ],
            [
                'id' => 2,
                'title' => 'Cartoon Cardio Rush',
                'duration' => '30 daqiiqo',
                'calories' => '450 kcal',
                'level' => 'Adag',
                'category' => 'Cardio',
                'image' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=2670&auto=format&fit=crop',
                'video_source' => 'url',
                'video_url' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
            ],
            [
                'id' => 3,
                'title' => 'Cartoon Yoga Flow',
                'duration' => '60 daqiiqo',
                'calories' => '200 kcal',
                'level' => 'Fudud',
                'category' => 'Yoga',
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=2720&auto=format&fit=crop',
                'video_source' => 'url',
                'video_url' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4',
            ],
            [
                'id' => 4,
                'title' => 'Cartoon Full Body',
                'duration' => '50 daqiiqo',
                'calories' => '380 kcal',
                'level' => 'Dhexdhexaad',
                'category' => 'Strength',
                'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=2670&auto=format&fit=crop',
                'video_source' => 'url',
                'video_url' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4',
            ],
            [
                'id' => 5,
                'title' => 'Cartoon HIIT Blast',
                'duration' => '35 daqiiqo',
                'calories' => '410 kcal',
                'level' => 'Adag',
                'category' => 'HIIT',
                'image' => 'https://images.unsplash.com/photo-1599058945522-28d584b6f0ff?q=80&w=2669&auto=format&fit=crop',
                'video_source' => 'url',
                'video_url' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
            ],
            [
                'id' => 6,
                'title' => 'Cartoon Stretch Reset',
                'duration' => '25 daqiiqo',
                'calories' => '180 kcal',
                'level' => 'Fudud',
                'category' => 'Yoga',
                'image' => 'https://images.unsplash.com/photo-1506629905607-d9b1c3b8b576?q=80&w=2670&auto=format&fit=crop',
                'video_source' => 'url',
                'video_url' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
            ],
        ];
    }
}
