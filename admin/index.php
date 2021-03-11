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

$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
if(!$make_name)
{
    $make_name = filter_input(INPUT_GET, 'make_name', FILTER_SANITIZE_STRING);
}

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id)
{
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
if(!$type_name)
{
    $type_name = filter_input(INPUT_GET, 'type_name', FILTER_SANITIZE_STRING);
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id)
{
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
if(!$class_name)
{
    $class_name = filter_input(INPUT_GET, 'class_name', FILTER_SANITIZE_STRING);
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
    case "manage_makes":
        $makes = get_makes();
        include('./view/make_list.php');
        break;
    case "add_make":
        add_make($make_name);
        header("Location: .?action=manage_makes");
        break;
    case "delete_make":
        if($make_id)
        {
            try
            {
                delete_make($make_id);
            }
            catch (PDOException $e)
            {
                $error = "Cannot delete Make with vehicles of this make still in inventory.";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_makes");
        break;
    case "manage_types":
        $types = get_types();
        include('./view/type_list.php');
        break;
    case "add_type":
        add_type($type_name);
        header("Location: .?action=manage_types");
        break;
    case "delete_type":
        if ($type_id) 
        {
            try 
            {
                delete_type($type_id);
            } 
            catch (PDOException $e) 
            {
                $error = "Cannot delete Type with vehicles of this type still in inventory.";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_types");
        break;
    case "manage_classes":
        $classes = get_classes();
        include('./view/class_list.php');
        break;
    case "add_class":
        add_class($class_name);
        header("Location: .?action=manage_classes");
        break;
    case "delete_class":
        if ($class_id) 
        {
            try 
            {
                delete_class($class_id);
            } 
            catch (PDOException $e) 
            {
                $error = "Cannot delete Class with vehicles of this class still in inventory.";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_classes");
        break;
    default:
        $vehicles = get_vehicles_by_class($class_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('./view/vehicle_list.php');
        break;
}
    

?>