<?php
    class Image
    {
        public static function upload($image, $directory = "/uploads") : string
        {
            // Get the file extension of the original filename
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);

            // Generate a unique string to use as the base for the new filename
            $uniqueString = uniqid();

            // Return the new, unique filename by combining the unique string and file extension
            $filename = $uniqueString . '.' . $ext;

            // Create the full path to the destination directory
            $destination = $directory . '/' . $filename;

        // Move the uploaded image to the destination directory
            move_uploaded_file($image['tmp_name'], $destination);

        // Return the new, unique filename of the uploaded image
            return $filename;
        }
    }
?>