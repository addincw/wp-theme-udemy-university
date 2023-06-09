<?php

class EventPostType
{
    private $today;

    private $baseArgs;

    private $activeArgs;

    public function __construct()
    {
        $this->today = date('Y-m-d H:i:s');

        $this->baseArgs = [
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
        ];

        $this->activeArgs = [
            'meta_query' => [
                [
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $this->today,
                    'type' => 'DATETIME'
                ],
            ]
        ];
    }

    /**
     * return event arguments to get active / incoming events
     * 
     * @return mixed[]
     */
    public function get_active_events_args()
    {
        return array_merge($this->baseArgs, $this->activeArgs);
    }

    /**
     * get active / incoming events
     * 
     * @param mixed[] $addArgs Query Arguments, reference to WP_Query doc
     * 
     * @return WP_Query
     */
    public function get_active_events($addArgs = []): WP_Query
    {
        $finalArgs = array_merge($this->get_active_events_args(), $addArgs);

        return new WP_Query($finalArgs);
    }
    /**
     * get deactive / past events
     * 
     * @param mixed[] $addArgs Query Arguments, reference to WP_Query doc
     * 
     * @return WP_Query
     */
    public function get_deactive_events($addArgs = []): WP_Query
    {
        $deactiveArgs = [
            'order' => 'DESC',
            'meta_query' => [
                [
                    'key' => 'event_date',
                    'compare' => '<',
                    'value' => $this->today,
                    'type' => 'DATETIME'
                ],
            ]
        ];

        $finalArgs = array_merge($this->baseArgs, $deactiveArgs, $addArgs);

        return new WP_Query($finalArgs);
    }
}
