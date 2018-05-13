<?php
require_once ('Adaptation.php');
class Role
{
    protected $permissions;

    protected function __construct() {
        $this->permissions = array();
    }

    // return a role object with associated permissions
    public static function getRolePerms($role_name) {
        //default user and password only has access to account and role table
        $db = new mysqli(DATA_BASE_HOST, DEFAULT_USER, DEFAULT_USER_PASSWORD, DATA_BASE_NAME);
        if( mysqli_connect_error() == 0 ){  // Connection succeeded
            $role = new Role();
            $query = "SELECT r_role,r_permission
                    FROM Role
                    WHERE r_role = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('s',$role_name);
            $stmt->execute();

            while($row = $stmt->fetch()) {
                $role->permissions[$row["r_permission"]] = true;
            }
            return $role;
        }
        return false;
    }

    // check if a permission is set
    public function hasPerm($permission) {
        return isset($this->permissions[$permission]);
    }
}

?>