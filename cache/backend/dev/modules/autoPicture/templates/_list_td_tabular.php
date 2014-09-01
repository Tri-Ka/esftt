<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($picture->getId(), 'picture_edit', $picture) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $picture->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $picture->getDescription() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_gallery_id">
  <?php echo $picture->getGalleryId() ?>
</td>
