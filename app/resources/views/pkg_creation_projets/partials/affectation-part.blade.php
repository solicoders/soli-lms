<div class="step" data-target="#affectation-part">
    <button type="button" class="step-trigger" role="tab" aria-controls="affectation-part" id="affectation-part-trigger">
        <span class="bs-stepper-circle">3</span>
        <span class="bs-stepper-label">Affectation</span>
    </button>
</div>

<div class="bs-stepper-content">
    <!-- your steps content here -->
    <div id="affectation-part" class="content" role="tabpanel"
        aria-labelledby="affectation-part-trigger">
        <div class="d-flex flex-column mt-3 form-check">
            <input type="checkbox" id="checkAll" class="form-check-input"
                id="flexCheckIndeterminate">
            <label class="form-check-label"
                for="flexCheckIndeterminate">Tout
                cocher<br>
                <?php
                $apprenants = [
                    "sarsri imrane",
                    "Grain Reda",
                    "Bouik Hussein",
                    "Assaid Amina",
                    "zaani hamza",
                    "FAIZ SAFAA",
                    "El ajoumi Mohammed aymane",
                    "Lharrak Adnan",
                    "YASMINE DAIFANE",
                    "BEN NASAR ADNAN",
                    "Achaou Hamid",
                    "Betroji Jalil",
                    "lamchatab amine",
                    "Boukhar Soufiane"
                ];
                ?>

                <div class="row">
                    <?php foreach ($apprenants as $apprenant): ?>
                        <div class="col-sm-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    name="apprenants[]"
                                    value="<?php echo $apprenant; ?>" checked>
                                <label class="form-check-label"
                                    for="<?php echo $apprenant; ?>">
                                    <?php echo $apprenant; ?>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </label>
        </div>

        <button class="btn btn-primary"
            onclick="stepper.previous()">Précédent</button>
        <a href="./index.php" type="submit"
            class="btn btn-primary">Ajouter</a>
    </div>
</div>