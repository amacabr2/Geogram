<?php

use App\Voyage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: antho
 * Date: 17/12/2017
 * Time: 11:42
 */

class VoyagesTableSeeder extends Seeder {

    use HelperSeeder;

    /**
     * Crée un certain nombre de voyages en base de données
     */
    public function run() {
        DB::table('voyages')->delete();

        for ($i = 0; $i < 84; $i++) {
            $local = $this->getLocation($i % 42);
            $dates = $this->getDate();

            Voyage::create([
                'state' => $local['state'],
                'longitude' => $local['longitude'],
                'latitude' => $local['latitude'],
                'dateBegin' => $dates['begin'],
                'dateEnd' => $dates['end'],
                'user_id' => $i + 1
            ]);
        }
    }

    /**
     * Permet d'avoir une localisation de voyage réaliste
     * et d'avoir le state et la latitude / longitude de facon réaliste
     *
     * @param int $index
     * @return array
     */
    public function getLocation(int $index): array {
        $locals = [
            'ar_JO', 'ar_SA', 'at_AT', 'bg_BG', 'bn_BD', 'cs_CZ', 'da_DK', 'de_AT', 'de_CH', 'de_DE',
            'el_CY', 'el_GR', 'en_AU', 'en_CA', 'en_GB', 'en_HK', 'en_IN', 'en_NG', 'en_NZ', 'en_PH', 'en_SG', 'en_UG', 'en_US', 'en_ZA',
            'es_ES', 'es_PE', 'es_VE', 'fa_IR', 'fi_FI', 'fr_BE', 'fr_CA', 'fr_CH', 'fr_FR',
            'he_IL', 'hr_HR', 'hu_HU', 'hy_AM', 'id_ID', 'is_IS', 'it_CH', 'it_IT', 'ja_JP'
        ];

        return [
            'state' => $this->getFaker($locals[$index])->country,
            'longitude' => $this->getFaker($locals[$index])->longitude,
            'latitude' => $this->getFaker($locals[$index])->latitude
        ];
    }

    public function getDate(): array {
        $begin = $this->getFaker()->date('Y-m-d', 'now');

        do {
            $end = $this->getFaker()->date('Y-m-d', 'now');
        } while ($begin > $end);

        return compact("begin", 'end');
    }
}