<?php
namespace Phppot;

use Phppot\DepartmentEvent;
if (! empty($_POST["department_id"])) {
    
    $departmentId = $_POST["department_id"];
    require_once __DIR__ . '/../Model/DepartmentEvent.php';
    $departmentEvent = new DepartmentEvent();
    $eventResult = $departmentEvent->getEventByDepartmentId($departmentId);
    ?>
<option value="">Select Event</option>
<?php
    foreach ($eventResult as $event) {
        ?>
<option value="<?php echo $event["event_name"]; ?>"><?php echo $event["event_name"]; ?></option>
<?php
    }
}
?>