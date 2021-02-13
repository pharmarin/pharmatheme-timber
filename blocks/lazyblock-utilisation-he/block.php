<?php
/**
 * Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php $utilisations_array = [];
$utilisations = $attributes;

$ambiance['title'] = "Ambiance olfactive";
$ambiance['recos'] = $utilisations['ambiance_recos'];
$ambiance['commentaire'] = $utilisations['ambiance_commentaire'];
$utilisations_array[] = $ambiance;

$diffusion['title'] = "Diffusion atmosphérique";
$diffusion['recos'] = $utilisations['diffusion_recos'];
$diffusion['commentaire'] = $utilisations['diffusion_commentaire'];
$utilisations_array[] = $diffusion;

$application['title'] = "Application cutanée";
$application['recos'] = $utilisations['application_recos'];
$application['commentaire'] = $utilisations['application_commentaire'];
$utilisations_array[] = $application;

$orale['title'] = "Prise orale";
$orale['recos'] = $utilisations['orale_recos'];
$orale['commentaire'] = $utilisations['orale_commentaire'];
$utilisations_array[] = $orale;

$inhalation_seche['title'] = "Inhalation sèche";
$inhalation_seche['recos'] = $utilisations['inhalation_seche_recos'];
$inhalation_seche['commentaire'] = $utilisations['inhalation_seche_commentaire'];
$utilisations_array[] = $inhalation_seche;

$inhalation_humide['title'] = "Inhalation humide";
$inhalation_humide['recos'] = $utilisations['inhalation_humide_recos'];
$inhalation_humide['commentaire'] = $utilisations['inhalation_humide_commentaire'];
$utilisations_array[] = $inhalation_humide;

$sauna_facial['title'] = "Sauna facial";
$sauna_facial['recos'] = $utilisations['sauna_facial_recos'];
$sauna_facial['commentaire'] = $utilisations['sauna_facial_commentaire'];
$utilisations_array[] = $sauna_facial;

$card_class = "p-4 shadow-lg rounded-md";
$danger = "bg-red-50 text-red-900";
$success = "bg-green-50 text-green-900"; ?>

<div class="mb-1 text-lg font-bold">Utilisation</div>

<div class="mb-4 grid grid-cols-1 gap-4">
  <?php foreach ($utilisations_array as $utilisation) :
    if (!empty($utilisation['recos']) && $utilisation['recos'] != "0" || !empty($utilisation['commentaire'])) : ?>
      <div class="<?php
        echo $card_class .  " ";
        switch ($utilisation['recos']) {
          case "-1": echo $danger; break; 
          case "1":
          case "2":
          case "3": echo $success; break;
          default: break;
        }
      ?>">
        <?php if ($utilisation['recos'] > 0) echo str_repeat('<i class="far fa-star"></i>', $utilisation['recos']) ?>
        <?php echo $utilisation['title'] ?>
      </div>
    <?php endif;
  endforeach; ?>
</div>