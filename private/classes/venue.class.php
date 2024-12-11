
<?php
class Venue extends databaseObject
{
    static protected $database;
    static protected $table_name = 'venue';
    static protected $table_column = ['venue_name', 'venue_address', 'venue_city', 'venue_region'];

    public function __construct($args = [])
    {
        $this->venue_name = $args['venue_name'] ?? '';
        $this->venue_address = $args['venue_address'] ?? '';
        $this->venue_city = $args['venue_city'] ?? '';
        $this->venue_region = $args['venue_region'] ?? '';
    }


    public $id;
    public $venue_name;
    public $venue_address;
    public $venue_city;
    public $venue_region;
}
