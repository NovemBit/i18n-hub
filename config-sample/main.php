<?php

use NovemBit\i18n\Module;
use NovemBit\i18n\component\languages\Languages;
use NovemBit\i18n\component\request\Request;
use NovemBit\i18n\component\rest\Rest;
use NovemBit\i18n\component\translation\method\Dummy;
use NovemBit\i18n\component\translation\method\Google;
use NovemBit\i18n\component\translation\Translation;
use NovemBit\i18n\component\translation\type\HTML;
use NovemBit\i18n\component\translation\type\JSON;
use NovemBit\i18n\component\translation\type\Text;
use NovemBit\i18n\component\translation\type\URL;
use NovemBit\i18n\system\component\DB;
use NovemBit\i18n\system\parsers\html\Rule;

return [

    'class' => Module::class,

    'translation' => [
        'class' => Translation::class,
        'method' => [
            /*'class' => NovemBit\i18n\component\translation\method\RestMethod::class,
            'remote_host'=>'i18n.adcleandns.com',
            'api_key' => 'demo_key_123',
            'exclusions' => ['barev', 'barev duxov', "hayer", 'Hello'],
            'validation' => true,
            'save_translations' => true*/

            'class' => Google::class,
            'api_key' => 'YOUR_GOOGLE_TRANSLATE_API_KEY',
            'exclusions' => [],
            'validation' => true,
            'save_translations' => true,

            /*
            'class' => Dummy::class,
            'exclusions' => ['barev', 'barev duxov', "hayer", 'Hello'],
            'validation' => true,
            'save_translations' => true*/
        ],
        'text' => [
            'class' => Text::class,
            'save_translations' => true,
            /*'exclusions' => [ "Hello"],*/
        ],
        'url' => [
            'class' => URL::class,
            'url_validation_rules' => [
                'host' => [
                    '^$|^swanson\.co\.uk$|^swanson\.fr$',
                ]
            ]
        ],
        'html' => [
            'class' => HTML::class,
            'save_translations' => false,
        ],
        'json' => [
            'class' => JSON::class,
            'save_translations' => false
        ]
    ],
    'languages' => [
        'class' => Languages::class,
        'accept_languages' => [
            'ab','aa','af','ak','sq','am','ar','an','hy','as',
            'av','ae','ay','az','bm','ba','eu','be','bn','bh',
            'bi','bs','br','bg','my','ca','km','ch','ce','ny',
            'zh','cu','cv','kw','co','cr','hr','cs','da','dv',
            'nl','dz','en','eo','et','ee','fo','fj','fi','fr',
            'ff','gd','gl','lg','ka','de','ki','el','kl','gn',
            'gu','ht','ha','he','hz','hi','ho','hu','is','io',
            'ig','id','ia','ie','iu','ik','ga','it','ja','jv',
            'kn','kr','ks','kk','rw','kv','kg','ko','kj','ku',
            'ky','lo','la','lv','lb','li','ln','lt','lu','mk',
            'mg','ms','ml','mt','gv','mi','mr','mh','ro','mn',
            'na','nv','nd','ng','ne','se','no','nb','nn','ii',
            'oc','oj','or','om','os','pi','pa','ps','fa','pl',
            'pt','qu','rm','rn','ru','sm','sg','sa','sc','sr',
            'sn','sd','si','sk','sl','so','st','nr','es','su',
            'sw','ss','sv','tl','ty','tg','ta','tt','te','th',
            'bo','ti','to','ts','tn','tr','tk','tw','ug','uk',
            'ur','uz','ve','vi','vo','wa','cy','fy','wo','xh',
            'yi','yo','za','zu',
        ],
        'from_language' => 'en',
    ],
    'request' => [
        'class' => Request::class
    ],
    'rest' => require('rest.php'),
    'db' => require('db.php')
];