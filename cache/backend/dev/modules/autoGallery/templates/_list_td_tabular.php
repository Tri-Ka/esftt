<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($gallery->getId(), 'gallery_edit', $gallery) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $gallery->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $gallery->getDescription() ?>
</td>
