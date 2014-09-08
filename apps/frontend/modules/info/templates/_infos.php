<div class="col col-1-3">

    <h2>Adresse</h2>
    <p>
      <?php echo $info->address; ?>
    </p>
    <address>
      <strong>Twitter, Inc.</strong><br>
        <?php echo $info->address; ?><br>
        <?php echo $info->city; ?>, <?php echo $info->zipcode; ?><br>
      <abbr title="Phone"><?php echo $info->phone; ?></abbr>
    </address>
    <address>
      <strong><?php echo $info->fullname; ?></strong><br>
      <a href="mailto:#"><?php echo $info->email; ?></a>
    </address>
    <p><a class="btn" href="#">En savoir plus <i class="icon-chevron-right"></i></a></p>
</div>