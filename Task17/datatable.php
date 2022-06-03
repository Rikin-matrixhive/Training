<?php

class Datatable
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "12345", "country_city_statedetails");
    }
}
class Tabledata extends Datatable
{

    public function Fetch_Data()
    {
        // intialize all variable
        $parameters = $coloums = $totalrecords = $data = array();

        $parameters = $_REQUEST;

        $coloums = array(
            0 => 'id',
            1 => 'fname',
            2 => 'lname',
            3 => 'dob',
            4 => 'age',
            5 => 'email',
            6 => 'mobno',
            7 => 'src1',
            8 => 'camp',
            9 => 'country',
        );
        $where = $sqlTot = $sqlRec = "";
        $sql = "SELECT * FROM persondetails";
        $sqlTot = $sql;
        $sqlRec = $sql;

        if (!empty($parameters['search']['value'])) {
            $sqlRec .= " WHERE fname LIKE '%{$parameters['search']['value']}%'
            OR lname LIKE '%{$parameters['search']['value']}%'
            OR dob LIKE '%{$parameters['search']['value']}%'
            OR age LIKE '%{$parameters['search']['value']}%'
            OR email LIKE '%{$parameters['search']['value']}%'
            OR mobno LIKE '%{$parameters['search']['value']}%'
            OR src1 LIKE '%{$parameters['search']['value']}%'
            OR country LIKE '%{$parameters['search']['value']}%'";
        }
        if (isset($where) && $where != '') {
            $sqlTot = $where;
            $sqlRec = $where;
        }
        $sqlRec .=  " ORDER BY " . $coloums[$parameters['order'][0]['column']] . "   " . $parameters['order'][0]['dir'] . "  LIMIT " . $parameters['start'] . " ," . $parameters['length'] . " ";
        $queryTot = mysqli_query($this->conn, $sqlTot) or die("database error:" . mysqli_error($this->conn));
        $totalRecords = mysqli_num_rows($queryTot);

        $queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");
        while ($row = mysqli_fetch_row($queryRecords)) {
            $data[] = $row;
        }
        $json_data = array(
            "draw"            => intval($parameters['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data   // total data array
        );
        echo json_encode($json_data);  // send data as json format
    }
}

$Obj = new Tabledata();
if (count($_POST) > 0) {
    $Obj->Fetch_Data();
}
