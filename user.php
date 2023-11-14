<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function loginUser($email, $password)
    {
        $email = $this->db->getConnection()->real_escape_string($email);
        $password = $this->db->getConnection()->real_escape_string($password);

        $query = "SELECT * FROM utilisateurs WHERE email='$email' AND mot_de_passe='$password'";
        $result = $this->db->getConnection()->query($query);

        if ($result->num_rows == 1) {
            return true; 
        } else {
            return false; 
        }
    }
}
?>
