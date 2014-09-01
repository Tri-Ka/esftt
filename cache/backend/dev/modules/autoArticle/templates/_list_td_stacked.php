<td colspan="3">
  <?php echo __('%%title%% - %%is_published%% - %%published_at%%', array('%%title%%' => link_to($article->getTitle(), 'article_edit', $article), '%%is_published%%' => get_partial('article/list_field_boolean', array('value' => $article->getIsPublished())), '%%published_at%%' => false !== strtotime($article->getPublishedAt()) ? format_date($article->getPublishedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
