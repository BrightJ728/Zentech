<?php $school_id = school_id(); ?>

<form method="POST" class="col-12 d-block ajaxForm" action="<?= route('student/create_single_student'); ?>" id = "student_admission_form" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="text-info">All fields with asterisk (<span class="asterisk-red">*</span>) are required(mandatory)</div>
        <div class="form-group row mb-2 d-flex align-items-center">
            <label class="col-md-2 col-form-label" for="name"><?= get_phrase('name'); ?></label>
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="<?= get_phrase("first_name") ?>" required>
                <span class="asterisk-red">*</span>
            </div>
            
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" name="middle_name" placeholder="<?= get_phrase("middle_name") ?>" class="form-control" id="middle_name">
            </div>

            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="<?= get_phrase("last_name") ?>" required>
                <span class="asterisk-red">*</span>
            </div>
        </div>
        
        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="email"><?= get_phrase('email'); ?></label>
            <div class="col-md-9 d-flex align-items-center" d-flex>
                <input type="email" class="form-control" id="email" name="email" placeholder="<?= get_phrase('email') ?>" required>
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2 ">
            <label class="col-md-2 col-form-label" for="phone"><?= get_phrase('phone') ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="<?= get_phrase('phone') ?>" required>
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="dob"><?= get_phrase('date_of_birth'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <input type="date" class="form-control" id="dob" name="dob" placeholder="dob" required min="<?= date('Y-m-d', time() - 3600 * 24 * 365 *  100 ) ?>" max="<?= date('Y-m-d', time() - 3600 * 24 * 365 * 15) ?>">
                <span class="asterisk-red">*</span>
            </div>
            
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="year_group"><?= get_phrase('year_admitted') ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <select name="year_group" id="year_group" class="form-control select2" data-toggle = "select2" required >
                    <option value=""><?= get_phrase('select_year'); ?></option>
                    <?php $current_year = date("Y"); 
                    for($i = $current_year + 4; $i > $current_year - 20; $i--){ ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="gender"><?= get_phrase('gender'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <select name="gender" id="gender" class="form-control"  required aria-label="<?= get_phrase('marital_status') ?>">
                    <option value=""><?= get_phrase('select_gender'); ?></option>
                    <option value="Male"><?= get_phrase('male'); ?></option>
                    <option value="Female"><?= get_phrase('female'); ?></option>
                    <option value="Others"><?= get_phrase('other'); ?></option>
                </select>
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="address"><?= get_phrase('residential_address'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <textarea class="form-control" id="address" rows="4" name ="address" placeholder="GE-XXX-XXX <?= /*Adds a newline*/chr(13) ?>Accra, <?= /*Adds a newline*/ chr(13) ?>Ghana"></textarea>
                <span class="asterisk-red">*</span>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="marital_status"><?= get_phrase('marital_status') ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <select required type="text" name="marital_status" class="form-control required select2" id="marital_status" aria-label="<?= get_phrase('marital_status') ?>">
                    <option value=''>--<?= get_phrase('marital_status') ?>--</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="seperated">Seperated</option>
                </select>
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="no_of_children"><?= get_phrase('no_of_children'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <input type="number" name="no_of_children" min="0" placeholder="0, 1 , 2..." value="0" class="form-control" id="no_of_children">
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="place_of_birth"><?= get_phrase('place_of_birth'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <input type="text" required name="place_of_birth" placeholder="Town/Region/Country" class="form-control required" id="place_of_birth">
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="no_of_children"><?= get_phrase('nationality'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <select name="nationality" id="nationality" class="form-control select2" data-toggle="select2">
                    <option value="">--<?= get_phrase('select_nationality'); ?>--</option>
                    <?php 
                        $nationalities = json_decode(get_settings("nationalities"), true);
                        foreach($nationalities as $nationality){ 
                            $key = array_keys($nationality)[0]; ?>
                            <option value="<?= $key ?>"><?= $nationality[$key] ?></option>
                    <?php } ?>
                </select>
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="emergency_contact1"><?= get_phrase('emergency_contact_1'); ?></label>
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" id="emergency_contact1" name="emergency_contact1_name" class="form-control" placeholder="<?= get_phrase("name") ?>" required><span class="asterisk-red">*</span>
            </div>
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" id="emergency_contact1_phone" name="emergency_contact1_phone" class="form-control" placeholder="<?= get_phrase("phone") ?>" required><span class="asterisk-red">*</span>
            </div>
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" name="emergency_contact1_email" placeholder="<?= get_phrase("email") ?>" class="form-control" id="emergency_contact1_email">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="emergency_contact1_relation"></label>
            <div class="col-md-9 d-flex align-items-center">
                <select required type="text" name="emergency_contact1_relationship" class="form-control" id="emergency_contact1_relation">
                    <option value=''>--<?= get_phrase("select_relationship") ?>--</option>
                    <?php $relationships = $this->db->get('relationships')->result_array(); ?>
                    <?php foreach($relationships as $relationship){ ?>
                        <option value="<?= $relationship['id']; ?>"><?= $relationship['description']; ?></option>
                    <?php } ?>
                </select> 
                <span class="asterisk-red">*</span>
            </div>
        </div>
        
        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="emergency_contact2"><?= get_phrase('emergency_contact_2'); ?></label>
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" id="emergency_contact2" name="emergency_contact2_name" class="form-control" placeholder="<?= get_phrase("name") ?>" required><span class="asterisk-red">*</span>
            </div>
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" id="emergency_contact2_phone" name="emergency_contact2_phone" class="form-control" placeholder="<?= get_phrase("phone") ?>" required><span class="asterisk-red">*</span>
            </div>
            <div class="col-md-3 mb-1 d-flex align-items-center">
                <input type="text" name="emergency_contact2_email" placeholder="<?= get_phrase("email") ?>" class="form-control" id="emergency_contact2_email">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="emergency_contact1_relation"></label>
            <div class="col-md-9 d-flex align-items-center">
                <select required type="text" name="emergency_contact2_relationship" class="form-control" id="emergency_contact1_relation">
                    <option value=''>--<?= get_phrase("select_relationship") ?>--</option>
                    <?php $relationships = $this->db->get('relationships')->result_array(); ?>
                    <?php foreach($relationships as $relationship){ ?>
                        <option value="<?= $relationship['id']; ?>"><?= $relationship['description']; ?></option>
                    <?php } ?>
                </select> 
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="first_language"><?= get_phrase('first_official_language'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <select required type="text" name="first_language" class="form-control" id="first_language">
                    <option value=''>--<?= get_phrase("select_your_first_language") ?>--</option>
                    <option value="Dutch"> Dutch </option>
                    <option selected value="English"> English </option>
                    <option value="French"> French </option>
                    <option value="German"> German </option>
                    <option value="Portuguese"> Portuguese </option>
                    <option value="Spanish"> Spanish </option>
                </select> 
                <span class="asterisk-red">*</span>
            </div>
        </div>
        
        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="occupation"><?= get_phrase('occupation'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <input type="text" name="occupation" placeholder="<?= get_phrase("occupation") ?>" class="form-control" id="occupation">
                <span class="asterisk-red">*</span>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="first_language"><?= get_phrase('do_you_have_a_disabilities'); ?></label>
            <div class="col-md-9 d-flex">
                <div class="">
                    <b><span id="txtDisability" class="ml-2"> No </span></b>
                    <label class="switch">
                        <input type="checkbox" id="add_disabilityToggle" aria-label="Add Disability" data-toggle='tooltip' data-placement='top' data-original-title="Add Disability" onchange="return addDisabilityToggle(this, 'disability')" >
                        <span class="slider"></span>
                    </label>
                    
                </div>
                <div class="d-flex align-items-center">
                    <input class="form-control d-none" type="text" name="disability" id="disability" placeholder="<?= get_phrase("enter_your_disability") ?> ">
                </div>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label class="col-md-2 col-form-label" for="program"><?= get_phrase('program'); ?></label>
            <div class="col-md-9 d-flex align-items-center">
                <select required type="text" name="program" class="form-control" id="program">
                    <option value=''>--<?= get_phrase('select_programme'); ?>--</option>
                    <?php $programs = $this->db->get('programs')->result_array(); ?>
                    <?php foreach($programs as $program){ ?>
                        <option value="<?= $program['id']; ?>"><?= $program['description']; ?></option>
                    <?php } ?>
                </select>
                <span class="asterisk-red">*</span>
            </div>
        </div>
        <div class='repeater mb-2'>
            <h3>Certificates</h3>
            <div data-repeater-list="certificates" class="row mr-0 ml-0">
                    <div data-repeater-item class="w-100">
                        <div class="form-group row mb-1">
                            <label class="col-md-2 col-form-label" for="certificate_type"><?= get_phrase('certificate_type'); ?></label>
                            <div class="col-md-9 d-flex align-items-center">
                                <select required name="certificate_type" id="certificate_type" class="form-control" >
                                    <option value="">--<?= get_phrase('select_certificate_type'); ?>--</option>
                                    <option value="A-level" >A-level</option>
                                    <option value="O-level" >O-level</option>
                                    <option value="WASSCE" >WASSCE</option>
                                    <option value="SSSCE" >SSSCE</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="HND" >HND</option>
                                    <option value="Degree" >Degree</option>
                                    <option value="Matured">Matured</option>
                                </select>
                                <span class="asterisk-red">*</span>
                            </div>
                        </div>
                        <div class="form-group row mb-2 d-flex align-items-center">
                            <label class="col-md-2 col-form-label" for="certification"><?= get_phrase('certification'); ?></label>
                            <div class="col-md-3 mb-1 d-flex align-items-center">
                                <input type="text" id="certification" name="certificate_institution" class="form-control" placeholder="<?= get_phrase("institution") ?>" required>
                                <span class="asterisk-red">*</span>
                            </div>
                            <div class="col-md-3 mb-1 d-flex align-items-center">
                                <select required name="certificate_year" id="certificate_year" class="form-control" >
                                    <option value="">--<?= get_phrase("year_completed") ?>--</option>
                                    <?php for($i = date("Y"); $i > date("Y") - 100; $i--){?>
                                        <option value="<?= $i ?>" ><?= $i ?></option>
                                    <?php } ?>
                                </select>
                                <span class="asterisk-red">*</span>
                            </div>
                            <div class="col-md-3 mb-1 d-flex align-items-center">
                                <input type="file" class="form-control" id="file" name="certificate_document" id="certificate_document" required >
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-8">
                                <input class="btn btn-primary " data-repeater-delete type="button" value="Delete" />
                            </div>
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary float-lg-right" data-repeater-create type="button" value="Add" />
            </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"><?= get_phrase('picture'); ?></label>
            <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?= base_url('uploads/users/placeholder.jpg'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> <?= get_phrase('upload_an_image'); ?> </label>
                            <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

        <div class="text-center">
            <button aria-label="submit" type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4"><?= get_phrase('add_student'); ?></button>
        </div>
    </div>
</form>


<script type="text/javascript">
    let form;
    $(".ajaxForm").submit(function(e) {
    form = $(this);
    ajaxSubmit(e, form, refreshForm);
    });
    const refreshForm = function () {
        form.trigger("reset");
    }
    const addDisabilityToggle = (value, inputElem) => {
        if(value.checked){
            $(`#${inputElem}`).removeClass("d-none");
            $(`#${inputElem}`).addClass("d-block");
            $("#txtDisability").html("Yes")
        }else{
            $(`#${inputElem}`).removeClass("d-block");
            $(`#${inputElem}`).addClass("d-none");
            $("#disability").removeClass("d-block");
            $("#disability").addClass("d-none");   
            $("#txtDisability").html("No")         
        }
    }
    $(document).ready(function () {
        $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            initEmpty: false,
            // (Optional)
            // "defaultValues" sets the values of added items.  The keys of
            // defaultValues refer to the value of the input's name attribute.
            // If a default value is not specified for an input, then it will
            // have its value cleared.
            defaultValues: {
            },
            // (Optional)
            // "show" is called just after an item is added.  The item is hidden
            // at this point.  If a show callback is not given the item will
            // have $(this).show() called on it.
            show: function () {
                $(this).slideDown();
            },
            // (Optional)
            // "hide" is called when a user clicks on a data-repeater-delete
            // element.  The item is still visible.  "hide" is passed a function
            // as its first argument which will properly remove the item.
            // "hide" allows for a confirmation step, to send a delete request
            // to the server, etc.  If a hide callback is not given the item
            // will be deleted.
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            // (Optional)
            // You can use this if you need to manually re-index the list
            // for example if you are using a drag and drop library to reorder
            // list items.
            ready: function (setIndexes) {
            },
            // (Optional)
            // Removes the delete button from the first list item,
            // defaults to false.
            isFirstItemUndeletable: true
        })
    });
</script>
