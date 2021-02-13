<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<div class="p-4 border border-gray-300 rounded-lg">
  <?php if ($titre = $attributes['titre']) : ?>
    <div class="font-bold mb-2"><?php echo $titre ?></div>
  <?php endif; ?>
  <table class="mb-2 w-full table-auto border border-gray-300">
    <tbody>
      <?php foreach ($attributes['ingredients'] as $ingredient) : ?>
        <tr>
          <td class="p-2 border border-gray-300">
            <?php echo $ingredient['ingredient'] ?>
          </td>
          <td class="p-2 border border-gray-300">
            <?php echo $ingredient['quantite'] ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="mb-2">
    <?php echo $attributes['instructions'] ?>
  </div>
  <?php if ($source = get_post(url_to_postid($attributes['source']))) : ?>
    <div class="text-sm italic">
      Source : <span class="text-gray-500">
        <?php echo $source->post_title ?>
      </span>
    </div>
  <?php endif; ?>
</div>