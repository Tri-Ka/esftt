<div class="col-md-4 text-right">

    <h2>Adresse</h2>

    <address class="vcard">
      <span class="adr">
        <strong><?php echo $info->getCompany(); ?></strong><br>
        <span class="street-address"><?php echo $info->getAddress() ;?></span> -
        <span class="locality"><?php echo $info->getCity() ;?></span>,
        <span class="postal-code"><?php echo $info->getZipcode() ;?></span>
      </span>
    </address>

    <div class="gmap">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5238.928440432613!2d2.185608156273156!3d48.96368701030912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6613887156c0b%3A0x3f8f94d931042175!2s2+Avenue+des+Lilas%2C+95530+La+Frette-sur-Seine!5e0!3m2!1sfr!2sfr!4v1415888793673" width="400" height="300" frameborder="0" style="border:0"></iframe>
    </div>

</div>