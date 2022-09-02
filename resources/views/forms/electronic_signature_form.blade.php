<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele - Formulaire - Signature &eacute;lectronique</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="w-auto min-h-screen py-4 bg-gray-100/2">
        <div class="pt-4 pb-8">
            <img src="{{ asset('logo.png') }}" alt="Yeele" class="w-32 mx-auto">
            <p class="text-center text-gray-500 mt-4 text-sm"><a href="https://www.yeele-event.com/"
                    class="font-semibold" target="__blank" style="color: blue !important;">yeele-event.com</a>,
                plateforme de gestion digitale des événements propulsée par <a href="https://www.horinfo.com/"
                    class="font-semibold" target="__blank" style="color: blue !important;">HORINFO</a></p>
        </div>
        <div class="bg-slate-100 w-11/12 rounded-lg border border-gray-200 shadow-sm mx-auto" style="max-width: 550px;">

            <div class="p-4 border-b text-center font-semibold">
                <h1>QUESTIONNAIRE</h1>
            </div>

            <form action="{{ route('signature_form_submit') }}" method="POST" class="px-4 py-8">
                @csrf

                <div class="mb-5">
                    <h3 class="font-semibold">1. Savez-vous ce qu'est une signature électronique? </h3>
                    <div class="flex items-center my-4">
                        <input id="yes_i_know" type="radio" value="OUI, je sais" name="knownledge_about"
                            class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                        <label for="yes_i_know" class="ml-2 text-sm font-medium text-gray-900">OUI, je sais</label></br>
                    </div>
                    <div class="flex items-center my-4">
                        <input id="no_i_dont_know" type="radio" value="NON, je ne sais pas du tout"
                            name="knownledge_about"
                            class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                        <label for="no_i_dont_know" class="ml-2 text-sm font-medium text-gray-900">NON, je ne sais pas
                            du tout</label>
                    </div>
                </div>
                <div class="mb-5">
                    <h3 class="font-semibold">2. Pensez vous que scanner sa signature manuscrite (sur papier) et
                        l'insérer dans son Cv (dans le logiciel traitement de texte) est : </h3>
                    <div class="flex items-center my-4">
                        <input id="numeric_signature" type="radio" value=" Utiliser une signature numérique"
                            name="usage"
                            class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                        <label for="numeric_signature" class="ml-2 text-sm font-medium text-gray-900"> Utiliser une
                            signature numérique</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="usage_electronic_signature" type="radio"
                            value="Utiliser une signature électronique" name="usage"
                            class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                        <label for="usage_electronic_signature" class="ml-2 text-sm font-medium text-gray-900">utiliser
                            une signature électronique</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="manuscrit_signature" type="radio" value="Utiliser une signature manuscrite"
                            name="usage"
                            class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                        <label for="manuscrit_signature" class="ml-2 text-sm font-medium text-gray-900">Utiliser une
                            signature manuscrite</label>
                    </div>

                    <div class="mb-5">
                        <h3 class="font-semibold">3. Avez-vous déjà signé électroniquement? </h3>
                        <div class="flex items-center my-4">
                            <input id="yes_i_do" type="radio" value="OUI" name="have_you_ever_signed"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="yes_i_do" class="ml-2 text-sm font-medium text-gray-900">OUI</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="no_i_never_signed_before" type="radio" value="NON"
                                name="have_you_ever_signed"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="no_i_never_signed_before" class="ml-2 text-sm font-medium text-gray-900">NON, je
                                sais pas</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">4. Si oui était-ce avec des partenaires locaux ou internationaux ?
                        </h3>
                        <div class="flex items-center my-4">
                            <input id="local_partners" type="radio" value="Des parténaires locaux"
                                name="we_signed_with"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="local_partners" class="ml-2 text-sm font-medium text-gray-900">Des parténaires
                                locaux</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="international_partners" type="radio" value="Des parténaires internationaux"
                                name="we_signed_with"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="international_partners" class="ml-2 text-sm font-medium text-gray-900">Des
                                parténaires internationaux</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">5. Si oui était-ce avec des organismes privés ou des bailleurs de
                            fonds? </h3>
                        <div class="flex items-center my-4">
                            <input id="private_orgs" type="radio" value="Des organismes privés"
                                name="type_of_partners"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="private_orgs" class="ml-2 text-sm font-medium text-gray-900">Des organismes
                                privés</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="passive_orgs" type="radio" value="Des bailleurs de fonds"
                                name="type_of_partners"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="passive_orgs" class="ml-2 text-sm font-medium text-gray-900">Des bailleurs de
                                fonds</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">6. L'int&eacute;r&ecirc;t de la signature &eacute;lectronique pour
                            vous, c'est avant tout (2 r&eacute;ponses maximum) : </h3>
                        <div class="flex items-center my-4">
                            <input id="simplicity" name="interest[]" type="checkbox" value="la simplicit&eacute;"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="simplicity"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">la
                                simplicit&eacute;</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="fastness" name="interest[]" type="checkbox" value="la rapidit&eacute;"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="fastness" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">la
                                rapidit&eacute;</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="delay" name="interest[]" type="checkbox"
                                value="le d&eacute;lai raccourci pour faire signer plusieurs parties"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="delay" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">le
                                d&eacute;lai raccourci pour faire signer plusieurs parties</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="security" name="interest[]" type="checkbox"
                                value="la s&eacute;curit&eacute; juridique"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="security" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">la
                                s&eacute;curit&eacute; juridique</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="paper_replacement" name="interest[]" type="checkbox"
                                value="l'opportunit&eacute; de supprimer le papier"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="paper_replacement"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">l'opportunit&eacute;
                                de supprimer le papier</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">7. Concernant la signature &eacute;lectronique, est-elle dans votre
                            organisation : </h3>
                        <div class="flex items-center my-4">
                            <input id="since_many_years" type="radio"
                                value="d&eacute;j&agrave; en place depuis plusieurs ann&eacute;es" name="intro_date"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="since_many_years"
                                class="ml-2 text-sm font-medium text-gray-900">d&eacute;j&agrave; en place depuis
                                plusieurs ann&eacute;es</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="since_last_year" type="radio"
                                value="d&eacute;j&agrave; en place depuis l'ann&eacute;e derni&egrave;re"
                                name="intro_date"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="since_last_year"
                                class="ml-2 text-sm font-medium text-gray-900">d&eacute;j&agrave; en place depuis
                                l'ann&eacute;e derni&egrave;re</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="this_year" type="radio" value="mise en place en 2022" name="intro_date"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="this_year" class="ml-2 text-sm font-medium text-gray-900">mise en place en
                                2022</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="envisaged_for_this_year" type="radio" value="c'est p&eacute;vu pour 2022"
                                name="intro_date"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="envisaged_for_this_year" class="ml-2 text-sm font-medium text-gray-900">c'est
                                p&eacute;vu pour 2022</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="envisaged_from_2023" type="radio"
                                value="c'est p&eacute;vu &agrave; partir de 2023" name="intro_date"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="envisaged_from_2023" class="ml-2 text-sm font-medium text-gray-900">c'est
                                p&eacute;vu &agrave; partir de 2023</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="not_envisaged" type="radio" value="ce n'est pas pr&eacute;vu"
                                name="intro_date"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="not_envisaged" class="ml-2 text-sm font-medium text-gray-900">ce n'est pas
                                pr&eacute;vu</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">8. Selon vous, la signature &eacute;lectronique a-t-elle la
                            m&ecirc;me valeur que la signature manuscrite ? </h3>
                        <div class="flex items-center my-4">
                            <input id="yes" type="radio" value="OUI, la m&ecirc;me valeur"
                                name="signature_value"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="yes" class="ml-2 text-sm font-medium text-gray-900">OUI, la m&ecirc;me
                                valeur</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="no_more_value" type="radio" value="NON, elle a davantage de valeur"
                                name="signature_value"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="no_more_value" class="ml-2 text-sm font-medium text-gray-900">NON, elle a
                                davantage de valeur</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="no_lesser_value" type="radio" value="NON, elle a moins de valeur"
                                name="signature_value"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="no_lesser_value" class="ml-2 text-sm font-medium text-gray-900">NON, elle a
                                moins de valeur</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">9. Selon vous, tout le monde devrait avoir sa signature
                            &eacute;lectronique ou seulement certaines personnes qui doivent signer des documents
                            importants ? </h3>
                        <div class="flex items-center my-4">
                            <input id="everyone_should_have" type="radio"
                                value="Tout le monde devrait en avoir une" name="having_signature"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="everyone_should_have" class="ml-2 text-sm font-medium text-gray-900">Tout le
                                monde devrait en avoir une</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="only_some" type="radio"
                                value="Seulement certaines personnes devraient en avoir une" name="having_signature"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="only_some" class="ml-2 text-sm font-medium text-gray-900">Seulement certaines
                                personnes devraient en avoir une </label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">10. Vous l'utilisez aujourd'hui ou vous pourriez l'utiliser pour...
                        </h3>
                        <div class="flex items-center my-4">
                            <input id="signed_external_files" type="radio"
                                value="signer des documents re&ccedil;us de l'externe" name="usage_type"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="signed_external_files" class="ml-2 text-sm font-medium text-gray-900">signer
                                des documents re&ccedil;us de l'externe</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="signed_files_initiated" type="radio"
                                value="faire signer des documents initi&eacute;s par vous" name="usage_type"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="signed_files_initiated" class="ml-2 text-sm font-medium text-gray-900">faire
                                signer des documents initi&eacute;s par vous</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="both_files_signatures" type="radio" value="les deux" name="usage_type"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="both_files_signatures" class="ml-2 text-sm font-medium text-gray-900">les
                                deux</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="none_of_the_files_signatures" type="radio" value="aucun des deux"
                                name="usage_type"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="none_of_the_files_signatures"
                                class="ml-2 text-sm font-medium text-gray-900">aucun des deux</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">11. Pour quel type de document utilisez-vous ou seriez-vous le plus
                            &agrave; m&ecirc;me d'utiliser la signature &eacute;lectronique ?</h3>
                        <div class="flex items-center my-4">
                            <input id="marketing_contract" name="usage_reason[]" type="checkbox"
                                value="Contrats commerciaux"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="marketing_contract"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contrats
                                commerciaux</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="sell_or_renting_contract" name="usage_reason[]" type="checkbox"
                                value="Contrats de location ou de vente"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="sell_or_renting_contract"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contrats de location
                                ou de vente</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_contract" name="usage_reason[]" type="checkbox"
                                value="Contrats de travail"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="work_contract"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contrats de
                                travail</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="hr_annual_evaluation" name="usage_reason[]" type="checkbox"
                                value="Evaluations RH annuelles"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="hr_annual_evaluation"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Evaluations RH
                                annuelles</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="open_market" name="usage_reason[]" type="checkbox"
                                value="March&eacute;s publics"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="open_market"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">March&eacute;s
                                publics</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="order_form" name="usage_reason[]" type="checkbox" value="Bon de commandes"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="order_form"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bon de
                                commandes</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="recommanded_letter" name="usage_reason[]" type="checkbox"
                                value="Courriers recommand&eacute;s"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="recommanded_letter"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Courriers
                                recommand&eacute;s</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="bills_and_pieces" name="usage_reason[]" type="checkbox"
                                value="Factures et pi&egrave;ces justificatives"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="bills_and_pieces"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Factures et
                                pi&egrave;ces justificatives</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="meeting_decision" name="usage_reason[]" type="checkbox"
                                value="D&eacute;lib&eacute;rations d'assembl&eacute;es (conseils d'administration, municipaux ou r&eacute;gionaux)"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="meeting_decision"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">D&eacute;lib&eacute;rations
                                d'assembl&eacute;es (conseils d'administration, municipaux ou r&eacute;gionaux)</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="financial_account_transmission" name="usage_reason[]" type="checkbox"
                                value="Transmissions de comptes financiers"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="financial_account_transmission"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transmissions de
                                comptes financiers</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="administration_or_assembly_pv" name="usage_reason[]" type="checkbox"
                                value="PV de Conseils d'administration ou d'Assembl&eacute;es g&eacute;n&eacute;rales"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="administration_or_assembly_pv"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PV de Conseils
                                d'administration ou d'Assembl&eacute;es g&eacute;n&eacute;rales</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="some_emails" name="usage_reason[]" type="checkbox" value="Certains emails"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="some_emails"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certains
                                emails</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="other_reason" name="usage_reason[]" type="checkbox" value=""
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="other_reason"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Autre raison</label>
                        </div>
                        <div>
                            <input type="text"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full px-2.5 other_input"
                                placeholder="Ecrivez ici ..." data-target="other_reason">
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">12. Quels volumes de documents signez-vous ou pourriez-vous signer
                            par mois, vous-m&ecirc;me ou dans votre service ?</h3>
                        <div class="flex items-center my-4">
                            <input id="lesser_than_100" type="radio" value="moins de 100" name="documents_size"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="lesser_than_100" class="ml-2 text-sm font-medium text-gray-900">moins de
                                100</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="between_100_and_500" type="radio" value="100 &agrave; 500"
                                name="documents_size"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="between_100_and_500" class="ml-2 text-sm font-medium text-gray-900">100
                                &agrave; 500</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="between_500_and_1000" type="radio" value="500 &agrave; 1000"
                                name="documents_size"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="between_500_and_1000" class="ml-2 text-sm font-medium text-gray-900">500
                                &agrave; 1000</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="more_than_1000" type="radio" value="plus de 1000" name="documents_size"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="more_than_1000" class="ml-2 text-sm font-medium text-gray-900">plus de
                                1000</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">13. Le confinement COVID 19 et le t&eacute;l&eacute;travail &agrave;
                            100 % ont-ils &eacute;t&eacute; pour vous un acc&eacute;l&eacute;rateur ou m&ecirc;me la
                            g&eacute;n&eacute;ralisation du besoin de signature &eacute;lectronique ?</h3>
                        <div class="flex items-center my-4">
                            <input id="yes_of_course" type="radio" value="OUI, tout &agrave; fait"
                                name="remote_and_covid_impact"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="yes_of_course" class="ml-2 text-sm font-medium text-gray-900">OUI, tout
                                &agrave; fait</label>
                        </div>
                        <div class="flex items-center my-4">
                            <input id="yes_for_sure" type="radio" value="OUI, s&ucirc;rement"
                                name="remote_and_covid_impact"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="yes_for_sure" class="ml-2 text-sm font-medium text-gray-900">OUI,
                                s&ucirc;rement</label>
                        </div>
                        <div class="flex items-center my-4">
                            <input id="no_not_really" type="radio" value="NON, pas vraiment"
                                name="remote_and_covid_impact"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="no_not_really" class="ml-2 text-sm font-medium text-gray-900">NON, pas
                                vraiment</label>
                        </div>
                        <div class="flex items-center my-4">
                            <input id="no_not_at_all" type="radio" value="NON, pas du tout"
                                name="remote_and_covid_impact"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="no_not_at_all" class="ml-2 text-sm font-medium text-gray-900">NON, pas du
                                tout</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">14. Parmi les 4 niveaux de signature &eacute;lectronique, lequel est
                            ou pourrait &ecirc;tre le plus adapt&eacute; &agrave; votre situation ?</h3>

                        <div class="mt-4" style="overflow-x: scroll;">
                            <table class="w-full text-sm text-left text-gray-500"
                                style="border: 1px solid #ddd !important;">
                                <thead class="text-xs text-gray-700 uppercase"
                                    style="border: 1px solid #ddd !important;">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Niveau de signature
                                        </th>
                                        <th scope="col" class="py-3 px-6">

                                        </th>
                                        <th scope="col" class="py-3 px-6">

                                        </th>
                                        <th scope="col" class="py-3 px-6">

                                        </th>
                                        <th scope="col" class="py-3 px-6">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b">
                                        <td style="min-width: 200px; border: 1px solid #ddd !important;"
                                            class="p-2">
                                            la <strong>&laquo; signature simple &raquo;</strong>, par exemple pour un
                                            bon de commande, ou acte de gestion, une transmission vers un
                                            institutionnel, ou un partenaire.
                                        </td>
                                        <td style="min-width: 100px; border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="simple_signature_yes_of_course" type="radio"
                                                    value="Oui tout &agrave; fait" name="simple_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="simple_signature_yes_of_course"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui tout &agrave;
                                                    fait</label>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="simple_signature_yes_enough" type="radio"
                                                    value="Oui assez" name="simple_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="simple_signature_yes_enough"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui assez</label>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="simple_signature_no_not_really" type="radio"
                                                    value="NON, pas vraiment" name="simple_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="simple_signature_no_not_really"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas
                                                    vraiment</label>
                                            </div>
                                        </td>
                                        <td style="min-width: 100px;border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="simple_signature_no_not_at_all" type="radio"
                                                    value="NON, pas du tout" name="simple_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="simple_signature_no_not_at_all"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas du
                                                    tout</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <td style="min-width: 200px; border: 1px solid #ddd !important;"
                                            class="p-2">
                                            la <strong>&laquo; signature avanc&eacute;e &raquo;</strong> qui peut
                                            prendre des formes suivantes comme le cachet d'horodatage qualifi&eacute;,
                                            le certificat de signature, l'archivage des traces, etc. Il concerne des
                                            actes engageants de type financier ou contractuel.
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="advanced_signature_yes_of_course" type="radio"
                                                    value="Oui tout &agrave; fait" name="advanced_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="advanced_signature_yes_of_course"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui tout &agrave;
                                                    fait</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="advanced_signature_yes_enough" type="radio"
                                                    value="Oui assez" name="advanced_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="advanced_signature_yes_enough"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui assez</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="advanced_signature_no_not_really" type="radio"
                                                    value="NON, pas vraiment" name="advanced_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="advanced_signature_no_not_really"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas
                                                    vraiment</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="advanced_signature_no_not_at_all" type="radio"
                                                    value="NON, pas du tout" name="advanced_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="advanced_signature_no_not_at_all"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas du
                                                    tout</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <td style="min-width: 200px; border: 1px solid #ddd !important;"
                                            class="p-2">
                                            la <strong>&laquo; signature avanc&eacute;e avec certificat qualifi&eacute;
                                                &raquo;</strong>. Elle prend la forme d'une carte &agrave; puce, d'un
                                            certificat qualifi&eacute;, et concerne notamment les march&eacute;s
                                            publics, les pi&egrave;ces justificatives.
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="certificated_signature_yes_of_course" type="radio"
                                                    value="Oui tout &agrave; fait"
                                                    name="certificated_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="certificated_signature_yes_of_course"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui tout &agrave;
                                                    fait</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="certificated_signature_yes_enough" type="radio"
                                                    value="Oui assez" name="certificated_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="certificated_signature_yes_enough"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui assez</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="certificated_signature_no_not_really" type="radio"
                                                    value="NON, pas vraiment" name="certificated_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="certificated_signature_no_not_really"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas
                                                    vraiment</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="certificated_signature_no_not_at_all" type="radio"
                                                    value="NON, pas du tout" name="certificated_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="certificated_signature_no_not_at_all"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas du
                                                    tout</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <td style="min-width: 200px; border: 1px solid #ddd !important;"
                                            class="p-2">
                                            la <strong>&laquo; signature qualifi&eacute;e &raquo;</strong> qui
                                            int&egrave;gre une authentification forte avec un certificat qualifi&eacute;
                                            et concerne les actes notari&eacute;s, le cadastre.
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="qualified_signature_yes_of_course" type="radio"
                                                    value="Oui tout &agrave; fait" name="qualified_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="qualified_signature_yes_of_course"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui tout &agrave;
                                                    fait</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="qualified_signature_yes_enough" type="radio"
                                                    value="Oui assez" name="qualified_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="qualified_signature_yes_enough"
                                                    class="ml-2 text-sm font-medium text-gray-900">Oui assez</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="qualified_signature_no_not_really" type="radio"
                                                    value="NON, pas vraiment" name="qualified_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="qualified_signature_no_not_really"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas
                                                    vraiment</label>
                                            </div>
                                        </td>
                                        <td class="p-1" style="border: 1px solid #ddd;">
                                            <div class="flex items-center my-4">
                                                <input id="qualified_signature_no_not_at_all" type="radio"
                                                    value="NON, pas du tout" name="qualified_signature_exemple"
                                                    class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label for="qualified_signature_no_not_at_all"
                                                    class="ml-2 text-sm font-medium text-gray-900">NON, pas du
                                                    tout</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold"> 15. Quels sont, selon vous, les principaux freins &agrave; la mise
                            en place de la signature &eacute;lectronique dans votre organisation ? (3 max)</h3>
                        <div class="flex items-center my-4">
                            <input id="multiplicity_offer" name="obstacles[]" type="checkbox"
                                value="la multiplicit&eacute; des offres et des fournisseurs sur le march&eacute;"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="multiplicity_offer"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">la
                                multiplicit&eacute; des offres et des fournisseurs sur le march&eacute;</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="level_diff_panel" name="obstacles[]" type="checkbox"
                                value="le panel disponible sur le march&eacute; des diff&eacute;rents niveaux de signatures &eacute;lectroniques"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="level_diff_panel"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">le panel disponible
                                sur le march&eacute; des diff&eacute;rents niveaux de signatures
                                &eacute;lectroniques</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="juridic_and_technical" name="obstacles[]" type="checkbox"
                                value="les garanties techniques et juridiques"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="juridic_and_technical"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">les garanties
                                techniques et juridiques</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="simplicity_and_orgonomy_for_user" name="obstacles[]" type="checkbox"
                                value="l'ergonomie et la simplicit&eacute; pour l'utilisateur sur son poste"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="simplicity_and_orgonomy_for_user"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">l'ergonomie et la
                                simplicit&eacute; pour l'utilisateur sur son poste</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="auth_complexity" name="obstacles[]" type="checkbox"
                                value="la complexit&eacute; des autorisations ou des d&eacute;l&eacute;gations de signatures"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="auth_complexity"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">la complexit&eacute;
                                des autorisations ou des d&eacute;l&eacute;gations de signatures</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="needs_evaluation" name="obstacles[]" type="checkbox"
                                value="la complexit&eacute; d'&eacute;valuation des besoins, de l'organisation n&eacute;cessaire et de la mise en oeuvre de la solution"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="needs_evaluation"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">la complexit&eacute;
                                d'&eacute;valuation des besoins, de l'organisation n&eacute;cessaire et de la mise en
                                oeuvre de la solution</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="price" name="obstacles[]" type="checkbox" value="le prix"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="price" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">le
                                prix</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="direction_will" name="obstacles[]" type="checkbox"
                                value="La volont&eacute; de votre Direction"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="direction_will"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">La volont&eacute; de
                                votre Direction</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="signature_is_already_setup" name="obstacles[]" type="checkbox"
                                value="La signature &eacute;lectronique est d&eacute;j&agrave; mise en place"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="signature_is_already_setup"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">La signature
                                &eacute;lectronique est d&eacute;j&agrave; mise en place</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="we_dont_need_signature" name="obstacles[]" type="checkbox"
                                value="Nous n'avons pas besoin de signature &eacute;lectronique"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="we_dont_need_signature"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nous n'avons pas
                                besoin de signature &eacute;lectronique</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="other_obstacle" name="obstacles[]" type="checkbox" value=""
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="other_obstacle"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Autre (veuillez
                                pr&eacute;ciser)</label>
                        </div>
                        <div>
                            <input type="text"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full px-2.5 other_input"
                                placeholder="Ecrivez ici ..." data-target="other_obstacle">
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">16. Est-ce important pour vous de faire appel &agrave; un Prestataire
                            de services de confiance qualifi&eacute;s approuv&eacute; par l'autorit&eacute; nationale ?
                        </h3>
                        <div class="flex items-center my-4">
                            <input id="recipient_call_yes_of_course" type="radio" value="OUI, tout &agrave; fait"
                                name="recipient_call"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="recipient_call_yes_of_course"
                                class="ml-2 text-sm font-medium text-gray-900">OUI, tout &agrave; fait</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="recipient_call_yes_for_sure" type="radio" value="OUI, s&ucirc;rement"
                                name="recipient_call"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="recipient_call_yes_for_sure"
                                class="ml-2 text-sm font-medium text-gray-900">OUI, s&ucirc;rement</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="recipient_call_no_not_really" type="radio" value="NON, pas vraiment"
                                name="recipient_call"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="recipient_call_no_not_really"
                                class="ml-2 text-sm font-medium text-gray-900">NON, pas vraiment</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="recipient_call_no_not_at_all" type="radio" value="NON, pas du tout"
                                name="recipient_call"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="recipient_call_no_not_at_all"
                                class="ml-2 text-sm font-medium text-gray-900">NON, pas du tout</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">17. Si vous &ecirc;tes &eacute;quip&eacute; d'une solution de
                            signature &eacute;lectronique, est-elle interfac&eacute;e avec une Ged (Gestion Electronique
                            des Documents) ou un autre logiciel m&eacute;tier ?</h3>
                        <div class="flex items-center my-4">
                            <input id="signature_is_interface_with_ged_yes" type="radio" value="OUI"
                                name="signature_is_interface_with_ged"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="signature_is_interface_with_ged_yes"
                                class="ml-2 text-sm font-medium text-gray-900">OUI</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="signature_is_interface_with_ged_no" type="radio" value="NON"
                                name="signature_is_interface_with_ged"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="signature_is_interface_with_ged_no"
                                class="ml-2 text-sm font-medium text-gray-900">NON</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="signature_is_interface_with_ged_i_dunno" type="radio" value="Je ne sais pas"
                                name="signature_is_interface_with_ged"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="signature_is_interface_with_ged_i_dunno"
                                class="ml-2 text-sm font-medium text-gray-900">Je ne sais pas</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">18. Parall&egrave;lement &agrave; la signature &eacute;lectronique,
                            vous avez d&eacute;j&agrave; mis en place ou vous envisagez de mettre en place...</h3>
                        <div class="flex items-center my-4">
                            <input id="numeric_safebox" name="alternatives[]" type="checkbox"
                                value="un coffre-fort num&eacute;rique"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="numeric_safebox"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">un coffre-fort
                                num&eacute;rique</label>
                        </div>
                        <div class="flex items-center my-4">
                            <input id="electronic_parapher" name="alternatives[]" type="checkbox"
                                value="un parapheur &eacute;lectronique"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="electronic_parapher"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">un parapheur
                                &eacute;lectronique</label>
                        </div>
                        <div class="flex items-center my-4">
                            <input id="electronic_archive" name="alternatives[]" type="checkbox"
                                value="un archivage &eacute;lectronique &agrave; valeur probatoire des documents sign&eacute;s &eacute;lectroniquement"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="electronic_archive"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">un archivage
                                &eacute;lectronique &agrave; valeur probatoire des documents sign&eacute;s
                                &eacute;lectroniquement</label>
                        </div>
                        <div class="flex items-center my-4">
                            <input id="workflow_of_signatures" name="alternatives[]" type="checkbox"
                                value="un workflow avec plusieurs niveaux de signature"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="workflow_of_signatures"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">un workflow avec
                                plusieurs niveaux de signature</label>
                        </div>
                        <div class="flex items-center my-4">
                            <input id="other_alternative" name="alternatives[]" type="checkbox"
                                value="un parapheur &eacute;lectronique"
                                class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500">
                            <label for="other_alternative"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Autre(Veuillez
                                pr&eacute;ciser)</label>
                        </div>
                        <div>
                            <input type="text"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full px-2.5 other_input"
                                placeholder="Ecrivez ici ..." data-target="other_alternative">
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">19. Quel est l'effectif salari&eacute; de votre structure ?</h3>
                        <div class="flex items-center my-4">
                            <input id="wn_lesser_than_10" type="radio" value="Moins de 10 employ&eacute;s"
                                name="workers_number"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="wn_lesser_than_10" class="ml-2 text-sm font-medium text-gray-900">Moins de 10
                                employ&eacute;s</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="between_11_and_20" type="radio" value="11 &agrave; 20 employ&eacute;s"
                                name="workers_number"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="between_11_and_20" class="ml-2 text-sm font-medium text-gray-900">11 &agrave;
                                20 employ&eacute;s</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="between_21_and_49" type="radio" value="21 &agrave; 49 employ&eacute;s"
                                name="workers_number"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="between_21_and_49" class="ml-2 text-sm font-medium text-gray-900">21 &agrave;
                                49 employ&eacute;s</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="between_50_and_250" type="radio" value="50 &agrave; 250 employ&eacute;s"
                                name="workers_number"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="between_50_and_250" class="ml-2 text-sm font-medium text-gray-900">50 &agrave;
                                250 employ&eacute;s</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="between_250_and_1000" type="radio" value="250 &agrave; 1000 employ&eacute;s"
                                name="workers_number"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="between_250_and_1000" class="ml-2 text-sm font-medium text-gray-900">250
                                &agrave; 1000 employ&eacute;s</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="between_1000_and_5000" type="radio"
                                value="1000 &agrave; 5000 employ&eacute;s" name="workers_number"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="between_1000_and_5000" class="ml-2 text-sm font-medium text-gray-900">1000
                                &agrave; 5000 employ&eacute;s</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="more_than_5000" type="radio" value="Plus de 5000 employ&eacute;s"
                                name="workers_number"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="more_than_5000" class="ml-2 text-sm font-medium text-gray-900">Plus de 5000
                                employ&eacute;s</label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">20. Dans quel secteur d'activit&eacute; travaillez-vous ?</h3>
                        <div class="flex items-center my-4">
                            <input id="general_adminisatration" type="radio"
                                value="Administration G&eacute;n&eacute;rale" name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="general_adminisatration"
                                class="ml-2 text-sm font-medium text-gray-900">Administration
                                G&eacute;n&eacute;rale</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="bank_or_finance" type="radio" value="Banque / Assurance / Finances"
                                name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="bank_or_finance" class="ml-2 text-sm font-medium text-gray-900">Banque /
                                Assurance / Finances</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="territorial_collectivity" type="radio"
                                value="Collectivit&eacute;s territoriales" name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="territorial_collectivity"
                                class="ml-2 text-sm font-medium text-gray-900">Collectivit&eacute;s
                                territoriales</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="culture_and_audio" type="radio"
                                value="&eacute;dition / Culture / Audiovisuel" name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="culture_and_audio"
                                class="ml-2 text-sm font-medium text-gray-900">&eacute;dition / Culture /
                                Audiovisuel</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="education_and_reseach" type="radio" value="&eacute;ducation / Recherche"
                                name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="education_and_reseach"
                                class="ml-2 text-sm font-medium text-gray-900">&eacute;ducation / Recherche</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="assistance_and_study" type="radio"
                                value="&eacute;tude / Conseil / Assistance" name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="assistance_and_study"
                                class="ml-2 text-sm font-medium text-gray-900">&eacute;tude / Conseil /
                                Assistance</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="industry_and_energy" type="radio"
                                value="Industrie / A&eacute;ronautique / Energies" name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="industry_and_energy" class="ml-2 text-sm font-medium text-gray-900">Industrie
                                / A&eacute;ronautique / Energies</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="tech" type="radio" value="Informatique" name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="tech" class="ml-2 text-sm font-medium text-gray-900">Informatique</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="health" type="radio" value="Sant&eacute; / Pharmaceutique"
                                name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="health" class="ml-2 text-sm font-medium text-gray-900">Sant&eacute; /
                                Pharmaceutique</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="services" type="radio" value="Sant&eacute; / Pharmaceutique"
                                name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="services" class="ml-2 text-sm font-medium text-gray-900">Services</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="post_and_telecom" type="radio" value="T&eacute;l&eacute;com / post"
                                name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="post_and_telecom"
                                class="ml-2 text-sm font-medium text-gray-900">T&eacute;l&eacute;com / post</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="other_activity_field" type="radio" value="" name="activity_field"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="other_activity_field" class="ml-2 text-sm font-medium text-gray-900">Autre,
                                merci de le pr&eacute;ciser :</label>
                        </div>
                        <div>
                            <input type="text"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full px-2.5 other_input"
                                placeholder="Ecrivez ici ..." data-target="other_activity_field">
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold">21. Dans quel service travaillez-vous ?</h3>
                        <div class="flex items-center my-4">
                            <input id="archives_service" type="radio" value="Archives" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="archives_service"
                                class="ml-2 text-sm font-medium text-gray-900">Archives</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_finance_or_administration" type="radio"
                                value="Administration / Finances" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_finance_or_administration"
                                class="ml-2 text-sm font-medium text-gray-900">Administration / Finances</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_library" type="radio"
                                value="Biblioth&egrave;que / M&eacute;diath&egrave;que" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_library"
                                class="ml-2 text-sm font-medium text-gray-900">Biblioth&egrave;que /
                                M&eacute;diath&egrave;que</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_marketing" type="radio" value="Commercial / Marketing"
                                name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_marketing" class="ml-2 text-sm font-medium text-gray-900">Commercial
                                / Marketing</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_communication" type="radio" value="Communication"
                                name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_communication"
                                class="ml-2 text-sm font-medium text-gray-900">Communication</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_general_direction" type="radio"
                                value="Direction G&eacute;n&eacute;rale" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_general_direction"
                                class="ml-2 text-sm font-medium text-gray-900">Direction
                                G&eacute;n&eacute;rale</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_documentation" type="radio" value="Documentation"
                                name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_documentation"
                                class="ml-2 text-sm font-medium text-gray-900">Documentation</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_hrd" type="radio" value="DRH" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_hrd" class="ml-2 text-sm font-medium text-gray-900">DRH</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_study_and_research" type="radio"
                                value="&eacute;tudes / Recherche" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_study_and_research"
                                class="ml-2 text-sm font-medium text-gray-900">&eacute;tudes / Recherche</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_press" type="radio" value="Information / Presse"
                                name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_press" class="ml-2 text-sm font-medium text-gray-900">Information /
                                Presse</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_tech" type="radio" value="Informatique" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_tech"
                                class="ml-2 text-sm font-medium text-gray-900">Informatique</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_law" type="radio" value="Juridique" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_law"
                                class="ml-2 text-sm font-medium text-gray-900">Juridique</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_method_and_org" type="radio"
                                value="Organisation et M&eacute;thodes" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_method_and_org"
                                class="ml-2 text-sm font-medium text-gray-900">Organisation et M&eacute;thodes</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="work_at_technic_and_logistic" type="radio" value="Technique / Logistique"
                                name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="work_at_technic_and_logistic"
                                class="ml-2 text-sm font-medium text-gray-900">Technique / Logistique</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="other_work_service" type="radio" value="" name="work_service"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="other_work_service" class="ml-2 text-sm font-medium text-gray-900">Autre,
                                merci de le pr&eacute;ciser :</label>
                        </div>
                        <div>
                            <input type="text"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full px-2.5 other_input"
                                placeholder="Ecriver ici ..." data-target="other_work_service">
                        </div>
                    </div>
                    <div class="mb-3">
                        <h3 class="font-semibold">22. Quelle est votre fonction exacte ?</h3>
                        <div class="flex items-center my-4">
                            <input id="exact_function_archive" type="radio" value="Archiviste"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_archive"
                                class="ml-2 text-sm font-medium text-gray-900">Archiviste</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_library" type="radio" value="Biblioth&egrave;caire"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_library"
                                class="ml-2 text-sm font-medium text-gray-900">Biblioth&egrave;caire</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_marketing" type="radio" value="Community Manager"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_marketing"
                                class="ml-2 text-sm font-medium text-gray-900">Community Manager</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_finance" type="radio" value="Comptable"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_finance"
                                class="ml-2 text-sm font-medium text-gray-900">Comptable</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_consultation" type="radio" value="Consultant"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_consultation"
                                class="ml-2 text-sm font-medium text-gray-900">Consultant</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_general_direction" type="radio" value="DG / PDG"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_general_direction"
                                class="ml-2 text-sm font-medium text-gray-900">DG / PDG</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_documentation" type="radio" value="Documentaliste"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_documentation"
                                class="ml-2 text-sm font-medium text-gray-900">Documentaliste</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="it_guy" type="radio" value="Informaticien" name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="it_guy"
                                class="ml-2 text-sm font-medium text-gray-900">Informaticien</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_lawyer" type="radio" value="Juriste / avocat"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_lawyer"
                                class="ml-2 text-sm font-medium text-gray-900">Juriste / avocat</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_media" type="radio" value="M&eacute;diath&eacute;caire"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_media"
                                class="ml-2 text-sm font-medium text-gray-900">M&eacute;diath&eacute;caire</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_communication_manager" type="radio"
                                value="Responsable Communication" name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_communication_manager"
                                class="ml-2 text-sm font-medium text-gray-900">Responsable Communication</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_marketing_manager" type="radio"
                                value="Responsable Marketing" name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_marketing_manager"
                                class="ml-2 text-sm font-medium text-gray-900">Responsable Marketing</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_watchman" type="radio" value="Veilleur"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_watchman"
                                class="ml-2 text-sm font-medium text-gray-900">Veilleur</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="tech_manager" type="radio" value="Responsable Informatique / DSI"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="tech_manager" class="ml-2 text-sm font-medium text-gray-900">Responsable
                                Informatique / DSI</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_digital_manager" type="radio"
                                value="Responsable de la transition digitale" name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_digital_manager"
                                class="ml-2 text-sm font-medium text-gray-900">Responsable de la transition
                                digitale</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_press_manager" type="radio"
                                value="Responsable de l'information" name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_press_manager"
                                class="ml-2 text-sm font-medium text-gray-900">Responsable de l'information</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_webmaster" type="radio" value="Webmaster"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_webmaster"
                                class="ml-2 text-sm font-medium text-gray-900">Webmaster</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_knowledge_manager" type="radio" value="Knowledge Manager"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_knowledge_manager"
                                class="ml-2 text-sm font-medium text-gray-900">Knowledge Manager</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_student" type="radio" value="&eacute;tudiant"
                                name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_student"
                                class="ml-2 text-sm font-medium text-gray-900">&eacute;tudiant</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="exact_function_other" type="radio" value="" name="exact_function"
                                class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                            <label for="exact_function_other"
                                class="ml-2 text-sm font-medium text-gray-900">Autre(Merci de pr&eacute;ciser)
                                :</label>
                        </div>
                        <div>
                            <input type="text"
                                class="bg-gray-50 outline-none transition-colors border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 block w-full px-2.5 other_input"
                                placeholder="Ecrivez ici ..." data-target="exact_function_other">
                        </div>
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="text-white bg-red-500 focus:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center mx-auto"
                            style="width: fit-content;">
                            Soumettre le questionnaire
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <script>
        const otherInputs = Array.from(document.getElementsByClassName('other_input'))
        otherInputs.forEach(input => {
            input.addEventListener('input', function() {
                const target = document.getElementById(this.dataset.target)
                target.setAttribute('value', this.value)
            })
        })
    </script>
</body>

</html>
