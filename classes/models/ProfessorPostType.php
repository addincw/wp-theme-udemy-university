<?php

class ProfessorPostType
{
    private $baseArgs;

    public function __construct()
    {
        $this->baseArgs = [
            'post_type' => 'professor',
        ];
    }

    /**
     * get professor programs
     * 
     * @param int $professorId Post ID from post type professor
     * 
     * @return WP_Query
     */
    public function get_programs($professorId): WP_Query
    {
        $progArgs = [
            'post_type' => 'program',
            'meta_query' => [
                [
                    'key' => 'professors',
                    'compare' => 'LIKE',
                    'value' => '"' . $professorId . '"',
                ],
            ]
        ];

        $finalArgs = array_merge($this->baseArgs, $progArgs);

        return new WP_Query($finalArgs);
    }
}
