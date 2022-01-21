<?php
$books = $this->crud_model->get_books()->result_array();
?>
<?php if (count($books) > 0): ?>
  <div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead class="thead-dark">
        <tr>
          <th><?= get_phrase('book_name'); ?></th>
          <th><?= get_phrase('author'); ?></th>
          <th><?= get_phrase('copies'); ?></th>
          <th><?= get_phrase('available_copies'); ?></th>
          <th><?= get_phrase('option'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($books as $book): ?>
          <tr>
            <td> <?= $book['name']; ?> </td>
            <td> <?= $book['author']; ?> </td>
            <td> <?= $book['copies']; ?> </td>
            <td>
              <?php
                $number_of_issued_book = $this->crud_model->get_number_of_issued_book_by_id($book['id']);
                echo $book['copies'] - $number_of_issued_book;
                ?>
            </td>
            <td>
              <div class="dropdown text-center">
      					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
      					<div class="dropdown-menu dropdown-menu-right">
      						<!-- item-->
      						<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?= site_url('modal/popup/book/edit/'.$book['id'])?>', '<?= get_phrase('update_book'); ?>');"><?= get_phrase('edit'); ?></a>
      						<!-- item-->
      						<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?= route('book/delete/'.$book['id']); ?>', showAllBooks )"><?= get_phrase('delete'); ?></a>
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
