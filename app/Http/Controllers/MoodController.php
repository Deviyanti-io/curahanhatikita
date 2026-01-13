<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MoodController extends Controller
{
    public function index()
    {
        $username = session('username');
        
        // Get today's mood
        $todayMood = Mood::where('username', $username)
            ->where('date', Carbon::today())
            ->first();
        
        // Get mood history (last 30 days)
        $moodHistory = Mood::where('username', $username)
            ->where('date', '>=', Carbon::now()->subDays(30))
            ->orderBy('date', 'desc')
            ->get();
        
        // Get statistics
        $stats = [
            'total_entries' => Mood::where('username', $username)->count(),
            'average_mood' => round(Mood::where('username', $username)->avg('mood_level'), 1),
            'current_streak' => $this->calculateStreak($username),
            'best_month' => $this->getBestMonth($username),
        ];
        
        // Get chart data (last 7 days)
        $chartData = Mood::where('username', $username)
            ->where('date', '>=', Carbon::now()->subDays(7))
            ->orderBy('date', 'asc')
            ->get()
            ->map(function($mood) {
                return [
                    'date' => $mood->date->format('d/m'),
                    'level' => $mood->mood_level,
                    'emoji' => $mood->mood_emoji,
                ];
            });
        
        return view('mood-tracker', compact('todayMood', 'moodHistory', 'stats', 'chartData'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mood_level' => 'required|integer|min:1|max:5',
            'note' => 'nullable|max:500',
        ]);
        
        $moodConfig = Mood::getMoodConfig($validated['mood_level']);
        $username = session('username');
        $today = Carbon::today();
        
        // Update or create today's mood
        Mood::updateOrCreate(
            [
                'username' => $username,
                'date' => $today,
            ],
            [
                'mood_level' => $validated['mood_level'],
                'mood_emoji' => $moodConfig['emoji'],
                'mood_label' => $moodConfig['label'],
                'note' => $validated['note'],
            ]
        );
        
        return redirect()->route('mood.index')->with('success', 'Mood berhasil disimpan! ' . $moodConfig['emoji']);
    }
    
    public function destroy(Mood $mood)
    {
        if ($mood->username !== session('username')) {
            return redirect()->route('mood.index')->with('error', 'Akses ditolak!');
        }
        
        $mood->delete();
        return redirect()->route('mood.index')->with('success', 'Mood berhasil dihapus!');
    }
    
    private function calculateStreak($username)
    {
        $moods = Mood::where('username', $username)
            ->orderBy('date', 'desc')
            ->get();
        
        $streak = 0;
        $currentDate = Carbon::today();
        
        foreach ($moods as $mood) {
            if ($mood->date->eq($currentDate)) {
                $streak++;
                $currentDate = $currentDate->subDay();
            } else {
                break;
            }
        }
        
        return $streak;
    }
    
    private function getBestMonth($username)
    {
        $bestMonth = Mood::where('username', $username)
            ->selectRaw('YEAR(date) as year, MONTH(date) as month, AVG(mood_level) as avg_mood')
            ->groupBy('year', 'month')
            ->orderBy('avg_mood', 'desc')
            ->first();
        
        if ($bestMonth) {
            $monthName = Carbon::create($bestMonth->year, $bestMonth->month)->format('F Y');
            return $monthName;
        }
        
        return '-';
    }
}