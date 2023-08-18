<?php

namespace Database\Seeders;
use App\Models\soal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        soal::create([
            'kode_soal' => '12acas',
            'grup_soal_id' => '2',
            'pertanyaan' => 'tenaga dokter yang diharapkan olehWHO (1978) dibawah ini kecuali?',
            'slug' => '12acas',
            'opsi_a' => 'Decision maker',
            'opsi_b' => 'Community leader',
            'opsi_c' => 'Experienced',
            'opsi_d' => 'Communicator',
            'opsi_e' => 'Komunikasi',
            'jawaban' => 'Community leader',
            'bobot' => 1
        ]);

        soal::create([
            'kode_soal' => '12kads',
            'grup_soal_id' => '2',
            'pertanyaan' => 'Enchepalomalacia berarti...',
            'slug' => '12kads',
            'opsi_a' => 'Peradangan otak',
            'opsi_b' => 'Pelunakan otak',
            'opsi_c' => 'Penumpukan darah pada otak',
            'opsi_d' => 'Pelabaran selaput otak',
            'opsi_e' => 'Penyakit Tumor',
            'jawaban' => 'Peradangan otak',
            'bobot' => 1
        ]);

        soal::create([
            'kode_soal' => '32aieija',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Sistem pertahanan tubuh memiliki beberapa fungsi, kecuali....',
            'slug' => '32aieija',
            'opsi_a' => 'Menyingkirkan sel-sel yang sudah rusak akibat cedera',
            'opsi_b' => 'Mengenali dan menghancurkan sel-sel normal',
            'opsi_c' => 'Mempertahankan tubuh dari patogen invasif',
            'opsi_d' => 'Melindungi tubuh terhadap serangan antigen dari lingkungan',
            'opsi_e' => 'Menjaga Imun',
            'jawaban' => 'Mengenali dan menghancurkan sel-sel normal',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '32aieadf',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Pada suatu waktu kita sering mengalami bersin hal ini disebabkan karena...',
            'slug' => '32aieadf',
            'opsi_a' => 'Proses penyaringan udara',
            'opsi_b' => 'Masuknya virus',
            'opsi_c' => 'Pemanasan udara',
            'opsi_d' => 'Mengeluarkan virus',
            'opsi_e' => 'Bulu ayam',
            'jawaban' => 'Mengeluarkan virus',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '32aiead4df',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Apa gas yang dimasukkan ke dalam tubuh pada udara pernapasan?',
            'slug' => '32aiead4df',
            'opsi_a' => 'Oksigen',
            'opsi_b' => 'Karbondioksida',
            'opsi_c' => 'Amoniak',
            'opsi_d' => 'Nitrogen',
            'opsi_e' => 'CO2',
            'jawaban' => 'Oksigen',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '32a62tw',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Tubuh manusia melakukan proses metabolisme, salah satunya ekskresi. Proses yang termasuk ke dalam ekskresi adalah...',
            'slug' => '32a62tw',
            'opsi_a' => 'Pengeluaran insulin dari pankreas',
            'opsi_b' => 'Keluarnya feses dari anus',
            'opsi_c' => 'Pengeluaran saliva dari glandula saliva',
            'opsi_d' => 'Pengeluaran CO2 paru paru',
            'opsi_e' => 'imunisasi',
            'jawaban' => 'Pengeluaran CO2 paru paru',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '32a64fsa',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Apa kepanjangan dari HIV?',
            'slug' => '32a64fsa',
            'opsi_a' => 'Human Immuno Virus',
            'opsi_b' => 'Human Immunodeficiency Virus',
            'opsi_c' => 'Humane Immunodeficiency Virus',
            'opsi_d' => 'Human Immunoficiency Virus',
            'opsi_e' => 'Human Imun Virus',
            'jawaban' => 'Human Immunodeficiency Virus',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '32a64f21a',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Apa yang menjadi faktor semakin besarnya peluang peningkatan paparan kasus pada Tubercullosis, kecuali?',
            'slug' => '32a64f21a',
            'opsi_a' => 'Intensitas batuk sumber menular yang banyak.',
            'opsi_b' => 'Konsentrasi kuman diudara di dalam rumah yang sumber cahayanya sangat minim',
            'opsi_c' => 'Faktor lingkungan rumah dengan ventilasi dan penyaringan udara yang memadai.',
            'opsi_d' => 'Kedekatan kontak dengan sumber penularan.',
            'opsi_e' => 'Faktor sumber yang menular',
            'jawaban' => 'Faktor lingkungan rumah dengan ventilasi dan penyaringan udara yang memadai.',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '83jsf21a',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Apa yang menjadi vektor perantara dalam penularan penyakit malaria?',
            'slug' => '83jsf21a',
            'opsi_a' => 'Nyamuk Aedes aegypti',
            'opsi_b' => 'Nyamuk Anopheles',
            'opsi_c' => 'Nyamuk Culex',
            'opsi_d' => 'Nyamuk Filaria',
            'opsi_e' => 'Nyamuk Aedes',
            'jawaban' => 'Nyamuk Anopheles',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '83jsfusua',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Keberhasilan kegiatan PSN (Pemberantasan Sarang Nyamuk) dapat diukur dengan indikator dibawah ini, kecuali?',
            'slug' => '83jsfusua',
            'opsi_a' => 'Car Index',
            'opsi_b' => 'Angka Bebas Jentik',
            'opsi_c' => 'Angka Bebas Nyamuk',
            'opsi_d' => 'Mosquito Index',
            'opsi_e' => 'Nyamuk Aedes',
            'jawaban' => 'Angka Bebas Jentik',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '83jsfunlka',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Nyamuk apakah yang bisa menjadi vektor seseorang bisa tertular penyakit demam berdarah?',
            'slug' => '83jsfunlka',
            'opsi_a' => 'Nyamuk Culex',
            'opsi_b' => 'Nyamuk Anopheles',
            'opsi_c' => 'Nyamuk Aedes aegypti',
            'opsi_d' => 'Nyamuk Filaria',
            'opsi_e' => 'Nyamuk Aedes',
            'jawaban' => 'Nyamuk Aedes aegypti',
            'bobot' => 1
        ]);
        soal::create([
            'kode_soal' => '83jsfuaas',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Salah satu tanda awal gejala AIDS adalah ....',
            'slug' => '83jsfuaas',
            'opsi_a' => 'pilek',
            'opsi_b' => 'demam 104 F',
            'opsi_c' => 'demam 30 F',
            'opsi_d' => 'demam 104 C',
            'opsi_e' => 'demam 100 C',
            'jawaban' => 'demam 104 F',
            'bobot' => 1
        ]);
    }
}
