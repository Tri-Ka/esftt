<div class="col col-1-3">

    <h2>Adresse</h2>

    <!-- <address>
      <strong><?php echo $info->company; ?></strong><br>
        <?php echo $info->address; ?><br>
        <?php echo $info->city; ?>, <?php echo $info->zipcode; ?><br>
      <abbr title="Phone"><?php echo $info->phone; ?></abbr>
    </address>
    <address>
      <strong><?php echo $info->fullname; ?></strong><br>
      <a href="mailto:#"><?php echo $info->email; ?></a>
    </address> -->

    <address class="vcard">
      <span class="adr">
        <strong><?php echo $info->getCompany(); ?></strong><br>
        <span class="street-address"><?php echo $info->getAddress() ;?></span> -
        <span class="locality"><?php echo $info->getCity() ;?></span>,
        <span class="postal-code"><?php echo $info->getZipcode() ;?></span>
      </span>
    </address>
    <iframe id="iframe-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20953.80731234868!2d2.2055734620849465!3d48.96822380784458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6613887156c0b%3A0x3f8f94d931042175!2s2+Avenue+des+Lilas%2C+95530+La+Frette-sur-Seine!5e0!3m2!1sfr!2sfr!4v1410953883080"></iframe>

</div>