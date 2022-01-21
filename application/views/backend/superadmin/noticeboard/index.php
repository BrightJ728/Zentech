<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-calendar-clock title_icon"></i> <?= get_phrase('noticeboard_calendar'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?= site_url('modal/popup/noticeboard/create'); ?>', '<?= get_phrase('add_new_notice'); ?>')"> <i class="mdi mdi-plus"></i> <?= get_phrase('add_new_notice'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12 noticeboard_content">
    <?php include 'list.php'; ?>
  </div>
</div>

<script>
$(document).ready(function() {
  refreshNoticeCalendar();
});

var showAllNotices = function () {
  var url = '<?= route('noticeboard/list'); ?>';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.noticeboard_content').html(response);
      refreshNoticeCalendar();
    }
  });
}

var refreshNoticeCalendar = function () {
  var url = '<?= route('noticeboard/all_notices'); ?>';
  $.ajax({
    type : 'GET',
    url: url,
    dataType: 'json',
    success : function(response) {

      var notice_calendar = [];
      for(let i = 0; i < response.length; i++) {

        var obj;
        obj  = {"id": response[i].id, "title" : response[i].notice_title, "start" : response[i].date, "end" : response[i].date};
        notice_calendar.push(obj);
      }

      $('#calendar').fullCalendar({
        disableDragging: true,
        events: notice_calendar,
        displayEventTime: false,
        eventClick : function(info) {
          rightModal('<?= site_url('modal/popup/noticeboard/edit/'); ?>'+info.id, '<?= get_phrase('edit_notice'); ?>')
        },
        dayClick: function(date) {
            rightModal('<?= site_url('modal/popup/noticeboard/create/'); ?>'+date.format(), '<?= get_phrase('add_new_notice'); ?>')
        }
      });
    }
  });
}
</script>
