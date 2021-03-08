<?php  

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021

require ('./model/database.php');
require ('./model/vehicles_db.php');
require ('./model/make_db.php');
require ('./model/type_db.php');
require ('./model/class_db.php');

$userMake;
$userType;
$userClass;

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id)
{
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id)
{
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id)
{
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}



$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action)
{
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action)
    {
        $action = 'list_all';
    }
}

switch ($action)
{
    case "list_all":
        $vehicle_Make = get_vehicles_by_make($make_id, $type_id, $class_id);
        $vehicles = get_makes();
        $vehicles = get_vehicles_by_make($make_id);
        include('view/vehicle_list.php');
        break;
    default:
        $vehicle_Make = get_make_by_name($make_id);
        $makes = get_makes();
        $vehicles = get_vehicles_by_make($make_id);
        include('view/vehicle_list.php');
        break;

}
    

?>