<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php
  $post_id = url_to_postid($attributes['produit']);
  $post = get_post($post_id);
  $laboratoire = get_the_terms($post, 'laboratoire');
?>
<a href="<?php echo get_permalink($post_id);?>">
  <div class="flex flex-row max-w-xs rounded-md border border-gray-300">
    <img class="w-24 h-24 object-contain" src="<?php echo get_the_post_thumbnail_url($post) ?>" />
    <div class="px-1 py-4 overflow-hidden">
      <div class="text-xl font-bold truncate"><?php echo $post->post_title; ?></div>
      <div class="text-lg font-light truncate"><?php echo $laboratoire[0]->name; ?></div>
    </div>
  </div>
</a>