<td colspan="3">
  <?php echo __('%%id%% - %%name%% - %%description%%', array('%%id%%' => link_to($gallery->getId(), 'gallery_edit', $gallery), '%%name%%' => $gallery->getName(), '%%description%%' => $gallery->getDescription()), 'messages') ?>
</td>
