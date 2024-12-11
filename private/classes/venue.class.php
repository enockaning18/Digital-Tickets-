
<?php
class Venue extends databaseObject
{
    static protected $database;
    static protected $table_name = 'venue';
    static protected $table_column = ['venue_name', 'venue_address', 'latitude', 'longitude', 'venue_city', 'venue_region'];

    public function __construct($args = [])
    {
        $this->venue_name = $args['venue_name'] ?? '';
        $this->venue_address = $args['venue_address'] ?? '';
        $this->latitude = $args['latitude'] ?? '';
        $this->longitude = $args['longitude'] ?? '';
        $this->venue_city = $args['venue_city'] ?? '';
        $this->venue_region = $args['venue_region'] ?? '';
    }


    public $id;
    public $venue_name;
    public $venue_address;
    public $venue_city;
    public $venue_region;
    public $latitude;
    public $longitude;
}
