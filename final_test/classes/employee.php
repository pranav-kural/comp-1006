<?php


class Employee
{
//    Defining the class properties
    private $first_name;
    private $last_name;
    private $dob;
    private $gross_income;

    public function __construct ($first_name, $last_name, $dob, $gross_income)
    {
        // set the class variables
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->dob = $dob;
        $this->gross_income = $gross_income;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    public function getGrossIncome()
    {
        return $this->gross_income;
    }

    public function setGrossIncome($gross_income)
    {
        $this->gross_income = $gross_income;
    }

    public function getUserAge()
    {
        $from = new DateTime($this->dob);
        $to   = new DateTime('today');
        return $from->diff($to)->y;
    }

    public function getNetIncome() {
        $income = $this->gross_income;
        $EI = $income * 0.07;
        $CPP = $income * 0.08;
        $income_tax = $income * 0.11;
        $deductions = $EI + $CPP + $income_tax;
        return ($income - $deductions);
    }

    public function getEmployeeDetails() {
        return array(
            'fullName' => $this->first_name . ' ' . $this->last_name,
            'age' => $this->getUserAge(),
            'grossIncome' => $this->gross_income,
            'netIncome' => $this->getNetIncome()
        );
    }

}