<?php

class Playlist
{
    private $con;
    private $id;
    private $name;
    private $owner;

    public function __construct($con, $data)
    {
        $this->con = $con;

        if (!is_array($data)) {
            $query = mysqli_query($this->con, "SELECT * FROM playlists WHERE id = '$data'");
            $data = mysqli_fetch_array($query);
        }

        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->owner = $data['owner'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

}

?>