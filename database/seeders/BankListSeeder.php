<?php

namespace Database\Seeders;

use App\Models\BankList;
use Illuminate\Database\Seeder;

class BankListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank_list = [
        [
            'bank_code' => '002',
            'bank_name' => 'Bank BRI'
        ],[
            'bank_code' => '008',
            'bank_name' => 'Bank Mandiri'
        ], [
            'bank_code' => '009',
            'bank_name' => 'Bank BNI'
        ], [
            'bank_code' => '011',
            'bank_name' => 'Bank Danamon'
        ], [
            'bank_code' => '013',
            'bank_name' => 'Bank Permata'
        ], [
            'bank_code' => '014',
            'bank_name' => 'Bank Central Asia'
        ], [
            'bank_code' => '016',
            'bank_name' => 'Bank Maybank Indonesia'
        ], [
            'bank_code' => '019',
            'bank_name' => 'Bank Panin'
        ], [
            'bank_code' => '022',
            'bank_name' => 'CIMB Niaga'
        ], [
            'bank_code' => '023',
            'bank_name' => 'Bank UOB Indonesia'
        ], [
            'bank_code' => '028',
            'bank_name' => 'Bank OCBC NISP'
        ], [
            'bank_code' => '031',
            'bank_name' => 'Citi Bank'
        ], [
            'bank_code' => '036',
            'bank_name' => 'Bank CCB (Ex-Bank Windu Kentjana)'
        ], [
            'bank_code' => '037',
            'bank_name' => 'Bank Artha Graha'
        ], [
            'bank_code' => '042',
            'bank_name' => 'MUFG Bank'
        ], [
            'bank_code' => '046',
            'bank_name' => 'Bank DBS'
        ], [
            'bank_code' => '050',
            'bank_name' => 'Standard Chartered Bank'
        ], [
            'bank_code' => '054',
            'bank_name' => 'Bank Capital'
        ], [
            'bank_code' => '061',
            'bank_name' => 'ANZ Indonesia'
        ], [
            'bank_code' => '069',
            'bank_name' => 'Bank Of China'
        ], [
            'bank_code' => '076',
            'bank_name' => 'Bank Bumi Arta'
        ], [
            'bank_code' => '087',
            'bank_name' => 'Bank HSBC Indonesia'
        ], [
            'bank_code' => '095',
            'bank_name' => 'Bank JTrust Indonesia'
        ], [
            'bank_code' => '097',
            'bank_name' => 'Bank Mayapada'
        ], [
            'bank_code' => '110',
            'bank_name' => 'Bank BJB'
        ], [
            'bank_code' => '111',
            'bank_name' => 'Bank DKI'
        ], [
            'bank_code' => '112',
            'bank_name' => 'Bank BPD DIY'
        ], [
            'bank_code' => '113',
            'bank_name' => 'Bank Jateng'
        ], [
            'bank_code' => '114',
            'bank_name' => 'Bank Jatim'
        ], [
            'bank_code' => '115',
            'bank_name' => 'Bank Jambi'
        ], [
            'bank_code' => '116',
            'bank_name' => 'Bank Aceh'
        ], [
            'bank_code' => '117',
            'bank_name' => 'Bank Sumut'
        ], [
            'bank_code' => '118',
            'bank_name' => 'Bank Nagari'
        ], [
            'bank_code' => '119',
            'bank_name' => 'Bank Riau Kepri'
        ], [
            'bank_code' => '120',
            'bank_name' => 'Bank Sumsel Babel'
        ], [
            'bank_code' => '121',
            'bank_name' => 'Bank Lampung'
        ], [
            'bank_code' => '122',
            'bank_name' => 'Bank Kalsel'
        ], [
            'bank_code' => '123',
            'bank_name' => 'Bank Kalbar'
        ], [
            'bank_code' => '124',
            'bank_name' => 'Bank Kaltimtara'
        ], [
            'bank_code' => '125',
            'bank_name' => 'Bank Kalteng'
        ], [
            'bank_code' => '126',
            'bank_name' => 'Bank Sulselbar'
        ], [
            'bank_code' => '127',
            'bank_name' => 'Bank Sulut Go'
        ], [
            'bank_code' => '128',
            'bank_name' => 'Bank NTB Syariah'
        ], [
            'bank_code' => '129',
            'bank_name' => 'Bank BPD Bali'
        ], [
            'bank_code' => '130',
            'bank_name' => 'Bank NTT'
        ], [
            'bank_code' => '131',
            'bank_name' => 'Bank Maluku Malut'
        ], [
            'bank_code' => '132',
            'bank_name' => 'Bank Papua'
        ], [
            'bank_code' => '133',
            'bank_name' => 'Bank Bengkulu'
        ], [
            'bank_code' => '134',
            'bank_name' => 'Bank Sulteng'
        ], [
            'bank_code' => '135',
            'bank_name' => 'Bank Sultra'
        ], [
            'bank_code' => '137',
            'bank_name' => 'Bank Banten'
        ], [
            'bank_code' => '146',
            'bank_name' => 'Bank Of India Indonesia'
        ], [
            'bank_code' => '147',
            'bank_name' => 'Bank Muamalat Indonesia'
        ], [
            'bank_code' => '151',
            'bank_name' => 'Bank Mestika'
        ], [
            'bank_code' => '152',
            'bank_name' => 'Bank Shinhan Indonesia'
        ], [
            'bank_code' => '153',
            'bank_name' => 'Bank Sinarmas'
        ], [
            'bank_code' => '157',
            'bank_name' => 'Bank Maspion Indonesia'
        ], [
            'bank_code' => '161',
            'bank_name' => 'Bank Ganesha'
        ], [
            'bank_code' => '164',
            'bank_name' => 'Bank ICBC Indonesia'
        ], [
            'bank_code' => '167',
            'bank_name' => 'Bank QNB Indonesia'
        ], [
            'bank_code' => '200',
            'bank_name' => 'Bank BTN'
        ], [
            'bank_code' => '212',
            'bank_name' => 'Bank Woori Saudara'
        ], [
            'bank_code' => '213',
            'bank_name' => 'Bank BTPN'
        ], [
            'bank_code' => '405',
            'bank_name' => 'Bank Victoria Syariah'
        ], [
            'bank_code' => '425',
            'bank_name' => 'Bank BJB Syariah'
        ], [
            'bank_code' => '426',
            'bank_name' => 'Bank Mega'
        ], [
            'bank_code' => '441',
            'bank_name' => 'Bank Bukopin'
        ], [
            'bank_code' => '451',
            'bank_name' => 'Bank Syariah Indonesia'
        ], [
            'bank_code' => '472',
            'bank_name' => 'Bank Jasa Jakarta'
        ], [
            'bank_code' => '484',
            'bank_name' => 'Bank KEB Hana'
        ], [
            'bank_code' => '485',
            'bank_name' => 'MNC Bank'
        ], [
            'bank_code' => '490',
            'bank_name' => 'Bank Neo Commerce'
        ], [
            'bank_code' => '494',
            'bank_name' => 'Bank BRI Agroniaga'
        ], [
            'bank_code' => '498',
            'bank_name' => 'Bank SBI'
        ], [
            'bank_code' => '501',
            'bank_name' => 'Bank Digital BCA'
        ], [
            'bank_code' => '503',
            'bank_name' => 'Bank Nobu'
        ], [
            'bank_code' => '506',
            'bank_name' => 'Bank Mega Syariah'
        ], [
            'bank_code' => '513',
            'bank_name' => 'Bank Ina Perdana'
        ], [
            'bank_code' => '517',
            'bank_name' => 'Bank Panin Dubai Syariah'
        ], [
            'bank_code' => '520',
            'bank_name' => 'Bank Prima Master'
        ], [
            'bank_code' => '521',
            'bank_name' => 'Bank Syariah Bukopin'
        ], [
            'bank_code' => '523',
            'bank_name' => 'Bank Sahabat Sampoerna'
        ], [
            'bank_code' => '526',
            'bank_name' => 'Bank Oke Indonesia'
        ], [
            'bank_code' => '531',
            'bank_name' => 'AMAR BANK'
        ], [
            'bank_code' => '535',
            'bank_name' => 'SEA Bank'
        ], [
            'bank_code' => '536',
            'bank_name' => 'Bank BCA Syariah'
        ], [
            'bank_code' => '542',
            'bank_name' => 'Bank Jago'
        ], [
            'bank_code' => '547',
            'bank_name' => 'Bank BTPN Syariah'
        ], [
            'bank_code' => '548',
            'bank_name' => 'Bank Multiarta Sentosa'
        ], [
            'bank_code' => '553',
            'bank_name' => 'Bank Mayora'
        ], [
            'bank_code' => '555',
            'bank_name' => 'Bank Index Selindo'
        ], [
            'bank_code' => '564',
            'bank_name' => 'Bank Mantap'
        ], [
            'bank_code' => '566',
            'bank_name' => 'Bank Victoria International'
        ], [
            'bank_code' => '567',
            'bank_name' => 'Allo Bank'
        ], [
            'bank_code' => '600',
            'bank_name' => 'BPR/LSB'
        ], [
            'bank_code' => '688',
            'bank_name' => 'BPR KS'
        ], [
            'bank_code' => '699',
            'bank_name' => 'BPR EKA'
        ], [
            'bank_code' => '789',
            'bank_name' => 'IMkas'
        ], [
            'bank_code' => '911',
            'bank_name' => 'LinkAja'
        ], [
            'bank_code' => '945',
            'bank_name' => 'Bank Agris'
        ], [
            'bank_code' => '949',
            'bank_name' => 'Bank Chinatrust Indonesia'
        ], [
            'bank_code' => '947',
            'bank_name' => 'Bank Aladin Syariah'
        ], [
            'bank_code' => '950',
            'bank_name' => 'Bank Commonwealth'
        ], [
            'bank_code' => '1010',
            'bank_name' => 'OVO'
        ], [
            'bank_code' => '1012',
            'bank_name' => 'DANA'
        ], [
            'bank_code' => '1013',
            'bank_name' => 'Shopeepay'
        ], [
            'bank_code' => '1014',
            'bank_name' => 'LinkAja Direct'
        ],
    ];

    BankList::insert($bank_list);
    }
}
