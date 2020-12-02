<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class ThriveExtensionMenugatorAssignFields extends Migration
{
  /**
     * Don't delete the stream
     * when rolling back.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The field namespace.
     *
     * @var string
     */
    protected $namespace = 'navigation';

    /**
     * The related stream.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'menus',
    ];

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        "menu_group" => [
            "type"   => "anomaly.field_type.select",
            "config" => [
                "options" => [
                    "thrive.extension.menugator::message.group1" => [
                        "default"   => "Default",
                        "sidebar"   => "Sidebar",
                        "header"    => "Header",
                        "footer"    => "Footer",
                    ],
                    "thrive.extension.menugator::message.group2" => [
                        "group_a" => "Group A",
                        "group_b" => "Group B",
                        "group_c" => "Group C",
                        "group_d" => "Group D",
                    ],

                ],
                "separator"     => ":",
                "default_value" => 'default',
                "button_type"   => "info",
                "handler"       => "options",
                "mode"          => "dropdown",
            ]
        ],
        // "menu_image" => [
        //     "type"   => "anomaly.field_type.image",
        //     "config" => [
        //         "folders"       => null,
        //         "aspect_ratio"  => null,
        //         "min_height"    => null
        //     ]
        // ]
    ];



    /**
     * The addon assignments.
     *
     * @var array
     */
    protected $assignments = [
        'menu_group',
        // 'menu_image',
    ];
}
