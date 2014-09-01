<td colspan="4">
  <?php echo __('%%id%% - %%name%% - %%description%% - %%gallery_id%%', array('%%id%%' => link_to($picture->getId(), 'picture_edit', $picture), '%%name%%' => $picture->getName(), '%%description%%' => $picture->getDescription(), '%%gallery_id%%' => $picture->getGalleryId()), 'messages') ?>
</td>
