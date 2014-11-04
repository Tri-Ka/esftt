<div>

    <h2>Adresse</h2>

    <address class="vcard">
      <span class="adr">
        <strong><?php echo $info->getCompany(); ?></strong><br>
        <span class="street-address"><?php echo $info->getAddress() ;?></span> -
        <span class="locality"><?php echo $info->getCity() ;?></span>,
        <span class="postal-code"><?php echo $info->getZipcode() ;?></span>
      </span>
    </address>


</div>