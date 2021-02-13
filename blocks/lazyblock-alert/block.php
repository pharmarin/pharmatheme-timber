<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php switch ($attributes['type']) {
    default:
        $class = "";
        $icon = "";
    case 'warning':
        $class = "bg-yellow-50 text-yellow-800";
        $icon = "exclamation-triangle";
        break;
    case 'danger':
        $class = "bg-red-50 text-red-900";
        $icon = "times-circle";
        break;
} ?>

<div class="mb-2 px-4 py-2 rounded-md shadow-inner <?php echo $class ?>">
  <i class="fa fa-<?php echo $icon ?> mr-2"></i>
  <?php echo $attributes["commentaire"] ?>
</div>