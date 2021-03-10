<?php  

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021

require ('../model/database.php');
require ('../model/vehicles_db.php');
require ('../model/make_db.php');
require ('../model/type_db.php');
require ('../model/class_db.php');

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

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);




$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action)
{
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action)
    {
        $action = 'default';
    }
}


$order = filter_input(INPUT_POST, 'order', FILTER_SANITIZE_STRING);
if(!$order)
{
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_STRING);
}

switch ($action)
{
    case "list_make":
        echo '<script>alert("Hitting list_make.")</script>';
        $vehicles = get_vehicles_by_make($make_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('./view/vehicle_list.php');
        break;
    case "list_type":
        echo '<script>alert("Hitting list_type.")</script>';
        $vehicles = get_vehicles_by_type($type_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('./view/vehicle_list.php');
        break;
    case "list_class":
        echo '<script>alert("Hitting list_class.")</script>';
        $vehicles = get_vehicles_by_class($class_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('./view/vehicle_list.php');
        break;
    case "list_all":
        echo '<script>alert("Hitting list_all.")</script>';
        $vehicles = get_vehicles_by_class($class_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('./view/vehicle_list.php');
        break;
    case "delete_vehicle":
        echo '<script>alert("Hitting delete_vehicle.")</script>';
        if($vehicle_id)
        {
            echo '<script>alert("Hitting IF $vehicle_id.")</script>';
            try
            {
                echo '<script>alert("Hitting try.")</script>';
                delete_vehicle($vehicle_id);
            }
            catch (PDOException $e)
            {
                $error = "Cannot delete vehicle without specificing vehicle first.";
                include('/view/error.php');
            }
            echo '<script>alert("Hitting header.")</script>';
            header("Location: .?");
        }
        echo '<script>alert("hitting after try.")</script>';
        break;
    default:
    echo '<script>alert("Hitting default.")</script>';
        $vehicles = get_vehicles_by_class($class_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('./view/vehicle_list.php');
        break;
}
    

?>