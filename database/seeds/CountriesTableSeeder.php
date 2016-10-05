<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries        = [
            [
                'name'            => 'Afghanistan',
                'iso_alpha2'      => 'AF',
                'iso_alpha3'      => 'AFG',
                'iso_numeric'     => 4,
                'currency_code'   => 'AFN',
                'currency_name'   => 'Afghani',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Albania',
                'iso_alpha2'      => 'AL',
                'iso_alpha3'      => 'ALB',
                'iso_numeric'     => 8,
                'currency_code'   => 'ALL',
                'currency_name'   => 'Lek',
                'currency_symbol' => 'Lek',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Algeria',
                'iso_alpha2'      => 'DZ',
                'iso_alpha3'      => 'DZA',
                'iso_numeric'     => 12,
                'currency_code'   => 'DZD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'American Samoa',
                'iso_alpha2'      => 'AS',
                'iso_alpha3'      => 'ASM',
                'iso_numeric'     => 16,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Andorra',
                'iso_alpha2'      => 'AD',
                'iso_alpha3'      => 'AND',
                'iso_numeric'     => 20,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Angola',
                'iso_alpha2'      => 'AO',
                'iso_alpha3'      => 'AGO',
                'iso_numeric'     => 24,
                'currency_code'   => 'AOA',
                'currency_name'   => 'Kwanza',
                'currency_symbol' => 'Kz',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Anguilla',
                'iso_alpha2'      => 'AI',
                'iso_alpha3'      => 'AIA',
                'iso_numeric'     => 660,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Antarctica',
                'iso_alpha2'      => 'AQ',
                'iso_alpha3'      => 'ATA',
                'iso_numeric'     => 10,
                'currency_code'   => null,
                'currency_name'   => null,
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Antigua and Barbuda',
                'iso_alpha2'      => 'AG',
                'iso_alpha3'      => 'ATG',
                'iso_numeric'     => 28,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Argentina',
                'iso_alpha2'      => 'AR',
                'iso_alpha3'      => 'ARG',
                'iso_numeric'     => 32,
                'currency_code'   => 'ARS',
                'currency_name'   => 'Peso',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Armenia',
                'iso_alpha2'      => 'AM',
                'iso_alpha3'      => 'ARM',
                'iso_numeric'     => 51,
                'currency_code'   => 'AMD',
                'currency_name'   => 'Dram',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Aruba',
                'iso_alpha2'      => 'AW',
                'iso_alpha3'      => 'ABW',
                'iso_numeric'     => 533,
                'currency_code'   => 'AWG',
                'currency_name'   => 'Guilder',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Australia',
                'iso_alpha2'      => 'AU',
                'iso_alpha3'      => 'AUS',
                'iso_numeric'     => 36,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Austria',
                'iso_alpha2'      => 'AT',
                'iso_alpha3'      => 'AUT',
                'iso_numeric'     => 40,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Azerbaijan',
                'iso_alpha2'      => 'AZ',
                'iso_alpha3'      => 'AZE',
                'iso_numeric'     => 31,
                'currency_code'   => 'AZN',
                'currency_name'   => 'Manat',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bahamas',
                'iso_alpha2'      => 'BS',
                'iso_alpha3'      => 'BHS',
                'iso_numeric'     => 44,
                'currency_code'   => 'BSD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bahrain',
                'iso_alpha2'      => 'BH',
                'iso_alpha3'      => 'BHR',
                'iso_numeric'     => 48,
                'currency_code'   => 'BHD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bangladesh',
                'iso_alpha2'      => 'BD',
                'iso_alpha3'      => 'BGD',
                'iso_numeric'     => 50,
                'currency_code'   => 'BDT',
                'currency_name'   => 'Taka',
                'currency_symbol' => null,
                'is_supported'    => 1
            ],
            [
                'name'            => 'Barbados',
                'iso_alpha2'      => 'BB',
                'iso_alpha3'      => 'BRB',
                'iso_numeric'     => 52,
                'currency_code'   => 'BBD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Belarus',
                'iso_alpha2'      => 'BY',
                'iso_alpha3'      => 'BLR',
                'iso_numeric'     => 112,
                'currency_code'   => 'BYR',
                'currency_name'   => 'Ruble',
                'currency_symbol' => 'p.',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Belgium',
                'iso_alpha2'      => 'BE',
                'iso_alpha3'      => 'BEL',
                'iso_numeric'     => 56,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Belize',
                'iso_alpha2'      => 'BZ',
                'iso_alpha3'      => 'BLZ',
                'iso_numeric'     => 84,
                'currency_code'   => 'BZD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => 'BZ$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Benin',
                'iso_alpha2'      => 'BJ',
                'iso_alpha3'      => 'BEN',
                'iso_numeric'     => 204,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bermuda',
                'iso_alpha2'      => 'BM',
                'iso_alpha3'      => 'BMU',
                'iso_numeric'     => 60,
                'currency_code'   => 'BMD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bhutan',
                'iso_alpha2'      => 'BT',
                'iso_alpha3'      => 'BTN',
                'iso_numeric'     => 64,
                'currency_code'   => 'BTN',
                'currency_name'   => 'Ngultrum',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bolivia',
                'iso_alpha2'      => 'BO',
                'iso_alpha3'      => 'BOL',
                'iso_numeric'     => 68,
                'currency_code'   => 'BOB',
                'currency_name'   => 'Boliviano',
                'currency_symbol' => '$b',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bosnia and Herzegovina',
                'iso_alpha2'      => 'BA',
                'iso_alpha3'      => 'BIH',
                'iso_numeric'     => 70,
                'currency_code'   => 'BAM',
                'currency_name'   => 'Marka',
                'currency_symbol' => 'KM',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Botswana',
                'iso_alpha2'      => 'BW',
                'iso_alpha3'      => 'BWA',
                'iso_numeric'     => 72,
                'currency_code'   => 'BWP',
                'currency_name'   => 'Pula',
                'currency_symbol' => 'P',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bouvet Island',
                'iso_alpha2'      => 'BV',
                'iso_alpha3'      => 'BVT',
                'iso_numeric'     => 74,
                'currency_code'   => 'NOK',
                'currency_name'   => 'Krone',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Brazil',
                'iso_alpha2'      => 'BR',
                'iso_alpha3'      => 'BRA',
                'iso_numeric'     => 76,
                'currency_code'   => 'BRL',
                'currency_name'   => 'Real',
                'currency_symbol' => 'R$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'British Indian Ocean Territory',
                'iso_alpha2'      => 'IO',
                'iso_alpha3'      => 'IOT',
                'iso_numeric'     => 86,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'British Virgin Islands',
                'iso_alpha2'      => 'VG',
                'iso_alpha3'      => 'VGB',
                'iso_numeric'     => 92,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Brunei',
                'iso_alpha2'      => 'BN',
                'iso_alpha3'      => 'BRN',
                'iso_numeric'     => 96,
                'currency_code'   => 'BND',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Bulgaria',
                'iso_alpha2'      => 'BG',
                'iso_alpha3'      => 'BGR',
                'iso_numeric'     => 100,
                'currency_code'   => 'BGN',
                'currency_name'   => 'Lev',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Burkina Faso',
                'iso_alpha2'      => 'BF',
                'iso_alpha3'      => 'BFA',
                'iso_numeric'     => 854,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Burundi',
                'iso_alpha2'      => 'BI',
                'iso_alpha3'      => 'BDI',
                'iso_numeric'     => 108,
                'currency_code'   => 'BIF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cambodia',
                'iso_alpha2'      => 'KH',
                'iso_alpha3'      => 'KHM',
                'iso_numeric'     => 116,
                'currency_code'   => 'KHR',
                'currency_name'   => 'Riels',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cameroon',
                'iso_alpha2'      => 'CM',
                'iso_alpha3'      => 'CMR',
                'iso_numeric'     => 120,
                'currency_code'   => 'XAF',
                'currency_name'   => 'Franc',
                'currency_symbol' => 'FCF',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Canada',
                'iso_alpha2'      => 'CA',
                'iso_alpha3'      => 'CAN',
                'iso_numeric'     => 124,
                'currency_code'   => 'CAD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cape Verde',
                'iso_alpha2'      => 'CV',
                'iso_alpha3'      => 'CPV',
                'iso_numeric'     => 132,
                'currency_code'   => 'CVE',
                'currency_name'   => 'Escudo',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cayman Islands',
                'iso_alpha2'      => 'KY',
                'iso_alpha3'      => 'CYM',
                'iso_numeric'     => 136,
                'currency_code'   => 'KYD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Central African Republic',
                'iso_alpha2'      => 'CF',
                'iso_alpha3'      => 'CAF',
                'iso_numeric'     => 140,
                'currency_code'   => 'XAF',
                'currency_name'   => 'Franc',
                'currency_symbol' => 'FCF',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Chad',
                'iso_alpha2'      => 'TD',
                'iso_alpha3'      => 'TCD',
                'iso_numeric'     => 148,
                'currency_code'   => 'XAF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Chile',
                'iso_alpha2'      => 'CL',
                'iso_alpha3'      => 'CHL',
                'iso_numeric'     => 152,
                'currency_code'   => 'CLP',
                'currency_name'   => 'Peso',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'China',
                'iso_alpha2'      => 'CN',
                'iso_alpha3'      => 'CHN',
                'iso_numeric'     => 156,
                'currency_code'   => 'CNY',
                'currency_name'   => 'Yuan Renminbi',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Christmas Island',
                'iso_alpha2'      => 'CX',
                'iso_alpha3'      => 'CXR',
                'iso_numeric'     => 162,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cocos Islands',
                'iso_alpha2'      => 'CC',
                'iso_alpha3'      => 'CCK',
                'iso_numeric'     => 166,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Colombia',
                'iso_alpha2'      => 'CO',
                'iso_alpha3'      => 'COL',
                'iso_numeric'     => 170,
                'currency_code'   => 'COP',
                'currency_name'   => 'Peso',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Comoros',
                'iso_alpha2'      => 'KM',
                'iso_alpha3'      => 'COM',
                'iso_numeric'     => 174,
                'currency_code'   => 'KMF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cook Islands',
                'iso_alpha2'      => 'CK',
                'iso_alpha3'      => 'COK',
                'iso_numeric'     => 184,
                'currency_code'   => 'NZD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Costa Rica',
                'iso_alpha2'      => 'CR',
                'iso_alpha3'      => 'CRI',
                'iso_numeric'     => 188,
                'currency_code'   => 'CRC',
                'currency_name'   => 'Colon',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Croatia',
                'iso_alpha2'      => 'HR',
                'iso_alpha3'      => 'HRV',
                'iso_numeric'     => 191,
                'currency_code'   => 'HRK',
                'currency_name'   => 'Kuna',
                'currency_symbol' => 'kn',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cuba',
                'iso_alpha2'      => 'CU',
                'iso_alpha3'      => 'CUB',
                'iso_numeric'     => 192,
                'currency_code'   => 'CUP',
                'currency_name'   => 'Peso',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Cyprus',
                'iso_alpha2'      => 'CY',
                'iso_alpha3'      => 'CYP',
                'iso_numeric'     => 196,
                'currency_code'   => 'CYP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Czech Republic',
                'iso_alpha2'      => 'CZ',
                'iso_alpha3'      => 'CZE',
                'iso_numeric'     => 203,
                'currency_code'   => 'CZK',
                'currency_name'   => 'Koruna',
                'currency_symbol' => 'Kc',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Democratic Republic of the Congo',
                'iso_alpha2'      => 'CD',
                'iso_alpha3'      => 'COD',
                'iso_numeric'     => 180,
                'currency_code'   => 'CDF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Denmark',
                'iso_alpha2'      => 'DK',
                'iso_alpha3'      => 'DNK',
                'iso_numeric'     => 208,
                'currency_code'   => 'DKK',
                'currency_name'   => 'Krone',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Djibouti',
                'iso_alpha2'      => 'DJ',
                'iso_alpha3'      => 'DJI',
                'iso_numeric'     => 262,
                'currency_code'   => 'DJF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Dominica',
                'iso_alpha2'      => 'DM',
                'iso_alpha3'      => 'DMA',
                'iso_numeric'     => 212,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Dominican Republic',
                'iso_alpha2'      => 'DO',
                'iso_alpha3'      => 'DOM',
                'iso_numeric'     => 214,
                'currency_code'   => 'DOP',
                'currency_name'   => 'Peso',
                'currency_symbol' => 'RD$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'East Timor',
                'iso_alpha2'      => 'TL',
                'iso_alpha3'      => 'TLS',
                'iso_numeric'     => 626,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Ecuador',
                'iso_alpha2'      => 'EC',
                'iso_alpha3'      => 'ECU',
                'iso_numeric'     => 218,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Egypt',
                'iso_alpha2'      => 'EG',
                'iso_alpha3'      => 'EGY',
                'iso_numeric'     => 818,
                'currency_code'   => 'EGP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'El Salvador',
                'iso_alpha2'      => 'SV',
                'iso_alpha3'      => 'SLV',
                'iso_numeric'     => 222,
                'currency_code'   => 'SVC',
                'currency_name'   => 'Colone',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Equatorial Guinea',
                'iso_alpha2'      => 'GQ',
                'iso_alpha3'      => 'GNQ',
                'iso_numeric'     => 226,
                'currency_code'   => 'XAF',
                'currency_name'   => 'Franc',
                'currency_symbol' => 'FCF',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Eritrea',
                'iso_alpha2'      => 'ER',
                'iso_alpha3'      => 'ERI',
                'iso_numeric'     => 232,
                'currency_code'   => 'ERN',
                'currency_name'   => 'Nakfa',
                'currency_symbol' => 'Nfk',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Estonia',
                'iso_alpha2'      => 'EE',
                'iso_alpha3'      => 'EST',
                'iso_numeric'     => 233,
                'currency_code'   => 'EEK',
                'currency_name'   => 'Kroon',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Ethiopia',
                'iso_alpha2'      => 'ET',
                'iso_alpha3'      => 'ETH',
                'iso_numeric'     => 231,
                'currency_code'   => 'ETB',
                'currency_name'   => 'Birr',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Falkland Islands',
                'iso_alpha2'      => 'FK',
                'iso_alpha3'      => 'FLK',
                'iso_numeric'     => 238,
                'currency_code'   => 'FKP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Faroe Islands',
                'iso_alpha2'      => 'FO',
                'iso_alpha3'      => 'FRO',
                'iso_numeric'     => 234,
                'currency_code'   => 'DKK',
                'currency_name'   => 'Krone',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Fiji',
                'iso_alpha2'      => 'FJ',
                'iso_alpha3'      => 'FJI',
                'iso_numeric'     => 242,
                'currency_code'   => 'FJD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Finland',
                'iso_alpha2'      => 'FI',
                'iso_alpha3'      => 'FIN',
                'iso_numeric'     => 246,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'France',
                'iso_alpha2'      => 'FR',
                'iso_alpha3'      => 'FRA',
                'iso_numeric'     => 250,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'French Guiana',
                'iso_alpha2'      => 'GF',
                'iso_alpha3'      => 'GUF',
                'iso_numeric'     => 254,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'French Polynesia',
                'iso_alpha2'      => 'PF',
                'iso_alpha3'      => 'PYF',
                'iso_numeric'     => 258,
                'currency_code'   => 'XPF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'French Southern Territories',
                'iso_alpha2'      => 'TF',
                'iso_alpha3'      => 'ATF',
                'iso_numeric'     => 260,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro  ',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Gabon',
                'iso_alpha2'      => 'GA',
                'iso_alpha3'      => 'GAB',
                'iso_numeric'     => 266,
                'currency_code'   => 'XAF',
                'currency_name'   => 'Franc',
                'currency_symbol' => 'FCF',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Gambia',
                'iso_alpha2'      => 'GM',
                'iso_alpha3'      => 'GMB',
                'iso_numeric'     => 270,
                'currency_code'   => 'GMD',
                'currency_name'   => 'Dalasi',
                'currency_symbol' => 'D',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Georgia',
                'iso_alpha2'      => 'GE',
                'iso_alpha3'      => 'GEO',
                'iso_numeric'     => 268,
                'currency_code'   => 'GEL',
                'currency_name'   => 'Lari',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Germany',
                'iso_alpha2'      => 'DE',
                'iso_alpha3'      => 'DEU',
                'iso_numeric'     => 276,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Ghana',
                'iso_alpha2'      => 'GH',
                'iso_alpha3'      => 'GHA',
                'iso_numeric'     => 288,
                'currency_code'   => 'GHC',
                'currency_name'   => 'Cedi',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Gibraltar',
                'iso_alpha2'      => 'GI',
                'iso_alpha3'      => 'GIB',
                'iso_numeric'     => 292,
                'currency_code'   => 'GIP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Greece',
                'iso_alpha2'      => 'GR',
                'iso_alpha3'      => 'GRC',
                'iso_numeric'     => 300,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Greenland',
                'iso_alpha2'      => 'GL',
                'iso_alpha3'      => 'GRL',
                'iso_numeric'     => 304,
                'currency_code'   => 'DKK',
                'currency_name'   => 'Krone',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Grenada',
                'iso_alpha2'      => 'GD',
                'iso_alpha3'      => 'GRD',
                'iso_numeric'     => 308,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Guadeloupe',
                'iso_alpha2'      => 'GP',
                'iso_alpha3'      => 'GLP',
                'iso_numeric'     => 312,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Guam',
                'iso_alpha2'      => 'GU',
                'iso_alpha3'      => 'GUM',
                'iso_numeric'     => 316,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Guatemala',
                'iso_alpha2'      => 'GT',
                'iso_alpha3'      => 'GTM',
                'iso_numeric'     => 320,
                'currency_code'   => 'GTQ',
                'currency_name'   => 'Quetzal',
                'currency_symbol' => 'Q',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Guinea',
                'iso_alpha2'      => 'GN',
                'iso_alpha3'      => 'GIN',
                'iso_numeric'     => 324,
                'currency_code'   => 'GNF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Guinea-Bissau',
                'iso_alpha2'      => 'GW',
                'iso_alpha3'      => 'GNB',
                'iso_numeric'     => 624,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Guyana',
                'iso_alpha2'      => 'GY',
                'iso_alpha3'      => 'GUY',
                'iso_numeric'     => 328,
                'currency_code'   => 'GYD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Haiti',
                'iso_alpha2'      => 'HT',
                'iso_alpha3'      => 'HTI',
                'iso_numeric'     => 332,
                'currency_code'   => 'HTG',
                'currency_name'   => 'Gourde',
                'currency_symbol' => 'G',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Heard Island and McDonald Islands',
                'iso_alpha2'      => 'HM',
                'iso_alpha3'      => 'HMD',
                'iso_numeric'     => 334,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Honduras',
                'iso_alpha2'      => 'HN',
                'iso_alpha3'      => 'HND',
                'iso_numeric'     => 340,
                'currency_code'   => 'HNL',
                'currency_name'   => 'Lempira',
                'currency_symbol' => 'L',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Hong Kong',
                'iso_alpha2'      => 'HK',
                'iso_alpha3'      => 'HKG',
                'iso_numeric'     => 344,
                'currency_code'   => 'HKD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Hungary',
                'iso_alpha2'      => 'HU',
                'iso_alpha3'      => 'HUN',
                'iso_numeric'     => 348,
                'currency_code'   => 'HUF',
                'currency_name'   => 'Forint',
                'currency_symbol' => 'Ft',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Iceland',
                'iso_alpha2'      => 'IS',
                'iso_alpha3'      => 'ISL',
                'iso_numeric'     => 352,
                'currency_code'   => 'ISK',
                'currency_name'   => 'Krona',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'India',
                'iso_alpha2'      => 'IN',
                'iso_alpha3'      => 'IND',
                'iso_numeric'     => 356,
                'currency_code'   => 'INR',
                'currency_name'   => 'Rupee',
                'currency_symbol' => null,
                'is_supported'    => 1
            ],
            [
                'name'            => 'Indonesia',
                'iso_alpha2'      => 'ID',
                'iso_alpha3'      => 'IDN',
                'iso_numeric'     => 360,
                'currency_code'   => 'IDR',
                'currency_name'   => 'Rupiah',
                'currency_symbol' => 'Rp',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Iran',
                'iso_alpha2'      => 'IR',
                'iso_alpha3'      => 'IRN',
                'iso_numeric'     => 364,
                'currency_code'   => 'IRR',
                'currency_name'   => 'Rial',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Iraq',
                'iso_alpha2'      => 'IQ',
                'iso_alpha3'      => 'IRQ',
                'iso_numeric'     => 368,
                'currency_code'   => 'IQD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Ireland',
                'iso_alpha2'      => 'IE',
                'iso_alpha3'      => 'IRL',
                'iso_numeric'     => 372,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Israel',
                'iso_alpha2'      => 'IL',
                'iso_alpha3'      => 'ISR',
                'iso_numeric'     => 376,
                'currency_code'   => 'ILS',
                'currency_name'   => 'Shekel',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Italy',
                'iso_alpha2'      => 'IT',
                'iso_alpha3'      => 'ITA',
                'iso_numeric'     => 380,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Ivory Coast',
                'iso_alpha2'      => 'CI',
                'iso_alpha3'      => 'CIV',
                'iso_numeric'     => 384,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Jamaica',
                'iso_alpha2'      => 'JM',
                'iso_alpha3'      => 'JAM',
                'iso_numeric'     => 388,
                'currency_code'   => 'JMD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Japan',
                'iso_alpha2'      => 'JP',
                'iso_alpha3'      => 'JPN',
                'iso_numeric'     => 392,
                'currency_code'   => 'JPY',
                'currency_name'   => 'Yen',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Jordan',
                'iso_alpha2'      => 'JO',
                'iso_alpha3'      => 'JOR',
                'iso_numeric'     => 400,
                'currency_code'   => 'JOD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Kazakhstan',
                'iso_alpha2'      => 'KZ',
                'iso_alpha3'      => 'KAZ',
                'iso_numeric'     => 398,
                'currency_code'   => 'KZT',
                'currency_name'   => 'Tenge',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Kenya',
                'iso_alpha2'      => 'KE',
                'iso_alpha3'      => 'KEN',
                'iso_numeric'     => 404,
                'currency_code'   => 'KES',
                'currency_name'   => 'Shilling',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Kiribati',
                'iso_alpha2'      => 'KI',
                'iso_alpha3'      => 'KIR',
                'iso_numeric'     => 296,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Kuwait',
                'iso_alpha2'      => 'KW',
                'iso_alpha3'      => 'KWT',
                'iso_numeric'     => 414,
                'currency_code'   => 'KWD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Kyrgyzstan',
                'iso_alpha2'      => 'KG',
                'iso_alpha3'      => 'KGZ',
                'iso_numeric'     => 417,
                'currency_code'   => 'KGS',
                'currency_name'   => 'Som',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Laos',
                'iso_alpha2'      => 'LA',
                'iso_alpha3'      => 'LAO',
                'iso_numeric'     => 418,
                'currency_code'   => 'LAK',
                'currency_name'   => 'Kip',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Latvia',
                'iso_alpha2'      => 'LV',
                'iso_alpha3'      => 'LVA',
                'iso_numeric'     => 428,
                'currency_code'   => 'LVL',
                'currency_name'   => 'Lat',
                'currency_symbol' => 'Ls',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Lebanon',
                'iso_alpha2'      => 'LB',
                'iso_alpha3'      => 'LBN',
                'iso_numeric'     => 422,
                'currency_code'   => 'LBP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Lesotho',
                'iso_alpha2'      => 'LS',
                'iso_alpha3'      => 'LSO',
                'iso_numeric'     => 426,
                'currency_code'   => 'LSL',
                'currency_name'   => 'Loti',
                'currency_symbol' => 'L',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Liberia',
                'iso_alpha2'      => 'LR',
                'iso_alpha3'      => 'LBR',
                'iso_numeric'     => 430,
                'currency_code'   => 'LRD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Libya',
                'iso_alpha2'      => 'LY',
                'iso_alpha3'      => 'LBY',
                'iso_numeric'     => 434,
                'currency_code'   => 'LYD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Liechtenstein',
                'iso_alpha2'      => 'LI',
                'iso_alpha3'      => 'LIE',
                'iso_numeric'     => 438,
                'currency_code'   => 'CHF',
                'currency_name'   => 'Franc',
                'currency_symbol' => 'CHF',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Lithuania',
                'iso_alpha2'      => 'LT',
                'iso_alpha3'      => 'LTU',
                'iso_numeric'     => 440,
                'currency_code'   => 'LTL',
                'currency_name'   => 'Litas',
                'currency_symbol' => 'Lt',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Luxembourg',
                'iso_alpha2'      => 'LU',
                'iso_alpha3'      => 'LUX',
                'iso_numeric'     => 442,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Macao',
                'iso_alpha2'      => 'MO',
                'iso_alpha3'      => 'MAC',
                'iso_numeric'     => 446,
                'currency_code'   => 'MOP',
                'currency_name'   => 'Pataca',
                'currency_symbol' => 'MOP',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Macedonia',
                'iso_alpha2'      => 'MK',
                'iso_alpha3'      => 'MKD',
                'iso_numeric'     => 807,
                'currency_code'   => 'MKD',
                'currency_name'   => 'Denar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Madagascar',
                'iso_alpha2'      => 'MG',
                'iso_alpha3'      => 'MDG',
                'iso_numeric'     => 450,
                'currency_code'   => 'MGA',
                'currency_name'   => 'Ariary',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Malawi',
                'iso_alpha2'      => 'MW',
                'iso_alpha3'      => 'MWI',
                'iso_numeric'     => 454,
                'currency_code'   => 'MWK',
                'currency_name'   => 'Kwacha',
                'currency_symbol' => 'MK',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Malaysia',
                'iso_alpha2'      => 'MY',
                'iso_alpha3'      => 'MYS',
                'iso_numeric'     => 458,
                'currency_code'   => 'MYR',
                'currency_name'   => 'Ringgit',
                'currency_symbol' => 'RM',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Maldives',
                'iso_alpha2'      => 'MV',
                'iso_alpha3'      => 'MDV',
                'iso_numeric'     => 462,
                'currency_code'   => 'MVR',
                'currency_name'   => 'Rufiyaa',
                'currency_symbol' => 'Rf',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Mali',
                'iso_alpha2'      => 'ML',
                'iso_alpha3'      => 'MLI',
                'iso_numeric'     => 466,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Malta',
                'iso_alpha2'      => 'MT',
                'iso_alpha3'      => 'MLT',
                'iso_numeric'     => 470,
                'currency_code'   => 'MTL',
                'currency_name'   => 'Lira',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Marshall Islands',
                'iso_alpha2'      => 'MH',
                'iso_alpha3'      => 'MHL',
                'iso_numeric'     => 584,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Martinique',
                'iso_alpha2'      => 'MQ',
                'iso_alpha3'      => 'MTQ',
                'iso_numeric'     => 474,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Mauritania',
                'iso_alpha2'      => 'MR',
                'iso_alpha3'      => 'MRT',
                'iso_numeric'     => 478,
                'currency_code'   => 'MRO',
                'currency_name'   => 'Ouguiya',
                'currency_symbol' => 'UM',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Mauritius',
                'iso_alpha2'      => 'MU',
                'iso_alpha3'      => 'MUS',
                'iso_numeric'     => 480,
                'currency_code'   => 'MUR',
                'currency_name'   => 'Rupee',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Mayotte',
                'iso_alpha2'      => 'YT',
                'iso_alpha3'      => 'MYT',
                'iso_numeric'     => 175,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Mexico',
                'iso_alpha2'      => 'MX',
                'iso_alpha3'      => 'MEX',
                'iso_numeric'     => 484,
                'currency_code'   => 'MXN',
                'currency_name'   => 'Peso',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Micronesia',
                'iso_alpha2'      => 'FM',
                'iso_alpha3'      => 'FSM',
                'iso_numeric'     => 583,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Moldova',
                'iso_alpha2'      => 'MD',
                'iso_alpha3'      => 'MDA',
                'iso_numeric'     => 498,
                'currency_code'   => 'MDL',
                'currency_name'   => 'Leu',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Monaco',
                'iso_alpha2'      => 'MC',
                'iso_alpha3'      => 'MCO',
                'iso_numeric'     => 492,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Mongolia',
                'iso_alpha2'      => 'MN',
                'iso_alpha3'      => 'MNG',
                'iso_numeric'     => 496,
                'currency_code'   => 'MNT',
                'currency_name'   => 'Tugrik',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Montserrat',
                'iso_alpha2'      => 'MS',
                'iso_alpha3'      => 'MSR',
                'iso_numeric'     => 500,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Morocco',
                'iso_alpha2'      => 'MA',
                'iso_alpha3'      => 'MAR',
                'iso_numeric'     => 504,
                'currency_code'   => 'MAD',
                'currency_name'   => 'Dirham',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Mozambique',
                'iso_alpha2'      => 'MZ',
                'iso_alpha3'      => 'MOZ',
                'iso_numeric'     => 508,
                'currency_code'   => 'MZN',
                'currency_name'   => 'Meticail',
                'currency_symbol' => 'MT',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Myanmar',
                'iso_alpha2'      => 'MM',
                'iso_alpha3'      => 'MMR',
                'iso_numeric'     => 104,
                'currency_code'   => 'MMK',
                'currency_name'   => 'Kyat',
                'currency_symbol' => 'K',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Namibia',
                'iso_alpha2'      => 'NA',
                'iso_alpha3'      => 'NAM',
                'iso_numeric'     => 516,
                'currency_code'   => 'NAD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Nauru',
                'iso_alpha2'      => 'NR',
                'iso_alpha3'      => 'NRU',
                'iso_numeric'     => 520,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Nepal',
                'iso_alpha2'      => 'NP',
                'iso_alpha3'      => 'NPL',
                'iso_numeric'     => 524,
                'currency_code'   => 'NPR',
                'currency_name'   => 'Rupee',
                'currency_symbol' => 'RS',
                'is_supported'    => 1
            ],
            [
                'name'            => 'Netherlands',
                'iso_alpha2'      => 'NL',
                'iso_alpha3'      => 'NLD',
                'iso_numeric'     => 528,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Netherlands Antilles',
                'iso_alpha2'      => 'AN',
                'iso_alpha3'      => 'ANT',
                'iso_numeric'     => 530,
                'currency_code'   => 'ANG',
                'currency_name'   => 'Guilder',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'New Caledonia',
                'iso_alpha2'      => 'NC',
                'iso_alpha3'      => 'NCL',
                'iso_numeric'     => 540,
                'currency_code'   => 'XPF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'New Zealand',
                'iso_alpha2'      => 'NZ',
                'iso_alpha3'      => 'NZL',
                'iso_numeric'     => 554,
                'currency_code'   => 'NZD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Nicaragua',
                'iso_alpha2'      => 'NI',
                'iso_alpha3'      => 'NIC',
                'iso_numeric'     => 558,
                'currency_code'   => 'NIO',
                'currency_name'   => 'Cordoba',
                'currency_symbol' => 'C$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Niger',
                'iso_alpha2'      => 'NE',
                'iso_alpha3'      => 'NER',
                'iso_numeric'     => 562,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Nigeria',
                'iso_alpha2'      => 'NG',
                'iso_alpha3'      => 'NGA',
                'iso_numeric'     => 566,
                'currency_code'   => 'NGN',
                'currency_name'   => 'Naira',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Niue',
                'iso_alpha2'      => 'NU',
                'iso_alpha3'      => 'NIU',
                'iso_numeric'     => 570,
                'currency_code'   => 'NZD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Norfolk Island',
                'iso_alpha2'      => 'NF',
                'iso_alpha3'      => 'NFK',
                'iso_numeric'     => 574,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'North Korea',
                'iso_alpha2'      => 'KP',
                'iso_alpha3'      => 'PRK',
                'iso_numeric'     => 408,
                'currency_code'   => 'KPW',
                'currency_name'   => 'Won',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Northern Mariana Islands',
                'iso_alpha2'      => 'MP',
                'iso_alpha3'      => 'MNP',
                'iso_numeric'     => 580,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Norway',
                'iso_alpha2'      => 'NO',
                'iso_alpha3'      => 'NOR',
                'iso_numeric'     => 578,
                'currency_code'   => 'NOK',
                'currency_name'   => 'Krone',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Oman',
                'iso_alpha2'      => 'OM',
                'iso_alpha3'      => 'OMN',
                'iso_numeric'     => 512,
                'currency_code'   => 'OMR',
                'currency_name'   => 'Rial',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Pakistan',
                'iso_alpha2'      => 'PK',
                'iso_alpha3'      => 'PAK',
                'iso_numeric'     => 586,
                'currency_code'   => 'PKR',
                'currency_name'   => 'Rupee',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Palau',
                'iso_alpha2'      => 'PW',
                'iso_alpha3'      => 'PLW',
                'iso_numeric'     => 585,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Palestinian Territory',
                'iso_alpha2'      => 'PS',
                'iso_alpha3'      => 'PSE',
                'iso_numeric'     => 275,
                'currency_code'   => 'ILS',
                'currency_name'   => 'Shekel',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Panama',
                'iso_alpha2'      => 'PA',
                'iso_alpha3'      => 'PAN',
                'iso_numeric'     => 591,
                'currency_code'   => 'PAB',
                'currency_name'   => 'Balboa',
                'currency_symbol' => 'B/.',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Papua New Guinea',
                'iso_alpha2'      => 'PG',
                'iso_alpha3'      => 'PNG',
                'iso_numeric'     => 598,
                'currency_code'   => 'PGK',
                'currency_name'   => 'Kina',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Paraguay',
                'iso_alpha2'      => 'PY',
                'iso_alpha3'      => 'PRY',
                'iso_numeric'     => 600,
                'currency_code'   => 'PYG',
                'currency_name'   => 'Guarani',
                'currency_symbol' => 'Gs',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Peru',
                'iso_alpha2'      => 'PE',
                'iso_alpha3'      => 'PER',
                'iso_numeric'     => 604,
                'currency_code'   => 'PEN',
                'currency_name'   => 'Sol',
                'currency_symbol' => 'S/.',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Philippines',
                'iso_alpha2'      => 'PH',
                'iso_alpha3'      => 'PHL',
                'iso_numeric'     => 608,
                'currency_code'   => 'PHP',
                'currency_name'   => 'Peso',
                'currency_symbol' => 'Php',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Pitcairn',
                'iso_alpha2'      => 'PN',
                'iso_alpha3'      => 'PCN',
                'iso_numeric'     => 612,
                'currency_code'   => 'NZD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Poland',
                'iso_alpha2'      => 'PL',
                'iso_alpha3'      => 'POL',
                'iso_numeric'     => 616,
                'currency_code'   => 'PLN',
                'currency_name'   => 'Zloty',
                'currency_symbol' => 'zl',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Portugal',
                'iso_alpha2'      => 'PT',
                'iso_alpha3'      => 'PRT',
                'iso_numeric'     => 620,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Puerto Rico',
                'iso_alpha2'      => 'PR',
                'iso_alpha3'      => 'PRI',
                'iso_numeric'     => 630,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Qatar',
                'iso_alpha2'      => 'QA',
                'iso_alpha3'      => 'QAT',
                'iso_numeric'     => 634,
                'currency_code'   => 'QAR',
                'currency_name'   => 'Rial',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Republic of the Congo',
                'iso_alpha2'      => 'CG',
                'iso_alpha3'      => 'COG',
                'iso_numeric'     => 178,
                'currency_code'   => 'XAF',
                'currency_name'   => 'Franc',
                'currency_symbol' => 'FCF',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Reunion',
                'iso_alpha2'      => 'RE',
                'iso_alpha3'      => 'REU',
                'iso_numeric'     => 638,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Romania',
                'iso_alpha2'      => 'RO',
                'iso_alpha3'      => 'ROU',
                'iso_numeric'     => 642,
                'currency_code'   => 'RON',
                'currency_name'   => 'Leu',
                'currency_symbol' => 'lei',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Russia',
                'iso_alpha2'      => 'RU',
                'iso_alpha3'      => 'RUS',
                'iso_numeric'     => 643,
                'currency_code'   => 'RUB',
                'currency_name'   => 'Ruble',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Rwanda',
                'iso_alpha2'      => 'RW',
                'iso_alpha3'      => 'RWA',
                'iso_numeric'     => 646,
                'currency_code'   => 'RWF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Saint Helena',
                'iso_alpha2'      => 'SH',
                'iso_alpha3'      => 'SHN',
                'iso_numeric'     => 654,
                'currency_code'   => 'SHP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Saint Kitts and Nevis',
                'iso_alpha2'      => 'KN',
                'iso_alpha3'      => 'KNA',
                'iso_numeric'     => 659,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Saint Lucia',
                'iso_alpha2'      => 'LC',
                'iso_alpha3'      => 'LCA',
                'iso_numeric'     => 662,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Saint Pierre and Miquelon',
                'iso_alpha2'      => 'PM',
                'iso_alpha3'      => 'SPM',
                'iso_numeric'     => 666,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Saint Vincent and the Grenadines',
                'iso_alpha2'      => 'VC',
                'iso_alpha3'      => 'VCT',
                'iso_numeric'     => 670,
                'currency_code'   => 'XCD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Samoa',
                'iso_alpha2'      => 'WS',
                'iso_alpha3'      => 'WSM',
                'iso_numeric'     => 882,
                'currency_code'   => 'WST',
                'currency_name'   => 'Tala',
                'currency_symbol' => 'WS$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'San Marino',
                'iso_alpha2'      => 'SM',
                'iso_alpha3'      => 'SMR',
                'iso_numeric'     => 674,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Sao Tome and Principe',
                'iso_alpha2'      => 'ST',
                'iso_alpha3'      => 'STP',
                'iso_numeric'     => 678,
                'currency_code'   => 'STD',
                'currency_name'   => 'Dobra',
                'currency_symbol' => 'Db',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Saudi Arabia',
                'iso_alpha2'      => 'SA',
                'iso_alpha3'      => 'SAU',
                'iso_numeric'     => 682,
                'currency_code'   => 'SAR',
                'currency_name'   => 'Rial',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Senegal',
                'iso_alpha2'      => 'SN',
                'iso_alpha3'      => 'SEN',
                'iso_numeric'     => 686,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Serbia and Montenegro',
                'iso_alpha2'      => 'CS',
                'iso_alpha3'      => 'SCG',
                'iso_numeric'     => 891,
                'currency_code'   => 'RSD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Seychelles',
                'iso_alpha2'      => 'SC',
                'iso_alpha3'      => 'SYC',
                'iso_numeric'     => 690,
                'currency_code'   => 'SCR',
                'currency_name'   => 'Rupee',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Sierra Leone',
                'iso_alpha2'      => 'SL',
                'iso_alpha3'      => 'SLE',
                'iso_numeric'     => 694,
                'currency_code'   => 'SLL',
                'currency_name'   => 'Leone',
                'currency_symbol' => 'Le',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Singapore',
                'iso_alpha2'      => 'SG',
                'iso_alpha3'      => 'SGP',
                'iso_numeric'     => 702,
                'currency_code'   => 'SGD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 1
            ],
            [
                'name'            => 'Slovakia',
                'iso_alpha2'      => 'SK',
                'iso_alpha3'      => 'SVK',
                'iso_numeric'     => 703,
                'currency_code'   => 'SKK',
                'currency_name'   => 'Koruna',
                'currency_symbol' => 'Sk',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Slovenia',
                'iso_alpha2'      => 'SI',
                'iso_alpha3'      => 'SVN',
                'iso_numeric'     => 705,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Solomon Islands',
                'iso_alpha2'      => 'SB',
                'iso_alpha3'      => 'SLB',
                'iso_numeric'     => 90,
                'currency_code'   => 'SBD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Somalia',
                'iso_alpha2'      => 'SO',
                'iso_alpha3'      => 'SOM',
                'iso_numeric'     => 706,
                'currency_code'   => 'SOS',
                'currency_name'   => 'Shilling',
                'currency_symbol' => 'S',
                'is_supported'    => 0
            ],
            [
                'name'            => 'South Africa',
                'iso_alpha2'      => 'ZA',
                'iso_alpha3'      => 'ZAF',
                'iso_numeric'     => 710,
                'currency_code'   => 'ZAR',
                'currency_name'   => 'Rand',
                'currency_symbol' => 'R',
                'is_supported'    => 0
            ],
            [
                'name'            => 'South Georgia and the South Sandwich Islands',
                'iso_alpha2'      => 'GS',
                'iso_alpha3'      => 'SGS',
                'iso_numeric'     => 239,
                'currency_code'   => 'GBP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'South Korea',
                'iso_alpha2'      => 'KR',
                'iso_alpha3'      => 'KOR',
                'iso_numeric'     => 410,
                'currency_code'   => 'KRW',
                'currency_name'   => 'Won',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Spain',
                'iso_alpha2'      => 'ES',
                'iso_alpha3'      => 'ESP',
                'iso_numeric'     => 724,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Sri Lanka',
                'iso_alpha2'      => 'LK',
                'iso_alpha3'      => 'LKA',
                'iso_numeric'     => 144,
                'currency_code'   => 'LKR',
                'currency_name'   => 'Rupee',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Sudan',
                'iso_alpha2'      => 'SD',
                'iso_alpha3'      => 'SDN',
                'iso_numeric'     => 736,
                'currency_code'   => 'SDD',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Suriname',
                'iso_alpha2'      => 'SR',
                'iso_alpha3'      => 'SUR',
                'iso_numeric'     => 740,
                'currency_code'   => 'SRD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Svalbard and Jan Mayen',
                'iso_alpha2'      => 'SJ',
                'iso_alpha3'      => 'SJM',
                'iso_numeric'     => 744,
                'currency_code'   => 'NOK',
                'currency_name'   => 'Krone',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Swaziland',
                'iso_alpha2'      => 'SZ',
                'iso_alpha3'      => 'SWZ',
                'iso_numeric'     => 748,
                'currency_code'   => 'SZL',
                'currency_name'   => 'Lilangeni',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Sweden',
                'iso_alpha2'      => 'SE',
                'iso_alpha3'      => 'SWE',
                'iso_numeric'     => 752,
                'currency_code'   => 'SEK',
                'currency_name'   => 'Krona',
                'currency_symbol' => 'kr',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Switzerland',
                'iso_alpha2'      => 'CH',
                'iso_alpha3'      => 'CHE',
                'iso_numeric'     => 756,
                'currency_code'   => 'CHF',
                'currency_name'   => 'Franc',
                'currency_symbol' => 'CHF',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Syria',
                'iso_alpha2'      => 'SY',
                'iso_alpha3'      => 'SYR',
                'iso_numeric'     => 760,
                'currency_code'   => 'SYP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Taiwan',
                'iso_alpha2'      => 'TW',
                'iso_alpha3'      => 'TWN',
                'iso_numeric'     => 158,
                'currency_code'   => 'TWD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => 'NT$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Tajikistan',
                'iso_alpha2'      => 'TJ',
                'iso_alpha3'      => 'TJK',
                'iso_numeric'     => 762,
                'currency_code'   => 'TJS',
                'currency_name'   => 'Somoni',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Tanzania',
                'iso_alpha2'      => 'TZ',
                'iso_alpha3'      => 'TZA',
                'iso_numeric'     => 834,
                'currency_code'   => 'TZS',
                'currency_name'   => 'Shilling',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Thailand',
                'iso_alpha2'      => 'TH',
                'iso_alpha3'      => 'THA',
                'iso_numeric'     => 764,
                'currency_code'   => 'THB',
                'currency_name'   => 'Baht',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Togo',
                'iso_alpha2'      => 'TG',
                'iso_alpha3'      => 'TGO',
                'iso_numeric'     => 768,
                'currency_code'   => 'XOF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Tokelau',
                'iso_alpha2'      => 'TK',
                'iso_alpha3'      => 'TKL',
                'iso_numeric'     => 772,
                'currency_code'   => 'NZD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Tonga',
                'iso_alpha2'      => 'TO',
                'iso_alpha3'      => 'TON',
                'iso_numeric'     => 776,
                'currency_code'   => 'TOP',
                'currency_name'   => 'Pa\'anga',
                'currency_symbol' => 'T$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Trinidad and Tobago',
                'iso_alpha2'      => 'TT',
                'iso_alpha3'      => 'TTO',
                'iso_numeric'     => 780,
                'currency_code'   => 'TTD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => 'TT$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Tunisia',
                'iso_alpha2'      => 'TN',
                'iso_alpha3'      => 'TUN',
                'iso_numeric'     => 788,
                'currency_code'   => 'TND',
                'currency_name'   => 'Dinar',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Turkey',
                'iso_alpha2'      => 'TR',
                'iso_alpha3'      => 'TUR',
                'iso_numeric'     => 792,
                'currency_code'   => 'TRY',
                'currency_name'   => 'Lira',
                'currency_symbol' => 'YTL',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Turkmenistan',
                'iso_alpha2'      => 'TM',
                'iso_alpha3'      => 'TKM',
                'iso_numeric'     => 795,
                'currency_code'   => 'TMM',
                'currency_name'   => 'Manat',
                'currency_symbol' => 'm',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Turks and Caicos Islands',
                'iso_alpha2'      => 'TC',
                'iso_alpha3'      => 'TCA',
                'iso_numeric'     => 796,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Tuvalu',
                'iso_alpha2'      => 'TV',
                'iso_alpha3'      => 'TUV',
                'iso_numeric'     => 798,
                'currency_code'   => 'AUD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'U.S. Virgin Islands',
                'iso_alpha2'      => 'VI',
                'iso_alpha3'      => 'VIR',
                'iso_numeric'     => 850,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Uganda',
                'iso_alpha2'      => 'UG',
                'iso_alpha3'      => 'UGA',
                'iso_numeric'     => 800,
                'currency_code'   => 'UGX',
                'currency_name'   => 'Shilling',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Ukraine',
                'iso_alpha2'      => 'UA',
                'iso_alpha3'      => 'UKR',
                'iso_numeric'     => 804,
                'currency_code'   => 'UAH',
                'currency_name'   => 'Hryvnia',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'United Arab Emirates',
                'iso_alpha2'      => 'AE',
                'iso_alpha3'      => 'ARE',
                'iso_numeric'     => 784,
                'currency_code'   => 'AED',
                'currency_name'   => 'Dirham',
                'currency_symbol' => null,
                'is_supported'    => 1
            ],
            [
                'name'            => 'United Kingdom',
                'iso_alpha2'      => 'GB',
                'iso_alpha3'      => 'GBR',
                'iso_numeric'     => 826,
                'currency_code'   => 'GBP',
                'currency_name'   => 'Pound',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'United States',
                'iso_alpha2'      => 'US',
                'iso_alpha3'      => 'USA',
                'iso_numeric'     => 840,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => '$',
                'is_supported'    => 1
            ],
            [
                'name'            => 'United States Minor Outlying Islands',
                'iso_alpha2'      => 'UM',
                'iso_alpha3'      => 'UMI',
                'iso_numeric'     => 581,
                'currency_code'   => 'USD',
                'currency_name'   => 'Dollar ',
                'currency_symbol' => '$',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Uruguay',
                'iso_alpha2'      => 'UY',
                'iso_alpha3'      => 'URY',
                'iso_numeric'     => 858,
                'currency_code'   => 'UYU',
                'currency_name'   => 'Peso',
                'currency_symbol' => '$U',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Uzbekistan',
                'iso_alpha2'      => 'UZ',
                'iso_alpha3'      => 'UZB',
                'iso_numeric'     => 860,
                'currency_code'   => 'UZS',
                'currency_name'   => 'Som',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Vanuatu',
                'iso_alpha2'      => 'VU',
                'iso_alpha3'      => 'VUT',
                'iso_numeric'     => 548,
                'currency_code'   => 'VUV',
                'currency_name'   => 'Vatu',
                'currency_symbol' => 'Vt',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Vatican',
                'iso_alpha2'      => 'VA',
                'iso_alpha3'      => 'VAT',
                'iso_numeric'     => 336,
                'currency_code'   => 'EUR',
                'currency_name'   => 'Euro',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Venezuela',
                'iso_alpha2'      => 'VE',
                'iso_alpha3'      => 'VEN',
                'iso_numeric'     => 862,
                'currency_code'   => 'VEF',
                'currency_name'   => 'Bolivar',
                'currency_symbol' => 'Bs',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Vietnam',
                'iso_alpha2'      => 'VN',
                'iso_alpha3'      => 'VNM',
                'iso_numeric'     => 704,
                'currency_code'   => 'VND',
                'currency_name'   => 'Dong',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Wallis and Futuna',
                'iso_alpha2'      => 'WF',
                'iso_alpha3'      => 'WLF',
                'iso_numeric'     => 876,
                'currency_code'   => 'XPF',
                'currency_name'   => 'Franc',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Western Sahara',
                'iso_alpha2'      => 'EH',
                'iso_alpha3'      => 'ESH',
                'iso_numeric'     => 732,
                'currency_code'   => 'MAD',
                'currency_name'   => 'Dirham',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Yemen',
                'iso_alpha2'      => 'YE',
                'iso_alpha3'      => 'YEM',
                'iso_numeric'     => 887,
                'currency_code'   => 'YER',
                'currency_name'   => 'Rial',
                'currency_symbol' => null,
                'is_supported'    => 0
            ],
            [
                'name'            => 'Zambia',
                'iso_alpha2'      => 'ZM',
                'iso_alpha3'      => 'ZMB',
                'iso_numeric'     => 894,
                'currency_code'   => 'ZMK',
                'currency_name'   => 'Kwacha',
                'currency_symbol' => 'ZK',
                'is_supported'    => 0
            ],
            [
                'name'            => 'Zimbabwe',
                'iso_alpha2'      => 'ZW',
                'iso_alpha3'      => 'ZWE',
                'iso_numeric'     => 716,
                'currency_code'   => 'ZWD',
                'currency_name'   => 'Dollar',
                'currency_symbol' => 'Z$',
                'is_supported'    => 0
            ],
        ];

        DB::table('countries')->truncate();
        DB::table('countries')->insert($countries);
    }
}
