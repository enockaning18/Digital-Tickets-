<?php
class Event extends databaseObject
{
    static protected $database;
    static protected $table_name = 'event';
    static protected $table_column =
    [
        'id', 'event_name', 'event_description',
        'event_category', 'event_contact',
        'event_email', 'event_date_time_start',
        'event_date_time_end', 'event_mode',
        'event_venue', 'ticket_name',
        'ticket_type', 'ticket_price',
        'ticket_quantity', 'event_reference_id', 'organizer_id', 'status'
    ];

    public function __construct($args = [])
    {
        $this->event_reference_id = $this->uniqid_code_for_reference() ?? '';
        $this->id = $this->uniqid_code_for_id() ?? '';
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
        $this->organizer_id = $_SESSION['id'] ?? '';
        $this->status = 0;
    }

    static public function find_by_reference_id($id)
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        $query_command .= " JOIN `organizer` ON organizer_id  = organizer.id ";
        $query_command .= " WHERE organizer_id = '" . $id . "' ";
        $obj_array = static::find_by_query_command($query_command);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    static public function find_event_published()
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        $query_command .= " WHERE status = '" . 1 . "' ";
        return static::find_by_query_command($query_command);
    }


    public function publish_event($event_reference_id)
    {
        $query_command = "UPDATE " . static::$table_name . " SET ";
        $query_command .= " status = '" . 1 . "' ";
        $query_command .= " WHERE event_reference_id= '" . $event_reference_id . "' ";
        $query_command .= "LIMIT 1";
        $result = self::$database->query($query_command);
        return $result;
    }

    public function delete_event($event_reference_id)
    {
        $query = "DELETE FROM " . static::$table_name . " WHERE event_reference_id = ? LIMIT 1";
        $stmt = self::$database->prepare($query);
        $stmt->bind_param("s", $event_reference_id); // Use "s" for string binding
        $stmt->execute();

        return $stmt->affected_rows > 0; // Return true if rows were affected
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
    public $event_reference_id;
    public $organizer_id;
    public $organizer_name;
    public $status;
}
