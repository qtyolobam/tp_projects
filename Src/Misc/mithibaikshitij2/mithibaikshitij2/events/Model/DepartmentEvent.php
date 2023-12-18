<?php
namespace Phppot;

use Phppot\DataSource;

class DepartmentEvent
{
    private $ds;
    
    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }
    
    /**
     * to get the country record set
     *
     * @return array result record
     */
    public function getAllDepartment()
    {
        $query = "SELECT * FROM departments";
        $result = $this->ds->select($query);
        return $result;
    }

    
    /**
     * to get the state record based on the country_id
     *
     * @param string $departmentId
     * @return array result record
     */
    public function getEventByDepartmentId($departmentId)
    {
        // $query = "SELECT * FROM events WHERE dept_id = ? and end_date='2021-11-30 23:59:00'";
        if (date('Y-m-d') >= "2021-11-27")
        {
            $query = "SELECT * FROM events WHERE dept_id = ? and end_date='2021-11-30 23:59:00'";
        }
        else{
            $query = "SELECT * FROM events WHERE dept_id = ?";
        }
        $paramType = 'd';
        $paramArray = array(
            $departmentId
        );
        $result = $this->ds->select($query, $paramType, $paramArray);
        return $result;
    }
}