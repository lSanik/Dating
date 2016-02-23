<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        $countries = array(
            array('code' => 'US', 'name' => 'United States', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CA', 'name' => 'Canada', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AF', 'name' => 'Afghanistan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AL', 'name' => 'Albania', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'DZ', 'name' => 'Algeria', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AS', 'name' => 'American Samoa', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AD', 'name' => 'Andorra', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AO', 'name' => 'Angola', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AI', 'name' => 'Anguilla', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AQ', 'name' => 'Antarctica', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AG', 'name' => 'Antigua and/or Barbuda', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AR', 'name' => 'Argentina', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AM', 'name' => 'Armenia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AW', 'name' => 'Aruba', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AU', 'name' => 'Australia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AT', 'name' => 'Austria', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AZ', 'name' => 'Azerbaijan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BS', 'name' => 'Bahamas', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BH', 'name' => 'Bahrain', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BD', 'name' => 'Bangladesh', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BB', 'name' => 'Barbados', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BY', 'name' => 'Belarus', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BE', 'name' => 'Belgium', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BZ', 'name' => 'Belize', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BJ', 'name' => 'Benin', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BM', 'name' => 'Bermuda', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BT', 'name' => 'Bhutan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BO', 'name' => 'Bolivia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BA', 'name' => 'Bosnia and Herzegovina', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BW', 'name' => 'Botswana', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BV', 'name' => 'Bouvet Island', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BR', 'name' => 'Brazil', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IO', 'name' => 'British lndian Ocean Territory', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BN', 'name' => 'Brunei Darussalam', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BG', 'name' => 'Bulgaria', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BF', 'name' => 'Burkina Faso', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'BI', 'name' => 'Burundi', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KH', 'name' => 'Cambodia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CM', 'name' => 'Cameroon', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CV', 'name' => 'Cape Verde', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KY', 'name' => 'Cayman Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CF', 'name' => 'Central African Republic', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TD', 'name' => 'Chad', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CL', 'name' => 'Chile', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CN', 'name' => 'China', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CX', 'name' => 'Christmas Island', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CC', 'name' => 'Cocos (Keeling) Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CO', 'name' => 'Colombia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KM', 'name' => 'Comoros', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CG', 'name' => 'Congo', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CK', 'name' => 'Cook Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CR', 'name' => 'Costa Rica', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'HR', 'name' => 'Croatia (Hrvatska)', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CU', 'name' => 'Cuba', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CY', 'name' => 'Cyprus', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CZ', 'name' => 'Czech Republic', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'DK', 'name' => 'Denmark', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'DJ', 'name' => 'Djibouti', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'DM', 'name' => 'Dominica', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'DO', 'name' => 'Dominican Republic', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TP', 'name' => 'East Timor', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'EC', 'name' => 'Ecudaor', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'EG', 'name' => 'Egypt', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SV', 'name' => 'El Salvador', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GQ', 'name' => 'Equatorial Guinea', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ER', 'name' => 'Eritrea', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'EE', 'name' => 'Estonia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ET', 'name' => 'Ethiopia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'FK', 'name' => 'Falkland Islands (Malvinas)', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'FO', 'name' => 'Faroe Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'FJ', 'name' => 'Fiji', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'FI', 'name' => 'Finland', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'FR', 'name' => 'France', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'FX', 'name' => 'France, Metropolitan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GF', 'name' => 'French Guiana', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PF', 'name' => 'French Polynesia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TF', 'name' => 'French Southern Territories', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GA', 'name' => 'Gabon', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GM', 'name' => 'Gambia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GE', 'name' => 'Georgia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'DE', 'name' => 'Germany', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GH', 'name' => 'Ghana', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GI', 'name' => 'Gibraltar', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GR', 'name' => 'Greece', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GL', 'name' => 'Greenland', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GD', 'name' => 'Grenada', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GP', 'name' => 'Guadeloupe', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GU', 'name' => 'Guam', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GT', 'name' => 'Guatemala', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GN', 'name' => 'Guinea', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GW', 'name' => 'Guinea-Bissau', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GY', 'name' => 'Guyana', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'HT', 'name' => 'Haiti', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'HM', 'name' => 'Heard and Mc Donald Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'HN', 'name' => 'Honduras', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'HK', 'name' => 'Hong Kong', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'HU', 'name' => 'Hungary', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IS', 'name' => 'Iceland', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IN', 'name' => 'India', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ID', 'name' => 'Indonesia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IR', 'name' => 'Iran (Islamic Republic of)', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IQ', 'name' => 'Iraq', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IE', 'name' => 'Ireland', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IL', 'name' => 'Israel', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'IT', 'name' => 'Italy', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CI', 'name' => 'Ivory Coast', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'JM', 'name' => 'Jamaica', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'JP', 'name' => 'Japan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'JO', 'name' => 'Jordan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KZ', 'name' => 'Kazakhstan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KE', 'name' => 'Kenya', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KI', 'name' => 'Kiribati', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KP', 'name' => 'Korea, Democratic People\'s Republic of', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KR', 'name' => 'Korea, Republic of', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KW', 'name' => 'Kuwait', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KG', 'name' => 'Kyrgyzstan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LA', 'name' => 'Lao People\'s Democratic Republic', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LV', 'name' => 'Latvia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LB', 'name' => 'Lebanon', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LS', 'name' => 'Lesotho', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LR', 'name' => 'Liberia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LY', 'name' => 'Libyan Arab Jamahiriya', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LI', 'name' => 'Liechtenstein', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LT', 'name' => 'Lithuania', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LU', 'name' => 'Luxembourg', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MO', 'name' => 'Macau', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MK', 'name' => 'Macedonia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MG', 'name' => 'Madagascar', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MW', 'name' => 'Malawi', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MY', 'name' => 'Malaysia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MV', 'name' => 'Maldives', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ML', 'name' => 'Mali', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MT', 'name' => 'Malta', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MH', 'name' => 'Marshall Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MQ', 'name' => 'Martinique', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MR', 'name' => 'Mauritania', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MU', 'name' => 'Mauritius', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TY', 'name' => 'Mayotte', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MX', 'name' => 'Mexico', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'FM', 'name' => 'Micronesia, Federated States of', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MD', 'name' => 'Moldova, Republic of', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MC', 'name' => 'Monaco', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MN', 'name' => 'Mongolia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MS', 'name' => 'Montserrat', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MA', 'name' => 'Morocco', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MZ', 'name' => 'Mozambique', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MM', 'name' => 'Myanmar', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NA', 'name' => 'Namibia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NR', 'name' => 'Nauru', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NP', 'name' => 'Nepal', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NL', 'name' => 'Netherlands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AN', 'name' => 'Netherlands Antilles', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NC', 'name' => 'New Caledonia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NZ', 'name' => 'New Zealand', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NI', 'name' => 'Nicaragua', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NE', 'name' => 'Niger', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NG', 'name' => 'Nigeria', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NU', 'name' => 'Niue', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NF', 'name' => 'Norfork Island', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'MP', 'name' => 'Northern Mariana Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'NO', 'name' => 'Norway', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'OM', 'name' => 'Oman', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PK', 'name' => 'Pakistan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PW', 'name' => 'Palau', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PA', 'name' => 'Panama', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PG', 'name' => 'Papua New Guinea', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PY', 'name' => 'Paraguay', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PE', 'name' => 'Peru', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PH', 'name' => 'Philippines', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PN', 'name' => 'Pitcairn', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PL', 'name' => 'Poland', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PT', 'name' => 'Portugal', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PR', 'name' => 'Puerto Rico', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'QA', 'name' => 'Qatar', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'RE', 'name' => 'Reunion', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'RO', 'name' => 'Romania', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'RU', 'name' => 'Russian Federation', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'RW', 'name' => 'Rwanda', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'KN', 'name' => 'Saint Kitts and Nevis', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LC', 'name' => 'Saint Lucia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'VC', 'name' => 'Saint Vincent and the Grenadines', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'WS', 'name' => 'Samoa', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SM', 'name' => 'San Marino', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ST', 'name' => 'Sao Tome and Principe', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SA', 'name' => 'Saudi Arabia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SN', 'name' => 'Senegal', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'RS', 'name' => 'Serbia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SC', 'name' => 'Seychelles', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SL', 'name' => 'Sierra Leone', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SG', 'name' => 'Singapore', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SK', 'name' => 'Slovakia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SI', 'name' => 'Slovenia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SB', 'name' => 'Solomon Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SO', 'name' => 'Somalia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ZA', 'name' => 'South Africa', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GS', 'name' => 'South Georgia South Sandwich Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ES', 'name' => 'Spain', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'LK', 'name' => 'Sri Lanka', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SH', 'name' => 'St. Helena', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'PM', 'name' => 'St. Pierre and Miquelon', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SD', 'name' => 'Sudan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SR', 'name' => 'Suriname', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SJ', 'name' => 'Svalbarn and Jan Mayen Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SZ', 'name' => 'Swaziland', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SE', 'name' => 'Sweden', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'CH', 'name' => 'Switzerland', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'SY', 'name' => 'Syrian Arab Republic', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TW', 'name' => 'Taiwan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TJ', 'name' => 'Tajikistan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TZ', 'name' => 'Tanzania, United Republic of', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TH', 'name' => 'Thailand', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TG', 'name' => 'Togo', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TK', 'name' => 'Tokelau', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TO', 'name' => 'Tonga', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TT', 'name' => 'Trinidad and Tobago', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TN', 'name' => 'Tunisia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TR', 'name' => 'Turkey', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TM', 'name' => 'Turkmenistan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TC', 'name' => 'Turks and Caicos Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'TV', 'name' => 'Tuvalu', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'UG', 'name' => 'Uganda', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'UA', 'name' => 'Ukraine', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'AE', 'name' => 'United Arab Emirates', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'GB', 'name' => 'United Kingdom', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'UM', 'name' => 'United States minor outlying islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'UY', 'name' => 'Uruguay', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'UZ', 'name' => 'Uzbekistan', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'VU', 'name' => 'Vanuatu', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'VA', 'name' => 'Vatican City State', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'VE', 'name' => 'Venezuela', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'VN', 'name' => 'Vietnam', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'VG', 'name' => 'Virgin Islands (British)', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'VI', 'name' => 'Virgin Islands (U.S.)', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'WF', 'name' => 'Wallis and Futuna Islands', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'EH', 'name' => 'Western Sahara', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'YE', 'name' => 'Yemen', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'YU', 'name' => 'Yugoslavia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ZR', 'name' => 'Zaire', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ZM', 'name' => 'Zambia', 'created_at' => \Carbon\Carbon::now()),
            array('code' => 'ZW', 'name' => 'Zimbabwe', 'created_at' => \Carbon\Carbon::now()),
        );
        DB::table('countries')->insert($countries);
    }
}
