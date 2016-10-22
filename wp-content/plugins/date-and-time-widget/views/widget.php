<!-- This file is used to markup the public-facing widget. -->
<div id="date-time" class="date-time" style="color: <?php echo $text_color ?>;
  background-color: <?php echo $background_color ?>;
  font-family: <?php echo $font_family ?>;
    /*$font_size*/
  font-size: <?php echo '1.6875em' ?>;">
  <div class="date"></div>
  <div class="time"></div>
</div>
<script type="text/javascript">
  update('<?php echo $args["widget_id"]; ?>',
    '<?php echo $time_format; ?>',
    '<?php echo $date_format; ?>');
</script>
