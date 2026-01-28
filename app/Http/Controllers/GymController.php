<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
{
    public function index()
    {
        return view('gym.home');
    }

    public function dashboard()
    {
        $user = [
            'name' => Auth::user()->name,
            'avatar' => 'https://i.pravatar.cc/150?u=' . Auth::id()
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

        $todayWorkout = [
            'id' => 1,
            'title' => 'Cidhibta & Lugaha',
            'duration' => '45 daqiiqo',
            'calories' => '320 kcal',
            'level' => 'Dhexdhexaad',
            'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2670&auto=format&fit=crop'
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
        $workouts = [
            [
                'id' => 1,
                'title' => 'Cidhibta & Lugaha',
                'duration' => '45 daqiiqo',
                'calories' => '320 kcal',
                'level' => 'Dhexdhexaad',
                'category' => 'Strength',
                'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2670&auto=format&fit=crop',
                'video_id' => 'f1KAgv8JAmA' // Joe Wicks - Legs
            ],
            [
                'id' => 2,
                'title' => 'Cardio HIIT',
                'duration' => '30 daqiiqo',
                'calories' => '450 kcal',
                'level' => 'Adag',
                'category' => 'Cardio',
                'image' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=2670&auto=format&fit=crop',
                'video_id' => 'ml6cT4AZdqI' // Joe Wicks - HIIT
            ],
            [
                'id' => 3,
                'title' => 'Yoga Flow',
                'duration' => '60 daqiiqo',
                'calories' => '200 kcal',
                'level' => 'Fudud',
                'category' => 'Yoga',
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=2720&auto=format&fit=crop',
                'video_id' => 'v7AYKMP6rOE' // Yoga with Adriene
            ],
            [
                'id' => 4,
                'title' => 'Full Body Workout',
                'duration' => '50 daqiiqo',
                'calories' => '380 kcal',
                'level' => 'Dhexdhexaad',
                'category' => 'Strength',
                'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=2670&auto=format&fit=crop',
                'video_id' => 'oAPCPjnU1wA' // Joe Wicks - Full Body
            ]
        ];

        // Add user-created workouts from session
        $customWorkouts = session('custom_workouts', []);
        $workouts = array_merge($workouts, $customWorkouts);

        return view('gym.workouts', compact('workouts'));
    }

    public function video($id)
    {
        $workouts = [
            1 => [
                'id' => 1,
                'title' => 'Cidhibta & Lugaha',
                'duration' => '45 daqiiqo',
                'calories' => '320 kcal',
                'level' => 'Dhexdhexaad',
                'category' => 'Strength',
                'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2670&auto=format&fit=crop',
                'video_id' => 'f1KAgv8JAmA'
            ],
            2 => [
                'id' => 2,
                'title' => 'Cardio HIIT',
                'duration' => '30 daqiiqo',
                'calories' => '450 kcal',
                'level' => 'Adag',
                'category' => 'Cardio',
                'image' => 'https://images.unsplash.com/photo-1599058945522-28d584b6f0ff?q=80&w=2669&auto=format&fit=crop',
                'video_id' => 'ml6cT4AZdqI'
            ],
            3 => [
                'id' => 3,
                'title' => 'Yoga Flow',
                'duration' => '60 daqiiqo',
                'calories' => '200 kcal',
                'level' => 'Fudud',
                'category' => 'Yoga',
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=2720&auto=format&fit=crop',
                'video_id' => 'v7AYKMP6rOE'
            ],
            4 => [
                'id' => 4,
                'title' => 'Full Body Workout',
                'duration' => '50 daqiiqo',
                'calories' => '380 kcal',
                'level' => 'Dhexdhexaad',
                'category' => 'Strength',
                'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=2670&auto=format&fit=crop',
                'video_id' => 'oAPCPjnU1wA'
            ]
        ];

        $workout = $workouts[$id] ?? abort(404);
        
        return view('gym.video', compact('workout'));
    }

    public function addWorkout()
    {
        return view('gym.add-workout');
    }

    public function addWorkoutSubmit(Request $request)
    {
        // Extract YouTube video ID from URL
        $videoUrl = $request->input('video_url');
        $videoId = null;
        
        if ($videoUrl) {
            // Parse YouTube URL to get video ID
            // Supports formats: youtube.com/watch?v=ID, youtu.be/ID, youtube.com/embed/ID
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $videoUrl, $matches);
            $videoId = $matches[1] ?? null;
        }

        // Get existing custom workouts from session
        $customWorkouts = session('custom_workouts', []);
        
        // Generate new ID (start from 5 since we have 4 default workouts)
        $newId = count($customWorkouts) + 5;
        
        // Create new workout
        $newWorkout = [
            'id' => $newId,
            'title' => $request->input('title'),
            'duration' => $request->input('duration', '30') . ' daqiiqo',
            'calories' => $request->input('calories', '300') . ' kcal',
            'level' => $request->input('level', 'Dhexdhexaad'),
            'category' => $request->input('category', 'Cardio'),
            'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2670&auto=format&fit=crop',
            'video_id' => $videoId ?? 'dQw4w9WgXcQ' // Default video if none provided
        ];
        
        // Add to custom workouts
        $customWorkouts[] = $newWorkout;
        
        // Save to session
        session(['custom_workouts' => $customWorkouts]);
        
        return redirect()->route('gym.workouts')->with('success', 'Jimicsiga cusub waa la keenay!');
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
}
