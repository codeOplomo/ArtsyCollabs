<?php

return [
    /*
     * The filesystems on which to store added media (and their conversions).
     * You can add any filesystems you want.
     */
    'defaultFilesystem' => 'public',

    /*
     * The maximum file size of uploads in kilobytes.
     */
    'maxFilesize' => 10240, // 10 GB

    /*
     * The maximum width of images in pixels.
     */
    'maxWidth' => 4096,

    /*
     * The maximum height of images in pixels.
     */
    'maxHeight' => 4096,

    /*
     * These class names will be used when a media object is created. You can
     * specify any class that implements
     * Spatie\MediaLibrary\MediaCollections\Media as long as it's listed here.
     */
    'media_model' => Spatie\MediaLibrary\MediaCollections\Models\Media::class,

    /*
     * The responsive images configuration.
     */
    'responsive' => [
        'small' => [
            'width' => 100,
            'height' => 100,
        ],
        'medium' => [
            'width' => 300,
            'height' => 200,
        ],
        'large' => [
            'width' => 800,
            'height' => 600,
        ],
        // Add more sizes as needed
    ],

    'json_column_name' => 'custom_properties',
];
