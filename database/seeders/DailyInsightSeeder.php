<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyInsight;
use Carbon\Carbon;

class DailyInsightSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['date' => Carbon::today(), 'insight' => 'Hidup tidak selalu memberi jawaban cepat. Justru waktu yang membuat kita mengerti kenapa segala sesuatu terjadi.'],
            ['date' => Carbon::today()->subDays(1), 'insight' => 'Sering kali kita tidak kekurangan kemampuan, tetapi kekurangan keberanian untuk mencoba.'],
            ['date' => Carbon::today()->subDays(2), 'insight' => 'Memaafkan bukan berarti melupakan, tapi berhenti membiarkan masa lalu mengendalikan emosi kita.'],
            ['date' => Carbon::today()->subDays(3), 'insight' => 'Manusia cenderung meremehkan kebiasaan kecil, padahal di sanalah terbentuk arah hidup.'],
            ['date' => Carbon::today()->subDays(4), 'insight' => 'Semakin dewasa, kita menyadari bahwa damai jauh lebih penting daripada menang.'],
            ['date' => Carbon::today()->subDays(5), 'insight' => 'Rasa sakit emosional adalah tanda bahwa sesuatu dalam diri perlu dipahami, bukan dihindari.'],
            ['date' => Carbon::today()->subDays(6), 'insight' => 'Seseorang meninggalkan pelajaran yang berbeda: ada yang mengajarkan cinta, ada yang mengajarkan batas.'],
            ['date' => Carbon::today()->subDays(7), 'insight' => 'Tidak semua perubahan terasa nyaman di awal, tetapi itulah harga pertumbuhan.'],
            ['date' => Carbon::today()->subDays(8), 'insight' => 'Kita selalu punya pilihan: bereaksi atau merespon. Yang pertama spontan, yang kedua bijak.'],
            ['date' => Carbon::today()->subDays(9), 'insight' => 'Waktu menguji segalanya: niat, hubungan, karakter, dan kesabaran.'],
            ['date' => Carbon::today()->subDays(10), 'insight' => 'Kegagalan sering kali bukan akhir, tapi awal dari cara baru untuk melihat hidup.'],
            ['date' => Carbon::today()->subDays(11), 'insight' => 'Kamu tidak bertanggung jawab atas perasaan orang lain, tapi bertanggung jawab atas tindakanmu.'],
            ['date' => Carbon::today()->subDays(12), 'insight' => 'Seseorang bisa dekat secara fisik tapi jauh secara hati, atau jauh secara fisik tapi dekat secara batin.'],
            ['date' => Carbon::today()->subDays(13), 'insight' => 'Rasa takut sering hilang bukan setelah kita siap, tapi setelah kita bertindak.'],
            ['date' => Carbon::today()->subDays(14), 'insight' => 'Ketenangan bukan datang dari menghindari masalah, tetapi dari memahami cara menghadapinya.'],
            ['date' => Carbon::today()->subDays(15), 'insight' => 'Hidup menjadi lebih ringan saat kita berhenti berharap orang lain mengerti semuanya.'],
            ['date' => Carbon::today()->subDays(16), 'insight' => 'Jarak terkadang diperlukan agar sesuatu kembali dihargai.'],
            ['date' => Carbon::today()->subDays(17), 'insight' => 'Cepat atau lambat, semua yang dipendam akan mencari jalan keluar—entah melalui kata, air mata, atau tindakan.'],
            ['date' => Carbon::today()->subDays(18), 'insight' => 'Kita sering mencari validasi dari luar karena kita belum belajar menghargai diri dari dalam.'],
            ['date' => Carbon::today()->subDays(19), 'insight' => 'Kita tidak hidup untuk memenuhi ekspektasi dunia, tapi untuk memenuhi panggilan jiwa.'],
            ['date' => Carbon::today()->subDays(20), 'insight' => 'Kebenaran sulit diterima bukan karena menyakitkan, tapi karena mengharuskan kita berubah.'],
            ['date' => Carbon::today()->subDays(21), 'insight' => 'Untuk menemukan diri sendiri, terkadang kita perlu kehilangan sesuatu—atau seseorang.'],
            ['date' => Carbon::today()->subDays(22), 'insight' => 'Orang yang kuat bukan tidak merasakan sakit, tetapi belajar berjalan meski sedang terluka.'],
            ['date' => Carbon::today()->subDays(23), 'insight' => 'Kehidupan tidak menjamin keadilan, tapi memberi kesempatan. Itu saja sudah cukup untuk melangkah.'],
            ['date' => Carbon::today()->subDays(24), 'insight' => 'Kadang kita tidak kekurangan waktu, kita hanya memberi prioritas pada hal yang salah.'],
            ['date' => Carbon::today()->subDays(25), 'insight' => 'Kedamaian batin datang saat kita berhenti ingin mengendalikan segala hal.'],
            ['date' => Carbon::today()->subDays(26), 'insight' => 'Hubungan yang sehat dibangun oleh dua orang yang siap saling memperbaiki, bukan saling menyalahkan.'],
            ['date' => Carbon::today()->subDays(27), 'insight' => 'Ada perbedaan besar antara memahami dan hanya mengetahui. Yang satu dari buku, yang satu dari pengalaman.'],
            ['date' => Carbon::today()->subDays(28), 'insight' => 'Kita sering kecewa bukan karena orang lain jahat, tapi karena kita berharap terlalu banyak.'],
            ['date' => Carbon::today()->subDays(29), 'insight' => 'Ketakutan terbesar bukan gagal, tapi tidak pernah mencoba.'],
            ['date' => Carbon::today()->subDays(30), 'insight' => 'Terlalu sering kita membandingkan bab 1 kita dengan bab 20 orang lain.'],
            ['date' => Carbon::today()->subDays(31), 'insight' => 'Uang memberi kenyamanan, tapi bukan ketenangan. Yang terakhir lahir dari penerimaan.'],
            ['date' => Carbon::today()->subDays(32), 'insight' => 'Kesuksesan tanpa makna terasa hampa, dan makna tanpa tindakan tak pernah jadi nyata.'],
            ['date' => Carbon::today()->subDays(33), 'insight' => 'Cinta bukan hanya perasaan, tapi keputusan yang diulang setiap hari.'],
            ['date' => Carbon::today()->subDays(34), 'insight' => 'Ada yang tidak kembali bukan karena benci, tapi karena sudah selesai perannya dalam cerita kita.'],
            ['date' => Carbon::today()->subDays(35), 'insight' => 'Manusia cenderung mempertahankan yang familiar meski menyakitkan, daripada mencoba hal baru yang sehat.'],
            ['date' => Carbon::today()->subDays(36), 'insight' => 'Hal yang benar sering kali sulit, dan hal yang mudah sering kali tidak benar.'],
            ['date' => Carbon::today()->subDays(37), 'insight' => 'Bahagia bukan saat semuanya sempurna, tapi saat kita menerima ketidaksempurnaan.'],
            ['date' => Carbon::today()->subDays(38), 'insight' => 'Untuk memahami seseorang, lihat bagaimana ia memperlakukan yang tidak bisa memberinya keuntungan.'],
            ['date' => Carbon::today()->subDays(39), 'insight' => 'Orang yang tepat datang pada waktu yang tepat, tapi kita harus siap lebih dulu.'],
            ['date' => Carbon::today()->subDays(40), 'insight' => 'Mayoritas konflik berasal dari asumsi, bukan fakta.'],
            ['date' => Carbon::today()->subDays(41), 'insight' => 'Kadang kita berusaha keras diterima oleh orang yang tidak pernah bisa menerima siapa pun.'],
            ['date' => Carbon::today()->subDays(42), 'insight' => 'Kerentanan adalah bentuk kekuatan, bukan kelemahan.'],
            ['date' => Carbon::today()->subDays(43), 'insight' => 'Yang tampak kuat di luar sering menyembunyikan luka yang dalam di dalam.'],
            ['date' => Carbon::today()->subDays(44), 'insight' => 'Diam bukan berarti tidak peduli; kadang itu cara terbaik menjaga hati.'],
            ['date' => Carbon::today()->subDays(45), 'insight' => 'Kesuksesan terbesar adalah mampu memilih diri sendiri tanpa harus kehilangan kebaikan.'],
            ['date' => Carbon::today()->subDays(46), 'insight' => 'Manusia tidak bisa berubah jika mereka sibuk membuktikan bahwa mereka sudah benar.'],
            ['date' => Carbon::today()->subDays(47), 'insight' => 'Kehilangan mengajarkan cara menghargai, bukan cara membenci.'],
            ['date' => Carbon::today()->subDays(48), 'insight' => 'Kamu boleh berhenti sejenak, tapi jangan menyerah.'],
            ['date' => Carbon::today()->subDays(49), 'insight' => 'Pertumbuhan terjadi di luar zona nyaman, bukan di dalamnya.'],
            ['date' => Carbon::today()->subDays(50), 'insight' => 'Kualitas hidup meningkat saat kita memilih kesederhanaan dibanding kerumitan.'],
            ['date' => Carbon::today()->subDays(51), 'insight' => 'Jika kamu terus mengulang cerita yang sama, kamu tidak memberi kesempatan bab baru untuk dimulai.'],
            ['date' => Carbon::today()->subDays(52), 'insight' => 'Kadang kita butuh ditolak agar diarahkan.'],
            ['date' => Carbon::today()->subDays(53), 'insight' => 'Cinta yang sehat tidak membuatmu kehilangan diri sendiri.'],
            ['date' => Carbon::today()->subDays(54), 'insight' => 'Kesabaran bukan menunggu tanpa rasa gelisah, tapi tetap tenang meski belum ada hasil.'],
            ['date' => Carbon::today()->subDays(55), 'insight' => 'Kita tidak bisa menyembuhkan sesuatu yang kita tolak untuk akui.'],
            ['date' => Carbon::today()->subDays(56), 'insight' => 'Beberapa luka tidak hilang, tapi kita belajar berjalan berdampingan dengannya.'],
            ['date' => Carbon::today()->subDays(57), 'insight' => 'Semakin kita paham dunia, semakin kita paham bahwa yang bisa kita bentuk hanyalah diri sendiri.'],
            ['date' => Carbon::today()->subDays(58), 'insight' => 'Orang sering kali berkomentar berdasarkan perspektif, bukan kebenaran.'],
            ['date' => Carbon::today()->subDays(59), 'insight' => 'Ada kekuatan dalam mengatakan "tidak", karena itu melindungi ruang untuk "ya" yang penting.'],
            ['date' => Carbon::today()->subDays(60), 'insight' => 'Kecewa terjadi ketika orang lain tidak memenuhi skenario dalam kepala kita.'],
            ['date' => Carbon::today()->subDays(61), 'insight' => 'Kita bisa mencintai seseorang tapi tetap memutuskan untuk pergi demi kesehatan batin.'],
            ['date' => Carbon::today()->subDays(62), 'insight' => 'Pikiran bisa menjadi rumah atau perangkap, tergantung bagaimana kita merawatnya.'],
            ['date' => Carbon::today()->subDays(63), 'insight' => 'Waktu yang salah dapat merusak hal yang benar, dan waktu yang tepat dapat menyembuhkan yang salah.'],
            ['date' => Carbon::today()->subDays(64), 'insight' => 'Karakter seseorang terlihat dari cara ia bersikap saat tidak ada yang melihat.'],
            ['date' => Carbon::today()->subDays(65), 'insight' => 'Penerimaan bukan menyerah, tapi berhenti berperang dengan kenyataan.'],
            ['date' => Carbon::today()->subDays(66), 'insight' => 'Kita tidak selalu mendapatkan apa yang kita inginkan, tapi sering mendapatkan apa yang kita butuhkan.'],
            ['date' => Carbon::today()->subDays(67), 'insight' => 'Emosi adalah informasi, bukan identitas.'],
            ['date' => Carbon::today()->subDays(68), 'insight' => 'Beberapa orang masuk untuk menjadi pelajaran terbesar, bukan cinta terbesar.'],
            ['date' => Carbon::today()->subDays(69), 'insight' => 'Hidup butuh keseimbangan antara ambisi dan syukur.'],
            ['date' => Carbon::today()->subDays(70), 'insight' => 'Jika kamu terus bicara buruk tentang hidupmu, hidupmu akan terus menyesuaikan diri.'],
            ['date' => Carbon::today()->subDays(71), 'insight' => 'Kesepian bukan kurangnya orang, tapi kurangnya koneksi batin.'],
            ['date' => Carbon::today()->subDays(72), 'insight' => 'Kedalaman seseorang terlihat dari pertanyaan yang ia ajukan, bukan jawaban yang ia punya.'],
            ['date' => Carbon::today()->subDays(73), 'insight' => 'Menahan diri adalah bentuk kekuatan yang jarang disadari.'],
            ['date' => Carbon::today()->subDays(74), 'insight' => 'Kita sering menghindari hal yang paling kita butuhkan—keterbukaan, kejujuran, keberanian.'],
            ['date' => Carbon::today()->subDays(75), 'insight' => 'Kehidupan jarang memberi instruksi, tapi selalu memberi petunjuk.'],
            ['date' => Carbon::today()->subDays(76), 'insight' => 'Ruang hening bisa menyembuhkan lebih banyak dibanding percakapan panjang.'],
            ['date' => Carbon::today()->subDays(77), 'insight' => 'Batasan adalah bentuk cinta pada diri sendiri.'],
            ['date' => Carbon::today()->subDays(78), 'insight' => 'Bukan waktu yang menyembuhkan luka, tapi cara kita memahaminya.'],
            ['date' => Carbon::today()->subDays(79), 'insight' => 'Kamu tidak bisa mengubah masa lalu, tapi kamu bisa mengubah makna yang kamu berikan padanya.'],
            ['date' => Carbon::today()->subDays(80), 'insight' => 'Banyak orang ingin didengar, sedikit yang ingin memahami.'],
            ['date' => Carbon::today()->subDays(81), 'insight' => 'Terkadang, kehilangan membuat kita menemukan diri yang lebih jujur.'],
            ['date' => Carbon::today()->subDays(82), 'insight' => 'Kesuksesan sejati adalah merasa cukup, bukan terlihat cukup.'],
            ['date' => Carbon::today()->subDays(83), 'insight' => 'Diam bukan berarti kalah; kadang itu bentuk kemenangan terbesar.'],
            ['date' => Carbon::today()->subDays(84), 'insight' => 'Keindahan hidup ada pada ketidakterdugaan, bukan kepastian.'],
            ['date' => Carbon::today()->subDays(85), 'insight' => 'Kita sering menilai hidup orang lain tanpa tahu beban yang mereka pikul.'],
            ['date' => Carbon::today()->subDays(86), 'insight' => 'Cinta tanpa hormat akan selalu berakhir dengan kehancuran.'],
            ['date' => Carbon::today()->subDays(87), 'insight' => 'Keberanian adalah melangkah meski tidak yakin akan hasilnya.'],
            ['date' => Carbon::today()->subDays(88), 'insight' => 'Ada versi terbaik dari dirimu yang hanya muncul ketika kamu berhenti membandingkan.'],
            ['date' => Carbon::today()->subDays(89), 'insight' => 'Kemelekatan menciptakan penderitaan, tapi kepemilikan diri menciptakan kedewasaan.'],
            ['date' => Carbon::today()->subDays(90), 'insight' => 'Ketulusan sulit dicari karena membutuhkan keberanian untuk jujur.'],
            ['date' => Carbon::today()->subDays(91), 'insight' => 'Kadang, yang kamu cari bukan jawaban, tapi ketenangan.'],
            ['date' => Carbon::today()->subDays(92), 'insight' => 'Orang yang kamu bantu tidak selalu menjadi orang yang mendukungmu. Itu bukan alasan untuk berhenti baik.'],
            ['date' => Carbon::today()->subDays(93), 'insight' => 'Rasa sakit adalah guru yang keras, tapi adil.'],
            ['date' => Carbon::today()->subDays(94), 'insight' => 'Tidak semua perjalanan butuh tujuan; beberapa hanya butuh dinikmati.'],
            ['date' => Carbon::today()->subDays(95), 'insight' => 'Kita tahu cukup saat kita bisa membiarkan sesuatu pergi tanpa rasa dendam.'],
            ['date' => Carbon::today()->subDays(96), 'insight' => 'Orang yang paling sulit kamu menangkan adalah dirimu sendiri.'],
            ['date' => Carbon::today()->subDays(97), 'insight' => 'Kreativitas lahir dari ruang kosong, bukan dari kesibukan yang tidak putus.'],
            ['date' => Carbon::today()->subDays(98), 'insight' => 'Ada perbedaan antara hidup dan sekadar bertahan hidup.'],
            ['date' => Carbon::today()->subDays(99), 'insight' => 'Pada akhirnya, bukan tentang berapa lama kita hidup, tapi seberapa dalam kita merasakan hidup itu.'],
        ];

        // Hapus data lama
        DailyInsight::truncate();

        // Insert semua data
        foreach ($data as $item) {
            DailyInsight::create($item);
        }
    }
}