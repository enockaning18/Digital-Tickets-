<?php
class Event extends databaseObject
{
    static protected $database;
    static protected $table_name = 'event';
    static protected $table_column = ['event_name', 'event_description', 'event_category', 'event_contact', 'event_email', 'event_date_time_start', 'event_date_time_end', 'event_mode', 'event_venue', 'ticket_name', 'ticket_type', 'ticket_price', 'ticket_quantity'];

    public function __construct($args = [])
    {
        $this->event_name = $args['event_name'] ?? '';
        $this->event_description = $args['event_description'] ?? '';
        $this->event_category = $args['event_category'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->event_contact = $args['event_contact'] ?? '';
        $this->event_email = $args['event_email'] ?? '';
        $this->event_date_time_start = $args['event_date_time_start'] ?? '';
        $this->event_date_time_end = $args['event_date_time_end'] ?? '';
        $this->event_mode = $args['event_mode'] ?? '';
        $this->event_venue = $args['event_venue'] ?? '';
        $this->ticket_name = $args['ticket_name'] ?? '';
        $this->ticket_price = $args['ticket_price'] ?? '';
        $this->ticket_type = $args['ticket_type'] ?? '';
        $this->ticket_quantity = $args['ticket_quantity'] ?? '';
    }




  


    public function create_new_event()
    {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_error = $_FILES['image']['error'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extension_allowed = ['jpg', 'png', 'jpeg', 'heic', 'svg', 'webp', 'bmp', 'tiff', 'ico'];

        $file_new_name = null;

        // Validate file extension and size
        if (in_array($file_extension, $extension_allowed)) {
            if ($file_error === 0) {
                if ($file_size < 5000000) { // 5 MB limit
                    // Generate a unique name for the file
                    $file_new_name = uniqid('', true) . "." . $file_extension;
                    $file_directory = 'uploads/' . $file_new_name;

                    // Move the uploaded file to the target directory
                    if (!move_uploaded_file($file_temp, $file_directory)) {
                        return false;
                    }
                    $this->image = $file_new_name;
                } else {
                    return false; // File size too large
                }
            } else {
                return false; // File upload error
            }
        } else {
            return false; // Invalid file type
        }

        return $this->create();
    }

    public $id;
    public $event_name;
    public $event_description;
    public $event_category;
    public $image;
    public $event_contact;
    public $event_email;
    public $event_date_time_start;
    public $event_date_time_end;
    public $event_mode;
    public $event_venue;
    public $ticket_name;
    public $ticket_price;
    public $ticket_type;
    public $ticket_quantity;


}