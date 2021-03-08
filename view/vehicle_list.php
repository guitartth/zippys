<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021
?>

<?php include('header.php'); ?>
<section id="userSelect" class="userSelect">
    <h3>Narrow Results:</h3>
    
    <form action="." method="get" id="select_make" class="select_make">
        <input type="hidden" name="action" value="list_make">
        <select name="make_id">
            <option value="0">Select Vehicle Make</option>
            <?php foreach ($makes as $make) : ?>
            <?php if ($make_id == $make['make_id']) { ?>
                <option value="<?= $make['make_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $make['make_id'] ?>">
                    <?php } ?>
                    <?= $make['Make'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
    </form>
    <br>
    <form action="." method="get" id="select_type" class="select_type">
        <input type="hidden" name="action" value="list_type">
        <select name="type_id">
            <option value="0">Select Vehicle Type</option>
            <?php foreach ($types as $type) : ?>
            <?php if ($type_id == $type['type_id']) { ?>
                <option value="<?= $type['type_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $type['type_id'] ?>">
                    <?php } ?>
                    <?= $type['Type'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
    </form>
    <br>
    <form action="." method="get" id="select_class" class="select_class">
        <input type="hidden" name="action" value="list_class">
        <select name="class_id">
            <option value="0">Select Vehicle Class</option>
            <?php foreach ($classes as $class) : ?>
            <?php if ($class_id == $class['class_id']) { ?>
                <option value="<?= $class['class_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $class['class_id'] ?>">
                    <?php } ?>
                    <?= $class['Class'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
    </form>



<hr>
<?php include('footer.php'); ?>