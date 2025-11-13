<?php

return [
    [
        'name' => 'int_value',
        'type' => 'Integer',
        'label' => 'Wieviele News sollen angezeigt werden?',
        'tags' => 'integer',
        'icon' => 'calculator',
        'width' => 50,
        'zeroNotEmpty' => 0,
        'defaultValue' => 9,
        'inputType' => 'text',
    ],
    [
        'name' => 'checkbox_slider_option',
        'type' => 'Checkbox',
        'label' => 'Sollen die News als Slider angezeigt werden?',
        'tags' => 'settings',
        'icon' => 'Check',
        'width' => 50,
        'formatter' => null,
        'inputfieldClass' => null,
    ],
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
        'datepicker' => 3
    ],
    [
        'name' => 'repeater_categories_news',
        'type' => 'Repeater',
        'label' => 'Repeater (News Kategorien)',
        'tags' => 'repeater',
        'icon' => 'Repeat',
        'width' => 50,
        'depth' => 1,
        'repeaterTitle' => '{headline}',
        'loading' => 1,
        'fields' => [
            'headline',
        ]
    ],
    [
        'name' => 'repeater_subcategories_news',
        'type' => 'Repeater',
        'label' => 'Repeater (News Subkategorien)',
        'tags' => 'repeater',
        'icon' => 'Repeat',
        'width' => 50,
        'depth' => 1,
        'repeaterTitle' => '{headline}',
        'loading' => 1,
        'fields' => [
            'headline',
            'dynamic_categories_news'
        ]
    ]
];