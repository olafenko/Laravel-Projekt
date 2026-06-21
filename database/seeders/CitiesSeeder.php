<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();


        $citiesList = [
            'Warszawa', 'Kraków', 'Łódź', 'Wrocław', 'Poznań', 'Gdańsk', 'Szczecin', 'Bydgoszcz', 'Lublin', 'Białystok',
            'Katowice', 'Rzeszów', 'Kielce', 'Olsztyn', 'Opole', 'Zielona Góra', 'Gorzów Wielkopolski', 'Toruń', 'Gdynia',
            'Częstochowa', 'Radom', 'Sosnowiec', 'Gliwice', 'Zabrze', 'Bielsko-Biała', 'Bytom', 'Rybnik', 'Ruda Śląska',
            'Tychy', 'Dąbrowa Górnicza', 'Elbląg', 'Płock', 'Wałbrzych', 'Włocławek', 'Tarnów', 'Chorzów', 'Koszalin',
            'Kalisz', 'Legnica', 'Grudziądz', 'Jaworzno', 'Słupsk', 'Jastrzębie-Zdrój', 'Nowy Sącz', 'Jelenia Góra',
            'Siedlce', 'Mysłowice', 'Konin', 'Piła', 'Piotrków Trybunalski', 'Inowrocław', 'Lubin', 'Ostrów Wielkopolski',
            'Suwałki', 'Stargard', 'Gniezno', 'Ostrowiec Świętokrzyski', 'Siemianowice Śląskie', 'Głogów', 'Pabianice',
            'Leszno', 'Żory', 'Zamość', 'Pruszków', 'Łomża', 'Ełk', 'Tarnowskie Góry', 'Tomaszów Mazowiecki', 'Chełm',
            'Mielec', 'Kędzierzyn-Koźle', 'Przemyśl', 'Stalowa Wola', 'Tczew', 'Biała Podlaska', 'Bełchatów', 'Świdnica',
            'Będzin', 'Zgierz', 'Piekary Śląskie', 'Racibórz', 'Legionowo', 'Ostrołęka', 'Świętochłowice', 'Zawiercie',
            'Wejherowo', 'Starachowice', 'Wodzisław Śląski', 'Puławy', 'Skierniewice', 'Starogard Gdański', 'Rumia',
            'Tarnobrzeg', 'Piaseczno', 'Radomsko', 'Krosno', 'Kołobrzeg', 'Dębica', 'Skarżysko-Kamienna', 'Otwock'
        ];

        $citiesData = [];
        foreach ($citiesList as $city) {
            $citiesData[] = [
                'name' => $city,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('cities')->insert($citiesData);
    }
}
