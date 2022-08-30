<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeele | Fiche d'inscription</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>

        ul > li {display: flex;}
        ul > li::before {
        content:"·";
        font-size:80px;
        margin-bottom: 50px;
        vertical-align:middle;
        line-height:18px;
    }
    </style>
</head>

<body>
    <div class="w-100 min-h-screen py-4 bg-gray-100/2">
        <div class="pt-4 pb-8">
            <img src="{{ asset('logo.png') }}" alt="Yeele" class="w-32 mx-auto">
        </div>
        <div class="bg-slate-100 w-11/12 rounded-lg border border-gray-200 shadow-sm mx-auto" style="max-width: 550px;">
            <div class="p-4 text-center font-semibold">
                <h1 class="uppercase">Enquête en ligne ciblant le grand public</h1>
            </div>
            <div class="p-4 border-b">
                <img src="{{ asset("images/electronic_signature.jpeg") }}" width="400" height="600"
                    alt="signature électronique" loading="lazy" class="mx-auto">
            </div>
            <div class="border-b p-4">
                <h1 class="text-red-600 text-center font-semibold">INTRODUCTION POUR LE QUESTIONNAIRE LARGE PUBLIC</h1>
                <div class="my-4">
                    <p class="my-4">Bonjour Madame/Monsieur !</p>
                    <p>Le présent questionnaire vise à permettre au cabinet Horinfo Burkina SARL la réalisation de la mission « appuyer le Burkina Faso dans les modalités de la mise en œuvre effective de la signature électronique » financée par le PNUD. Les objectifs de cette mission sont les suivantes : </p>
                    <ul class="my-4 px-5">
                        <li>analyser le cadre juridique et institutionnel relatif aux transactions électroniques ;</li>
                        <li>identifier et analyser l’ensembles des facteurs/problèmes qui entravent l’effectivité de la signature électronique ;</li>
                        <li>la révision éventuelle du cadre juridique pour le rendre conforme aux enjeux actuels et à l’évolution du digital ;</li>
                        <li>élaborer une feuille de route sur les modalités d’opérationnalisation de la signature électronique au Burkina Faso ;</li>
                        <li>élaborer/réviser le projet de décret relatif aux modalités et conditions de délivrance, d’utilisation et de révocation de la signature électronique des personnes morales prévu par la Loi n° 045-2009/AN du 10 novembre 2009 susmentionnée revue ;</li>
                        <li>élaborer le projet de rapport en Conseil des ministres pour l’adoption du projet de décret élaboré ;</li>
                        <li>étudier les impacts/effets de la mise en œuvre du décret relatif aux modalités et conditions de délivrance, d’utilisation et de révocation de la signature électronique de la personne morale, sur les activités des parties prenantes.</li>
                    </ul>
                </div>
                <div>
                    <p>La présente collecte d’informations est complémentaire à d’autres activités entrant dans ce processus et viendra alimenter des réflexions en cours et des propositions au profit du Ministère de la Transition Digitale, des Postes et des Communications Électroniques dont les missions sont entre autres:</p>
                    <ul class="my-4 px-5">
                        <li>l’édification d’une e-société burkinabè;</li>
                        <li>la coordination et de l’élaboration des politiques, des stratégies et des plans nationaux et sectoriels de développement des technologies de l’information et de la communication, de leur cohérence et de leur complémentarité ;</li>
                        <li>de la prise en compte de ces politiques, stratégies et plans nationaux et sectoriels dans les différents plans de développement, et de coordonner leur mise en œuvre ;</li>
                        <li>la coordination de la définition de principes, de règles, de normes, de procédures de prise de décisions et de référentiels communs, afin de garantir l’interopérabilité et de la mise en œuvre d’un cadre juridique de la société de l’information favorable à l’essor des transactions électroniques;</li>
                        <li>la coordination et de la mise en place d’un cadre juridique et institutionnel visant à garantir la cybersécurité ;</li>
                        <li>
                            <span>le suivi de la délivrance et de la gestion des autorisations pour :</span>
                            <li style="margin-left: 20px;">la certification des clés publiques pour le cryptage et la signature électronique</li>
                            <li style="margin-left: 20px;">l’exploitation par des moyens électroniques des renseignements à caractère personnel afin de garantir la protection de la vie privée ;</li>
                        </li>
                        <li style="margin-top: 20px;">la diffusion des normes techniques et des instruments juridiques internationaux dans le domaine de l’industrie numérique ;</li>
                        <li style="margin-top: 20px;">la bonne gouvernance du secteur de l’économie numérique et des communications électroniques.</li>
                    </ul>
                </div>
                <div>
                    <p>Au regard de l’importance, des effets et impacts éventuels de la signature électronique pour le citoyen burkinabè, et la nécessité de tenir compte de l’avis de tous, Horinfo Burkina Sarl dans une démarche inclusive et participative vous sollicite pour renseigner le présent questionnaire.</p>
                    <p class="mt-5">Vos réponses qui feront l’objet d’analyses quantitative et qualitative, de manière confidentielle, permettront, de toute évidence, au cabinet Horinfo Burkina SARL de faire au Ministère de la Transition Digitale, des Postes et des Communications Électroniques ainsi qu’à ses partenaires des propositions adéquates pour une opérationnalisation de la signature électronique au Burkina Faso.</p>
                    <p class="mt-5">Merci du temps que vous nous consacrez !</p>
                </div>
            </div>
            <div class="my-4">
                <a href="{{ route('electronic_signature_form') }}" class="text-white bg-red-500 focus:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center mx-auto" style="width: fit-content;">
                    Commencer le questionnaire
                </a>
            </div>
        </div>
    </div>
</body>
</html>