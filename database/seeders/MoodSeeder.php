<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mood;
use Carbon\Carbon;

class MoodSeeder extends Seeder
{
    public function run()
    {
        $username = 'Demo'; // Ganti dengan username Anda
        
        // Generate mood for last 30 days
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::today()->subDays($i);
            $level = rand(1, 5);
            $config = Mood::getMoodConfig($level);
            
            Mood::create([
                'username' => $username,
                'mood_level' => $level,
                'mood_emoji' => $config['emoji'],
                'mood_label' => $config['label'],
                'note' => $this->getRandomNote($level),
                'date' => $date,
            ]);
        }
    }
    
    private function getRandomNote($level)
    {
        $notes = [
            1 => ['Hari yang berat', 'Merasa sedih hari ini', 'Butuh istirahat'],
            2 => ['Agak kurang baik', 'Lelah tapi oke', 'Semoga besok lebih baik'],
            3 => ['Hari biasa saja', 'Nothing special', 'Netral'],
            4 => ['Hari yang menyenangkan', 'Produktif!', 'Alhamdulillah lancar'],
            5 => ['Hari terbaik!', 'Sangat bahagia', 'Perfect day!'],
        ];
        
        return $notes[$level][array_rand($notes[$level])];
    }
}