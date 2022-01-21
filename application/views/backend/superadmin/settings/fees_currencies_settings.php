<?php 
    $currencies                     = $this->settings_model->get_currencies(); 
    $fees_local_currency_settings   = $this->settings_model->get_fee_local_currency(); 
    $fees_foreign_currency_settings = $this->settings_model->get_fee_foreign_currency(); 
?>
<div class="row justify-content-md-center">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" class="col-12 feeCurrenciesForm" action="<?= route('fees_currencies/update'); ?>" id = "fee_currencies">
                    <div class="col-12">
                        <h4 class="title mb-4">
                            <?= ucfirst(get_phrase("set_fees_for_different_types_of_students")); ?>
                        </h4>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="local_students_currency"><?= get_phrase('local_students_currency') ; ?></label>
                            <div class="col-md-9">
                                <select class="form-control select2" data-toggle = "select2" name="local_students_currency" id="local_students_currency" required>
                                    <option value=''>--<?= get_phrase("choose") ?>--</option>
                                    
                                    <?php foreach($currencies as $currency){ ?>
                                        <option <?= $fees_local_currency_settings["currency_id"] == $currency["id"] ? "selected" : "" ?> value="<?= $currency['id']; ?>"><?= $currency['symbol'] . " - " . $currency["code"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="foreign_students_currency"><?= get_phrase('foreign_students_currency') ; ?></label>
                            <div class="col-md-9">
                                <select class="form-control select2" data-toggle = "select2" name="foreign_students_currency" id="foreign_students_currency" required>
                                    <option value=''>--<?= get_phrase("choose") ?>--</option>
                                    <?php 
                                        /* Loaded currencies from db on line 12*/
                                        foreach($currencies as $currency){ ?>
                                        <option <?= $fees_foreign_currency_settings["currency_id"] == $currency["id"] ? "selected" : "" ?> value="<?= $currency['id']; ?>"><?= $currency['symbol'] . " - " . $currency["code"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-6 col-md-12 col-sm-12" onclick="updateFeeCurrencies()"><?= get_phrase('update') ; ?></button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>
