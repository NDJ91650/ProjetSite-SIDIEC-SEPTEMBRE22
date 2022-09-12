<div class='row'>
                        <div class='col form-group'>
                            <label for='type-contrat-souhaite'>40. Type de contrat souhaité :</label>
                            <select class='custom-select' id='type-contrat-souhaite' name='type_contrat_souhaite'>
                                <option selected required='required'>Selectionner votre réponse</option>
                                <option value='Temps complet'>Temps complet</option>
                                <option value='Temps partiel'>Temps partiel</option>
                                <option value='Temps partiel et temps partiel'>Temps partiel et temps partiel</option>
                            </select>
                        </div>
                        <br>
                        <div class='col form-group'>
                            <label for='nb-heures-souhaite'>6. Nombre d'heures souhaité :</label>
                            <input type='text' class='form-control' id='nb-heures-souhaite' name='nb_heures_souhaite' placeholder='Saisir votre nombre d'heures souhaité'>
                        </div>
                    </div>
                    <br>
                    <div class='row'>
                        <div class='col form-group'>
                            <label for='motif-demande'>38. Motif de la demande :</label>
                            <select class='custom-select' id='motif-demande' name='motif_demande'>
                                <option selected required='required'>Selectionner votre réponse</option>
                                <option value='Impératifs familiaux'>Impératifs familiaux</option>
                                <option value='Raisons médicales'>Raisons médicales</option>
                                <option value='Vie religieuse'>Vie religieuse</option>
                                <option value='Autre'>Autre</option>
                            </select>
                        </div>
                        <br>
                        <div class='col form-group'>
                            <label for='autre_motif'>Si 'Autre', vous avez la possibilité d'expliquer le motif :</label>
                            <input type='text' class='form-control' id='autre-motif' name='autre_motif'>
                        </div>
                    </div>
                    <br>
                    <div class='form-group'>
                        <label for='justificatif-motif'>39. Joindre votre justificatif de motif de demande :</label><br>
                        <input type='text' class='form-control' id='justificatif-motif' name='justificatif_motif'>
                        <!-- <input type='file' name='justificatif_motif' id='justificatif-motif' accept='application/pdf, application/docx, application/doc, application/odt' title='Taille maximale autorisée: 2Mo'> -->
                        <!-- SÉCURITÉ ANTI BOT -->
                        <!-- <input type='hidden' name='MAX_FILE_SIZE' value='2097152'> -->
                    </div>