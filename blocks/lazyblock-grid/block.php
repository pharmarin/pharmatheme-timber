<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<div class="mb-4 grid grid-cols-<?php echo $attributes["cols"] ?> gap-<?php echo $attributes["gap"] ?>">
  <?php echo $attributes["content"] ?>
</div>