<?php

class Attendee extends databaseObject
{

    static protected $database;
    static protected $table_name = 'attendee';
    static protected $table_column = ['email', 'username', 'name', 'phone', 'password', 'birthdate', 'image'];


    public function __construct($args = [])
    {
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->birthdate = $args['birthdate'] ?? '';
        $this->image = $args['image'] ?? '';
    }

    public function create_new_attendee()
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
    public $email;
    public $username;
    public $name;
    public $phone;
    public $birthdate;
    public $password;
    public $image;
}
