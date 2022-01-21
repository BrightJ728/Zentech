<?php $languages = $this->settings_model->get_all_languages(); ?>
<?php if (count($languages) > 0): ?>
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th><?=  get_phrase('name') ;?></th>
                    <th><?=  get_phrase('option') ;?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($languages as $language): ?>
                    <tr>
                        <td>
                            <?=  ucfirst($language);?>
                            <?php if (get_settings('language') == $language): ?>
                                <i class="mdi mdi-check-circle" style="color: #4CAF50;"></i>
                            <?php endif; ?>
                         </td>
                        <td>
                          <div class="dropdown text-center">
                            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?=  site_url('modal/popup/language/phrase/'.$language) ;?>', '<?=  get_phrase('update_phrases_for') ;?> <?=  $language ;?>')"><?= get_phrase('update_phrases'); ?></a>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/language/edit/'.$language)?>', '<?= get_phrase('update_language'); ?>');"><?= get_phrase('update_language'); ?></a>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('language/delete/'.$language); ?>', showAllLanguages )"><?= get_phrase('delete_language'); ?></a>
                            </div>
                          </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
