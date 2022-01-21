<div >
    <ul class="list-group-flush list-group">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <span class="min-width-80"><?= get_phrase("name") ?>:</span>
            <span class="font-15 font-weight-400 text-capitalize"><?= $student["name"] ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <span class="min-width-80"><?= get_phrase("date_of_birth") ?>:</span>
            <span class="font-15 font-weight-400"><?= date("dS M Y" , strtotime($student["dob"])) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <span class="min-width-80"><?= get_phrase("level") ?>:</span>
            <span class="font-15 font-weight-400"><?= $student["level"] ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <span class="min-width-80"><?= get_phrase("program") ?>:</span>
            <span class="font-15 font-weight-400"><?= $student["program"] ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <span class="min-width-80"><?= get_phrase("nationality") ?>:</span>
            <span class="font-15 font-weight-400 text-capitalize"><?= $student["nationality"] ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <span class="min-width-80"><?= get_phrase("email") ?>:</span>
            <span class="font-16 font-weight-400 text-capitalize"><?= $student["email"] ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <span class="min-width-80"><?= get_phrase("address") ?>:</span>
            <p class="font-15 font-weight-400"><?= $student["address"] ?></p>
        </li>
    </ul>
</div>
<style>
    .min-width-50{
        min-width: 50px;
    }
    .min-width-80{
        min-width: 80px;
    }
</style>