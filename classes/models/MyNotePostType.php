<?php

class MyNotePostType
{
    private $baseArgs;

    public function __construct()
    {
        $this->baseArgs = [
            'post_type' => 'my-note',
        ];
    }

    /**
     * get my notes
     * 
     * @return WP_Query
     */
    public function get_notes(): WP_Query
    {
        $noteArgs = [];

        $finalArgs = array_merge($this->baseArgs, $noteArgs);

        return new WP_Query($finalArgs);
    }
}
