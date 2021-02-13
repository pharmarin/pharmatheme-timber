<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php $id = get_the_ID(); $card_class = "p-4 shadow-lg rounded-md" ?>

<div class="grid grid-cols-1 gap-4 mb-4">
  <?php if ($famille = get_the_term_list($id, 'famille', '', ', ')) : ?>
    <div class="<?php echo $card_class ?>">
      <i class="far fa-folder-open"></i>
      Famille des <?php echo $famille ?>
    </div>
  <?php endif; ?>
  
  <?php if ($drogues = get_the_term_list($id, 'drogues_vegetales', '', ', ')) : ?>
    <div class="<?php echo $card_class ?>">
      <i class="fab fa-pagelines"></i>
      Organe(s) distillé(s) : <?php echo $drogues ?>
    </div>
  <?php endif; ?>
  
  <?php if ($composition = $attributes['composition']) : ?>
    <div class="<?php echo $card_class ?>">
      <i class="far fa-atom"></i>
      Molécule(s) principale(s) : <?php echo implode(', ', array_map(function ($principe_actif) {
        $molecule = $principe_actif['molecule'];
        $molecule_link = get_term_link(get_term_by('name', $molecule, 'principes_actifs'), 'principes_actifs'); 
        return '<a href="'.$molecule_link.'">'.$molecule.'</a>';
      }, $composition)) ?>
    </div>
  <?php endif; ?>
  
  <?php if ($origines = get_the_term_list($id, 'origines_geographiques', '', ', ')) : ?>
    <div class="<?php echo $card_class ?>">
      <i class="far fa-globe-americas"></i>
      Origine(s) : <?php echo $origines ?>
    </div>
  <?php endif; ?>
</div>