<?php $languages = $this->settings_model->get_all_languages();
foreach ($languages as $language): ?>
<!-- item-->
<a href="<?= route('language/active/'.$language); ?>" class="dropdown-item notify-item">
	<span class="<?php if(get_settings('language') == $language): ?> badge badge-secondary-lighten <?php endif;?>"><?= ucfirst($language); ?></span>
</a>
<?php endforeach; ?>
