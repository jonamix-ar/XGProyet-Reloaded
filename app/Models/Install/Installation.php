<?php

namespace App\Models\Install;

use App\Core\Database;
use App\Core\Model;

class Installation extends Model
{
    /**
     * Get a list of tables
     *
     * @param type $db_name DB Name
     *
     * @return array
     */
    public function getListOfTables($db_name)
    {
        return $this->db->queryFetchAll(
            'SHOW TABLES FROM ' . $db_name
        );
    }

    /**
     * Get a count of admins
     *
     * @return array
     */
    public function getAdmin()
    {
        return $this->db->queryFetch(
            'SELECT COUNT(`user_id`) as count FROM ' . USERS . "
                WHERE `user_id` = '1' OR `user_authlevel` = '3';"
        );
    }

    /**
     * Check if the connection can be stablish
     *
     * @param string $host     Host
     * @param string $user     User
     * @param string $password Password
     *
     * @return Database
     */
    public function tryConnection($host, $user, $password)
    {
        return $this->db->tryConnection($host, $user, $password);
    }

    /**
     * Check if the database name exists
     *
     * @param string $db_name DB Name
     *
     * @return Database
     */
    public function tryDatabase($db_name)
    {
        return $this->db->tryDatabase($db_name);
    }

    /**
     * Run a simple insert query
     *
     * @param string $query Query
     *
     * @return int
     */
    public function runSimpleQuery($query)
    {
        return $this->db->query($query);
    }

    /**
     * Escape a value
     *
     * @param string $var
     * @return string
     */
    public function escapeValue($var): string
    {
        return $this->db->escapeValue($var);
    }
}
