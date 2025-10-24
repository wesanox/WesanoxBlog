<?php

return [
    [
        'name' => 'checkbox_subcategory',
        'type' => 'Checkbox',
        'label' => 'Subcategory?',
        'tags' => 'settings',
        'icon' => 'Check',
        'width' => 50,
        'formatter' => null,
        'inputfieldClass' => null,
    ],
    [
        'name' => 'tab_news',
        'type' => 'FieldsetTabOpen',
        'label' => 'News Kategorien',
        'tags' => 'tabs',
        'icon' => 'Tag',
    ],
    [
        'name' => 'tab_news_END',
        'type' => 'FieldsetClose',
        'label' => 'Close an open fieldset',
        'tags' => 'tabs',
        'icon' => 'Tag',
    ],
    [
        'name' => 'dynamic_categories_news',
        'type' => 'DynamicOptions',
        'label' => 'News Kategorien',
        'tags' => 'dynamic',
        'icon' => 'Magic',
        'width' => 40,
        'max_items' => 1,
        'inputfield_class' => [
            'InputfieldSelect',
            'InputfieldCheckboxes'
        ],
    ],
    [
        'name' => 'dynamic_subcategories_news',
        'type' => 'DynamicOptions',
        'label' => 'News Subkategorien',
        'tags' => 'dynamic',
        'icon' => 'Magic',
        'width' => 40,
        'inputfield_class' => [
            'InputfieldSelect',
            'InputfieldCheckboxes'
        ],
    ],
    [
        'name' => 'date_news',
        'type' => 'Datetime',
        'label' => 'Veröffentlichungsdatum',
        'tags' => 'dates',
        'icon' => 'Calendar',
        'width' => 20,
        'dateOutputFormat' => 'd.m.Y',
        'dateInputFormat' => 'Y-m-d',
        'defaultToday' => 1,
    ],
    [
        'name' => 'repeater_categories_news',
        'type' => 'Repeater',
        'label' => 'Repeater (News Kategorien)',
        'tags' => 'repeater',
        'icon' => 'Repeat',
        'width' => 100,
        'depth' => 1,
        'repeaterTitle' => '{headline}',
        'loading' => 1,
        'fields' => [
            'headline',
            'checkbox_subcategory',
        ]
    ]
];