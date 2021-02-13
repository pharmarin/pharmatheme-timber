<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php $precautions = [];
$warning = [
  'class' => "bg-yellow-50 text-yellow-900",
  'icon' => "exclamation-triangle"
];
$danger = [
  'class' => "bg-red-50 text-red-900",
  'icon' => "times-circle"
];
$success = [
  'class' => "bg-green-50 text-green-900"
];
if ($attributes['femme_enceinte_ok']) {
	$precautions[] = [
		'text' => 'Peut être utilisé chez la femme enceinte. '
	] + $success;
}
if ($attributes['femme_enceinte_ci']) {
	$precautions[] = [
		'text' => 'Ne pas utiliser chez la femme enceinte. '
	] + $danger;
}
if ($attributes['femme_allaitante_ok']) {
	$precautions[] = [
		'text' => 'Peut être utilisé chez la femme allaitante. '
	] + $success;
}

if ($attributes['femme_allaitante_ci']) {
	$precautions[] = [
		'text' => 'Ne pas utiliser chez la femme allaitante. '
	] + $danger;
}
if ($age_minimal = $attributes['age_minimal']) {
	$precautions[] = [
		'text' => 'Ne pas utiliser avant '.$age_minimal.' ans. '
	] + $warning;
}
if (!empty($attributes['precaution'][0]['precaution_status']) && !empty($attributes['precaution'][0]['precaution_commentaire'])) {
    foreach ($attributes['precaution'] as $prec) {
      $precautions[] = [
        'text' => $prec['precaution_commentaire']
      ] + ($prec["precaution_status"] === "1" ? $warning : $danger);
    }
  } ?>
  
<div class="mb-4">
  <?php if (get_post_type() !== "produit") : ?>
    <div class="mb-1 text-lg font-bold">Précautions d'utilisation</div>
  <?php endif; ?>
  <div class="mb-4 space-y-2">
    <?php foreach ($precautions as $precaution) : ?>
      <div class="px-4 py-2 rounded-md shadow-inner <?php echo $precaution["class"] ?>">
        <i class="fa fa-<?php echo $precaution["icon"] ?> mr-2"></i>
        <?php echo $precaution["text"] ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>