<select name="code">
    <?php foreach ($courses as $course) : ?>
        <option value='<?php echo $course->getCode() ?>'>
            <?php echo $course->getName() ?>
            <?php echo $course->getDescription() ?>
            <?php echo $course->getCredits() ?>
        </option>
    <?php endforeach; ?>
</select>