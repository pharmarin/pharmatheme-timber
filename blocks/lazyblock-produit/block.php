<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php $labels = [
  'indication' => 'Indication',
  'composition' => 'Composition',
  'action' => 'Mode d\'action',
  'utilisation' => 'Posologie',
  'conseils' => 'Conseils associés',
  'avantages' => 'Plus produit',
  'precautions' => 'Précautions d\'utilisation'
]; ?>

<div class="w-full border border-gray-300 divide-y rounded-md">
  <?php foreach ($labels as $slug => $label) :
    $contenu = $attributes[$slug];
    if (empty(trim(strip_tags($contenu)))) continue; ?>
    <div class="px-4 py-2 bg-gray-50 text-gray-600 first:rounded-t-md">
      <?php echo $label ?>
    </div>
    <div class="px-4 py-2">
      <?php echo $contenu ?>
    </div>
  <?php endforeach; ?>
</div>