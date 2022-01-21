<form class="ajaxForm repeater border rounded p-2 " method="POST" action="<?= route('grading_scheme/save'); ?>">
    <div class="d-table table-striped dt-responsive nowrap d-table w-100" width="100%">
        <div class="d-table-header-group w-100 p-2 border-bottom">
            <div class="d-table-row p-3" style="background-color: #313a46; color: #ababab;">
                <div class="d-lg-table-cell"><p class="h4 p-1"><?= get_phrase('grade'); ?></p></div>
                <div class="d-lg-table-cell"><p class="h4"><?= get_phrase('lower_Bound'); ?></p></div>
                <div class="d-lg-table-cell"><p class="h4"><?= get_phrase('upper_Bound'); ?></p></div>
                <div class="d-lg-table-cell"><p class="h4"><?= get_phrase('action'); ?></p></div>
            </div>
        </div>
        <div class="d-table-row-group w-100 p-2 border-bottom" data-repeater-list="main">
            <?php if(count($grading_schemes) === 0 ){ ?> 
                <div class="d-table-row" data-repeater-item>
                    <div class="d-lg-table-cell">
                        <div class="border-bottom lh-3 p-1 border-left border-right">
                            <input type="text" class="form-control" required name="grade" value="" placeholder="Grade eg: A, B"/>
                        </div>
                    </div>
                    
                    <div class="d-lg-table-cell">
                        <div class="border-bottom lh-3 p-1 border-right">
                            <input type="number" required step="0.01" class="form-control" name="lower_bound" value="" placeholder="Ending number eg: 70.99"/>   
                        </div>
                    </div>

                    <div class="d-lg-table-cell">
                        <div class="border-bottom lh-3 p-1 border-right">
                            <input type="number" required step="0.01" class="form-control" name="upper_bound" value="" placeholder="Starting number eg: 80.99" />    
                        </div>
                    </div>

                    <div class="d-lg-table-cell">
                        <div class="lh-3">
                            <input class="btn btn-primary " data-repeater-delete type="button" value="Delete" />
                        </div>
                    </div>
                </div>
            <?php }         
            foreach($grading_schemes as $grading_scheme):?>
                <div class="d-table-row" data-repeater-item>
                    <div class="d-lg-table-cell">
                        <div class="border-bottom lh-3 p-1 border-right border-left">
                            <input type="text" class="form-control" required name="grade" value="<?= $grading_scheme["grade"] ?>" placeholder="Grade eg: A, B"/>
                        </div>
                    </div>

                    <div class="d-lg-table-cell">
                        <div class="border-bottom lh-3 p-1 border-right">
                            <input type="number" step="0.01" required class="form-control" name="lower_bound" value="<?= $grading_scheme["lower_bound"] ?>" placeholder="Ending number eg: 70.99"/>   
                        </div>
                    </div>

                    <div class="d-lg-table-cell">
                        <div class="border-bottom lh-3 p-1 border-right">
                            <input type="number" step="0.01" required class="form-control" name="upper_bound" value="<?= $grading_scheme["upper_bound"] ?>" placeholder="Starting number eg: 80.99" />    
                        </div>
                    </div>
                    
                    <div class="d-lg-table-cell">
                        <div class="lh-3">
                            <input class="btn btn-primary " data-repeater-delete type="button" value="Delete" />
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-table-row border-bottom p-2">
            <div class="d-lg-table-cell p-1">
                <input class="btn btn-primary float-lg-right" data-repeater-create type="button" value="Add" />
            </div>
        </div>
    </div>
    <button class="btn btn-info" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
</form>
<style>
    .d-table-header-group{
        display: table-header-group!important;
        text-align: center;
    }
    .d-table-row-group{
        display: table-row-group!important;
        text-align: center;
    }
</style>

<script type="text/javascript">
    let form;
    $(".ajaxForm").submit(function(e) {
        form = $(this);
        ajaxSubmit(e, form, () => {} );
    });
    
    $(document).ready(function () {
        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {
            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
            },
            isFirstItemUndeletable: true
        })
    });
</script>