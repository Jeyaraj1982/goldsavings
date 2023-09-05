<?php
include_once("config.php"); 
include_once("webservices/class.AreaNames.php");
include_once("webservices/class.Customers.php");
include_once("webservices/class.CustomerTypes.php");
include_once("webservices/class.DistrictNames.php");
include_once("webservices/class.DocumentTypes.php");
include_once("webservices/class.Employees.php");
include_once("webservices/class.EmployeeCategories.php");
include_once("webservices/class.FileExtensions.php");
include_once("webservices/class.GoldRates.php");
include_once("webservices/class.Profile.php");
include_once("webservices/class.StateNames.php");
include_once("webservices/class.Schemes.php");


include_once("webservices/class.AddressBook.php");
include_once("webservices/class.Benefits.php");
include_once("webservices/class.Contracts.php");
include_once("webservices/class.Companies.php");
include_once("webservices/class.Events.php");

if (isset($_GET['method'])) {     
    $class=$_GET['method'];
    $action=$_GET['action'];
    $ws = new $class();
    echo $ws->$action();
} else {
    echo $_GET['action']();
}
?>