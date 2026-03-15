<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute lauks jāpieņem. ',
    'active_url'           => ':attribute nav derīgs URL.',
    'after'                => ':attribute jābūt datumam pēc :date.',
    'after_or_equal'       => ':attribute jābūt datumam ne agrāk par :date.',
    'alpha'                => ':attribute var saturēt tikai burtus.',
    'alpha_dash'           => ':attribute var saturēt tikai burtus, ciparus, domuzīmes un pasvītrojumus.',
    'alpha_num'            => ':attribute var saturēt tikai burtus un ciparus.',
    'array'                => ':attribute jābūt masīvam.',
    'before'               => ':attribute jābūt datumam pirms :date.',
    'before_or_equal'      => ':attribute jābūt datumam ne vēlāk par :date.',
    'between'              => [
        'numeric' => ':attribute jābūt starp :min un :max.',
        'file'    => ':attribute jābūt no :min līdz :max kilobaitiem.',
        'string'  => ':attribute jābūt no :min līdz :max simboliem.',
        'array'   => ':attribute jābūt no :min līdz :max vienumiem.',
    ],
    'boolean'              => ':attribute lauks jābūt patiesam vai nepatiesam.',
    'confirmed'            => ':attribute apstiprinājums nesakrīt.',
    'date'                 => ':attribute nav derīgs datums.',
    'date_equals'          => ':attribute jābūt datumam vienādam ar :date.',
    'date_format'          => ':attribute neatbilst formātam :format.',
    'different'            => ':attribute un :other jābūt atšķirīgiem.',
    'digits'               => ':attribute jābūt :digits ciparus.',
    'digits_between'       => ':attribute jābūt starp :min un :max cipariem.',
    'email'                => ':attribute jābūt derīgai e-pasta adresei.',
    'exists'               => 'Atlasītā :attribute nav derīga.',
    'filled'               => ':attribute lauks ir obligāts.',
    'gt'                   => [
        'numeric' => ':attribute jābūt lielākam par :value.',
        'file'    => ':attribute jābūt lielākam par :value kilobaitiem.',
        'string'  => ':attribute jābūt lielākam par :value simboliem.',
        'array'   => ':attribute jābūt vairāk nekā :value vienumiem.',
    ],
    'gte'                  => [
        'numeric' => ':attribute jābūt vismaz :value.',
        'file'    => ':attribute jābūt vismaz :value kilobaitiem.',
        'string'  => ':attribute jābūt vismaz :value simboliem.',
        'array'   => ':attribute jābūt :value vienumiem vai vairāk.',
    ],
    'image'                => ':attribute jābūt attēlam.',
    'in'                   => 'Atlasītā :attribute nav derīga.',
    'integer'              => ':attribute jābūt veselam skaitlim.',
    'ip'                   => ':attribute jābūt derīgai IP adresei.',
    'max'                  => [
        'numeric' => ':attribute nedrīkst būt lielāks par :max.',
        'file'    => ':attribute nedrīkst pārsniegt :max kilobaitus.',
        'string'  => ':attribute nedrīkst pārsniegt :max simbolus.',
        'array'   => ':attribute nedrīkst saturēt vairāk par :max vienumiem.',
    ],
    'mimes'                => ':attribute jābūt failam no tipiem: :values.',
    'min'                  => [
        'numeric' => ':attribute jābūt vismaz :min.',
        'file'    => ':attribute jābūt vismaz :min kilobaitiem.',
        'string'  => ':attribute jābūt vismaz :min simboliem.',
        'array'   => ':attribute jābūt vismaz :min vienumiem.',
    ],
    'not_in'               => 'Atlasītā :attribute nav derīga.',
    'numeric'              => ':attribute jābūt skaitlim.',
    'present'              => ':attribute lauks jābūt klāt.',
    'required'             => ':attribute lauks ir obligāts.',
    'required_if'          => ':attribute lauks ir obligāts, ja :other ir :value.',
    'required_with'        => ':attribute lauks ir obligāts, ja :values ir norādīts.',
    'required_without'     => ':attribute lauks ir obligāts, ja :values nav norādīts.',
    'same'                 => ':attribute un :other jābūt vienādiem.',
    'size'                 => [
        'numeric' => ':attribute jābūt :size.',
        'file'    => ':attribute jābūt :size kilobaitiem.',
        'string'  => ':attribute jābūt :size simboliem.',
        'array'   => ':attribute jābūt :size vienumiem.',
    ],
    'string'               => ':attribute jābūt tekstam.',
    'timezone'             => ':attribute jābūt derīgai laika zonai.',
    'unique'               => ':attribute jau ir izmantots.',
    'url'                  => ':attribute formāts nav derīgs.',
    'time_after_or_equal'  => 'Beigu laiks nedrīkst būt pirms sākuma laika.',
    'time_before_or_equal' => 'Sākuma laiks nedrīkst būt pēc beigu laika.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'pielāgota ziņa',
        ],
    ],

    'attributes' => [
        'nosaukums'      => 'Nosaukums',
        'kategorija'     => 'Kategorija',
        'datums'         => 'Datums',
        'sakuma_laiks'   => 'Sākuma laiks',
        'beigu_laiks'    => 'Beigu laiks',
        'apraksts'       => 'Apraksts',
        'darbinieks_id'  => 'Darbinieks',
        'telpa_id'       => 'Telpa',
    ],
];
