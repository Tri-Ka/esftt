<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($article->getTitle(), 'article_edit', $article) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_published">
  <?php echo get_partial('article/list_field_boolean', array('value' => $article->getIsPublished())) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_published_at">
  <?php echo false !== strtotime($article->getPublishedAt()) ? format_date($article->getPublishedAt(), "f") : '&nbsp;' ?>
</td>
