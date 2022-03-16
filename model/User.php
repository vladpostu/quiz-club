<?php 

    require_once('db.php');

    class User {
        var $id_user;
        var $username;
        var $password; 

        // constructor user
        public function __construct($username, $password) {
            $this->username = $username; 
            $this->password = $password;
        }

        // insert movie into movies table
        public function insert() {
            $conn = connect();

            $query = "";
            $query = "INSERT INTO users(username, password) 
                    VALUES('$this->username', '$this->password')";

            $conn->exec($query);

            //update user
            $id_user_query = "SELECT id_user from users ORDER BY id_user DESC LIMIT 1";
            $id_user = $conn->query($id_user_query);

            if ($id_user->rowCount() > 0){
                $row = $id_user->fetch(PDO::FETCH_ASSOC);
                $this->id_user = $row['id_user'];
            }
        }


}
