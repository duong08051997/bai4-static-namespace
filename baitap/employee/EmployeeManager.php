<?php
include "Employee.php";
class EmployeeManager{

    private $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function getData()
    {
    $dataJson = file_get_contents($this->employees);
    return json_decode($dataJson,true);
    }

    public function saveData($arr)
    {
    $dataJson = json_encode($arr);
    file_put_contents($this->employees,$dataJson);
    }

    public function add($employee)
    {
    $data = $this->getData();
    $arr = [
        "lastname"=> $employee->getLastanme(),
        "name"=> $employee->getName(),
        "birth"=> $employee->getBirth(),
        "address"=> $employee->getAddress(),
        "position"=> $employee->getPosition(),
    ];

    array_push($data,$arr);
    $this->saveData($data);
    }

    public function getAll()
    {
        $data = $this->getData();
        $arr =[];
        foreach ($data as $item){
            $employee = new Employee($item["lastname"],$item["name"],$item["birth"],$item["address"],$item["position"]);
        }
        return $arr;
    }
    public function delete($name)
    {
        $data = $this->getData();
        unset($data[$name]);
        $this->saveData($data);
    }
}
