<?php
function dashButton(string $url, string $icon, string $primaryText)
{
?>

    <div class="col-sm-12 col-md-4 pb-5">
        <a href="<?= $url ?>">
            <div class="card primary-color text-white align-items-center pt-3">
                <i class="fa-solid fa-<?= $icon ?> fa-3x"></i>
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $primaryText ?></h5>
                </div>
            </div>
        </a>
    </div>

<?php } ?>