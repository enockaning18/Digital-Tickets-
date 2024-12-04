<?php
class Event extends databaseObject
{
    static protected $database;
    static $table_name = 'event_copy';
    static protected $table_column = ['event_name', 'event_description'];

    public function __construct($args = [])
    {
        $this->event_name = $args['event_name'] ?? '';
        $this->event_description = $args['event_description'] ?? '';
    }

    public $id;
    public $event_name;
    public $event_description;
}
