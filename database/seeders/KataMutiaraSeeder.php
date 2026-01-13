<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KataMutiara;

class KataMutiaraSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['quote' => 'Hidup adalah tentang menciptakan dirimu sendiri, bukan menemukan dirimu.', 'author' => 'George Bernard Shaw'],
            ['quote' => 'Kebahagiaan bukanlah sesuatu yang sudah jadi. Itu datang dari tindakanmu sendiri.', 'author' => 'Dalai Lama'],
            ['quote' => 'Jangan menunggu kesempatan. Ciptakan itu.', 'author' => 'George Bernard Shaw'],
            ['quote' => 'Satu-satunya cara untuk melakukan pekerjaan hebat adalah mencintai apa yang kamu lakukan.', 'author' => 'Steve Jobs'],
            ['quote' => 'Percayalah pada dirimu sendiri dan semua yang kamu adalah.', 'author' => 'Christian D. Larson'],
        ];

        foreach ($data as $item) {
            KataMutiara::create($item);
        }
    }
}