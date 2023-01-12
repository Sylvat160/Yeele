<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participants = [
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Clémence",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "66 88 46 47",
            "email" => "yeele-event6.02925419493115@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SAWADOGO FANTA",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "7318473",
            "email" => "yeele-event8.47198040304548@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SAWADOGO Fanta",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "62100497",
            "email" => "yeele-event2.44866117648147@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "GOGBE Yokhole Ahmed Al",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "35911035",
            "email" => "yeele-event5.47742867256589@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SAWADOGO Zalissa",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "687232",
            "email" => "yeele-event5.59869356732972@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUERME Noufou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "4657826",
            "email" => "yeele-event6.89703975684231@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KERE Bibata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "4665511",
            "email" => "yeele-event10.6502730420801@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "COMPAORE Ablassé",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8367916",
            "email" => "yeele-event4.35902821496826@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SOUBEIGA Marc",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "827316",
            "email" => "yeele-event4.83559150819788@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KINDO Rokia",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "4165119",
            "email" => "yeele-event10.3876418856187@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KINDO Aissata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "2081147",
            "email" => "yeele-event8.11647612279213@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "YAMEEOGO Dieudonné",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "5052194",
            "email" => "yeele-event2.31256253040137@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "ILLA Issa",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8411611",
            "email" => "yeele-event2.81455989036434@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KANYALA Irène",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "288524",
            "email" => "yeele-event10.4294839720548@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "AGBAVOR Nora",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+22507 08 3565 34",
            "email" => "yeele-event1.91399461390263@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "ZONGO Issa",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "2838234",
            "email" => "yeele-event1.81411952599678@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Rosine Fatimata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 71 02 37",
            "email" => "yeele-event2.28933895821156@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Claudine",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "62 42 05 16",
            "email" => "yeele-event3.64281149112837@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Estelle",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "74 55 05 05",
            "email" => "yeele-event6.7816252590058@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SAWADOGO Fatimata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "74 43 03 39",
            "email" => "yeele-event4.07135469334539@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "DIABRI TALARE",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "6333951",
            "email" => "yeele-event4.05385796094048@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "DIABRI Talaré TCHIOMBIANO",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+227 90 21 47 70",
            "email" => "yeele-event3.59765571642519@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "TCHIOMBIANO Labia",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+227 90 35 24 72",
            "email" => "yeele-event3.96037066566529@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TCHIOMBIANO Bibata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+227 90 06 59 34",
            "email" => "yeele-event2.65812200322939@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TCHIOMBIANO Yentenma",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8728676",
            "email" => "yeele-event7.70662285410528@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TCHIOMBIANO Zalika",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+227 89 77 06 68",
            "email" => "yeele-event1.60139853089307@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "ADAM Dourhamane",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "27261059",
            "email" => "yeele-event6.13590185914732@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "RAHILA Mamadou Issaka",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8314825",
            "email" => "yeele-event1.76575730515924@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "BARGUI Haoua",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8653148",
            "email" => "yeele-event3.91872083254055@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "BOUKARY Dahanatou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "10115642",
            "email" => "yeele-event7.06679647297677@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "ALIKISSANKPEI Ramatou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "6547426",
            "email" => "yeele-event5.08708147893116@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "HAMADOU Issaka",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "443676",
            "email" => "yeele-event1.17715832249835@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SOUMANA Samiratou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "576844",
            "email" => "yeele-event9.09630950363379@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "CHAMSIYA Ibrahim",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "6336166",
            "email" => "yeele-event4.78321923100874@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "NOUHOU Hama Boubacar",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "5471234",
            "email" => "yeele-event5.36259840417361@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SADOU Djibo Ramatou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "5926590",
            "email" => "yeele-event10.357584049033@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SANKARA PAYIMDE",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "244641",
            "email" => "yeele-event4.83715428539763@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SANKARA Payimdé",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 71 78 44",
            "email" => "yeele-event7.20497788400077@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SEBEGO Colette",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "72 62 72 20",
            "email" => "yeele-event7.15083724103884@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "HIEN ZONGO Safieta",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 74 44 32",
            "email" => "yeele-event6.09196825296777@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO Saidou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 10 17 26",
            "email" => "yeele-event6.89367087550913@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SAWADOGO MAROU",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "84831098",
            "email" => "yeele-event7.53395686726996@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SAWADOGO Marou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "56 69 00 17",
            "email" => "yeele-event7.46329921424831@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "TRAORE Oumarou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 12 44 16",
            "email" => "yeele-event1.33940648188999@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KAZIENGA W. Angèle",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "71 18 40 55",
            "email" => "yeele-event9.66038726345386@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "VALEA P. Edith",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 96 35 65",
            "email" => "yeele-event8.28825747536051@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SANOU Saly",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "76 28 69 69",
            "email" => "yeele-event6.70965615757439@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SINARE Zacharie",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 24 41 90",
            "email" => "yeele-event9.56376191559271@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "COULIBALY Bleh Mamadou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "1869188",
            "email" => "yeele-event10.6673894383812@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO MOUMOUNI",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "3746181",
            "email" => "yeele-event6.16813750693864@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO Moumoni",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "4542541",
            "email" => "yeele-event10.567431527325@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KABORE Safiata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "1725463",
            "email" => "yeele-event8.69744792095017@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BERE Adama",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "3240815",
            "email" => "yeele-event10.1256104507526@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO Adama",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "1230346",
            "email" => "yeele-event1.95360358387926@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KABORE Mariam",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8954583",
            "email" => "yeele-event10.2647099113741@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KOBANDE Assèta",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "9478563",
            "email" => "yeele-event6.02373453398576@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Adèle Zogoré",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "1113229",
            "email" => "yeele-event5.87108236267873@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SAWADOGO Sidiki",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8018552",
            "email" => "yeele-event4.95234945527728@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "KABRE Ouindinmi Corneil",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "2528224",
            "email" => "yeele-event9.67845075930852@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "DAYAMBA Pascal",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "9196671",
            "email" => "yeele-event9.3060361987543@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "ZEMBA Odile",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "997416",
            "email" => "yeele-event4.33527237113985@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "CONGO Aminata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "3089557",
            "email" => "yeele-event9.77200725485619@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SAWADOGO Lassané 2éjumeau",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "3122243",
            "email" => "yeele-event10.8148950012148@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SANDWIDI Fatoumata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "5251185",
            "email" => "yeele-event2.00915316909856@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "KABORE Kevin Brice",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "4131136",
            "email" => "yeele-event7.16006245662553@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUANRE Zoenabo",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "2747912",
            "email" => "yeele-event9.21649966282933@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "KASSE Adama",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "7194172",
            "email" => "yeele-event4.89315059173276@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "DENNE Moussa",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "7368234",
            "email" => "yeele-event10.7431962405085@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KIEBRE N Elisabeth",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "9144134",
            "email" => "yeele-event3.34354733858416@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "ZOUKLI Romaine N",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "5477658",
            "email" => "yeele-event1.01766248184668@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "DOULKOUM Boukary",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "9241354",
            "email" => "yeele-event4.75653980967376@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "GANEMTORE Issouf",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "9688432",
            "email" => "yeele-event8.19982860918726@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "NANA Saïdou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "6779814",
            "email" => "yeele-event1.74276382690122@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SAWADOGO Flavien",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "7161764",
            "email" => "yeele-event3.63373220854753@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KABRE Laylatou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "10080710",
            "email" => "yeele-event7.1458801243299@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "KAYORGO Casimir",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "14801011",
            "email" => "yeele-event1.75888489621192@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "COMPAORE Zoenabo",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "3319981",
            "email" => "yeele-event2.19329380115207@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TRAORE N ADELE",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "943564",
            "email" => "yeele-event4.5493774406817@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SAWADOGO Fatoumata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "222298",
            "email" => "yeele-event5.73779797958691@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "TIENDREBEOGO Dieudonné",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8171540",
            "email" => "yeele-event8.25007030011681@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "GNANZOU-TREMBLAY ROSALIE",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8342528",
            "email" => "yeele-event8.39382225715849@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "GNANZOU-Tremblay Rosalie",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "4133132",
            "email" => "yeele-event5.49852083241114@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "BLETTOH WILLIAMS Eleonore",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "4516614",
            "email" => "yeele-event4.37330220326206@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "NABALOUM SAIDOU",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "2572228",
            "email" => "yeele-event10.4393161338474@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "NABALOUM Saidou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "76 43 92 37",
            "email" => "yeele-event2.13386799539902@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "KONATE Ismael",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "64 89 19 30",
            "email" => "yeele-event10.6480513580166@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "TAHELOU Ggnissien",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "75 34 13 96",
            "email" => "yeele-event6.17460414880526@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SANOU Sezouma Jeremie",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "74 27 96 02",
            "email" => "yeele-event8.27978848438331@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUATTARA Alimata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "65 41 62 45",
            "email" => "yeele-event1.30170761166977@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "KABORE Aissa",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "65 47 10 57",
            "email" => "yeele-event9.04098238492426@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SEREME Fatoumata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "72 41 82 83",
            "email" => "yeele-event5.93900763348081@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUATTARA Drissa",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "71 53 16 55",
            "email" => "yeele-event8.18028147476864@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TIEGNA Abibata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 42 11 62",
            "email" => "yeele-event2.05277250236871@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "TIGNEGRE Issoufou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "75 6063 27",
            "email" => "yeele-event5.13580287913519@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Aminata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "61 58 32 83",
            "email" => "yeele-event7.45971239581564@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO Madi",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "63 61 55 71",
            "email" => "yeele-event9.19929115990769@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SAWADOGO ADAMA",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "9831594",
            "email" => "yeele-event2.66161931592444@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "BOLY Maimata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "34601090",
            "email" => "yeele-event6.07520075338634@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "DIOP SOUKEYNA",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "956665",
            "email" => "yeele-event9.30479296568078@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TOURE Haoua",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+22376 33 13 52",
            "email" => "yeele-event2.60120450549005@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TRAORE SOUKO Kadiatou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+22376 16 42 52",
            "email" => "yeele-event1.21547805457766@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SANGARE Siaka",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+22365 20 84 44",
            "email" => "yeele-event2.58024537953825@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "KONTE Aissé",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+22376 04 20 40",
            "email" => "yeele-event5.68345864367016@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TRAORE Néné",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "+22371 20 05 92",
            "email" => "yeele-event9.44427150004085@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO DINGA AZETA",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "5024928",
            "email" => "yeele-event7.29222411506439@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TOGO Juliette",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "2755930",
            "email" => "yeele-event4.35291816662787@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO Abdoulaye",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "75 00 85 30",
            "email" => "yeele-event4.64925811240414@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO T. Nayim",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "70 69 46 30",
            "email" => "yeele-event9.23816266136882@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Aïssata",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "8060786",
            "email" => "yeele-event9.34959212895788@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "NIKIEMA YOUMA Hortense",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "120715",
            "email" => "yeele-event5.68281360203363@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Habibou",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "90911074",
            "email" => "yeele-event10.6018225658655@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TRAORE Korotimi",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "3848216",
            "email" => "yeele-event2.40932979454805@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "GONDE Abdou Latif",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "527372",
            "email" => "yeele-event6.32205412271175@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "ZANGA GUIRAUD Marguerite H",
            "pays" => "BURKINA FASO",
            "tel" => "5419667",
            "email" => "yeele-event9.93924695451867@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "OUEDRAOGO Edouard",
            "PREnomS" => " ",
            "pays" => "BURKINA FASO",
            "tel" => "1083222",
            "email" => "yeele-event4.5678530567888@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO Caroline",
            "pays" => "BURKINA FASO",
            "tel" => "6659913",
            "email" => "yeele-event2.87120564518234@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "NANA Félicité",
            "pays" => "BURKINA FASO",
            "tel" => "4870598",
            "email" => "yeele-event7.24616627914367@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "AZIZ KOULIDIATI",
            "pays" => "BURKINA FASO",
            "tel" => "61 25 03 47",
            "email" => "yeele-event7.00348051307284@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "HENRI",
            "pays" => "BURKINA FASO",
            "tel" => "219427",
            "email" => "yeele-event3.78838968299477@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "HIPPOLYTE ",
            "pays" => "BURKINA FASO",
            "tel" => "1848106",
            "email" => "yeele-event9.18957915667135@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "JUDITH DE DENIS",
            "pays" => "BURKINA FASO",
            "tel" => "4631754",
            "email" => "yeele-event9.82393912304777@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BASSIL",
            "pays" => "BURKINA FASO",
            "tel" => "7346851",
            "email" => "yeele-event7.90685241913154@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "MANAGER MAIGA MADI",
            "pays" => "BURKINA FASO",
            "tel" => "45241077",
            "email" => "yeele-event6.99668493323428@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "ABEL KOAMA",
            "pays" => "BURKINA FASO",
            "tel" => "227 91 55 11 40",
            "email" => "yeele-event2.47557029641358@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SAADOU OUMAROU",
            "pays" => "BURKINA FASO",
            "tel" => "96 97 42 20",
            "email" => "yeele-event9.64057187320372@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "MANAGER BOUKARI K",
            "pays" => "BURKINA FASO",
            "tel" => "2433246",
            "email" => "yeele-event10.1576457823459@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "YVONE BOA 2",
            "pays" => "BURKINA FASO",
            "tel" => "2026111",
            "email" => "yeele-event8.55562981338903@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "WANGO ISSAKA",
            "pays" => "BURKINA FASO",
            "tel" => "1032035",
            "email" => "yeele-event1.54915763399837@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "BAMBARA ZINGANI LEOKADI",
            "pays" => "BURKINA FASO",
            "tel" => "51111072",
            "email" => "yeele-event7.76948818532886@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "NOAGA JACOB",
            "pays" => "BURKINA FASO",
            "tel" => "2016265",
            "email" => "yeele-event9.30294968473458@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "SANKARA SEYDOU",
            "pays" => "BURKINA FASO",
            "tel" => "3879854",
            "email" => "yeele-event4.70975589980013@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "ABDOUL AZIZ",
            "pays" => "BURKINA FASO",
            "tel" => "2819173",
            "email" => "yeele-event6.13575873324544@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => " DINGA AZETA",
            "pays" => "BURKINA FASO",
            "tel" => "4262831",
            "email" => "yeele-event1.21306549113537@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "MR OUEDRAOGO ",
            "pays" => "BURKINA FASO",
            "tel" => "1274737",
            "email" => "yeele-event2.97794817910442@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "TRAORE BINTOU",
            "pays" => "BURKINA FASO",
            "tel" => "8069722",
            "email" => "yeele-event1.9377140041056@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "MANAGER RAOUL",
            "pays" => "BURKINA FASO",
            "tel" => "6033740",
            "email" => "yeele-event5.03370470897871@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "MAIGA MADI",
            "pays" => "BURKINA FASO",
            "tel" => "1008698",
            "email" => "yeele-event5.5976297408806@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "OUEDRAOGO FELICITE",
            "pays" => "BURKINA FASO",
            "tel" => "7284411",
            "email" => "yeele-event3.41046082649648@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "CLEMENCE",
            "pays" => "BURKINA FASO",
            "tel" => "76 61 37 30",
            "email" => "yeele-event9.1431518704705@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "BOUNLOUGOU AMSATA",
            "pays" => "BURKINA FASO",
            "tel" => "296748",
            "email" => "yeele-event3.66470042357602@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BRUNO KOUDIATI",
            "pays" => "BURKINA FASO",
            "tel" => "227 96 81 94 94",
            "email" => "yeele-event3.55651785904395@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "MANAGER ADELE",
            "pays" => "BURKINA FASO",
            "tel" => "254280",
            "email" => "yeele-event10.4836864155546@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "HAMADOU GAMBRE",
            "pays" => "BURKINA FASO",
            "tel" => "363043",
            "email" => "yeele-event1.90530447874204@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "MANAGER HIEN NOELLA",
            "pays" => "BURKINA FASO",
            "tel" => "75 25 17 17",
            "email" => "yeele-event1.56468215767682@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "FATOUMATA DJIGUEMDE",
            "pays" => "BURKINA FASO",
            "tel" => "52 06 64 64",
            "email" => "yeele-event5.4605710445397@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "ZAGRE SALAMATA",
            "pays" => "BURKINA FASO",
            "tel" => "74 32 76 10",
            "email" => "yeele-event4.48695432920592@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "PAULINE NANEMA",
            "pays" => "BURKINA FASO",
            "tel" => "70 26 21 09",
            "email" => "yeele-event9.84177526587928@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "TANKARI OUBANDAWAKI",
            "pays" => "BURKINA FASO",
            "tel" => "6187284",
            "email" => "yeele-event4.11388013645825@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "FOURERA KARIM",
            "pays" => "BURKINA FASO",
            "tel" => "9764485",
            "email" => "yeele-event3.48574843905885@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "JOSELINE MOULOUIS",
            "pays" => "BURKINA FASO",
            "tel" => "6671118",
            "email" => "yeele-event6.14422752594859@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BOURAMA BONKOUMGOU",
            "pays" => "BURKINA FASO",
            "tel" => "76 66 00 42",
            "email" => "yeele-event7.89880151873177@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BENAO SALOMON",
            "pays" => "BURKINA FASO",
            "tel" => "70 63 98 71",
            "email" => "yeele-event1.81790695087659@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "BASSOLE KADIATOU J",
            "pays" => "BURKINA FASO",
            "tel" => "78 69 00 01",
            "email" => "yeele-event2.99450974629198@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BADO BRAHIMA",
            "pays" => "BURKINA FASO",
            "tel" => "634749",
            "email" => "yeele-event10.2652360453409@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BAMALA DABIRE",
            "pays" => "BURKINA FASO",
            "tel" => "76 70 84 26",
            "email" => "yeele-event2.78363464420294@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "GOUBA CLARISSE",
            "pays" => "BURKINA FASO",
            "tel" => "39526100",
            "email" => "yeele-event3.69012350284211@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "SAWADOGO ROSALIE",
            "pays" => "BURKINA FASO",
            "tel" => "316982",
            "email" => "yeele-event3.41028490995776@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "ADAMOU YODA",
            "pays" => "BURKINA FASO",
            "tel" => "874980",
            "email" => "yeele-event8.63697357032043@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "ALINE KABORE",
            "pays" => "BURKINA FASO",
            "tel" => "6121929",
            "email" => "yeele-event5.0834137598129@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Madame",
            "nom" => "NAGALO CELESTINE",
            "pays" => "BURKINA FASO",
            "tel" => "5493991",
            "email" => "yeele-event2.99304513556963@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "TRAORE DENISE",
            "pays" => "BURKINA FASO",
            "tel" => "76 62 47 59",
            "email" => "yeele-event2.78933694364828@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "BARRO BRAIMA",
            "pays" => "BURKINA FASO",
            "tel" => "6168463",
            "email" => "yeele-event1.30832409431571@gmail.com",
            "tarif" => 25000,
            "payment_method" => "Sur place"
        ],
        [
            "civilite" => "Monsieur",
            "nom" => "ZALLE INOUSSA",
            "pays" => "BURKINA FASO",
            "tel" => "60 90 96 41",
            "email" => "yeele-event10.4052922096943@gmail.com",
            "tarif" => 15000,
            "payment_method" => "Sur place"
        ]
    ];

        // create participant base on the array
        foreach ($participants as $participant) {
            Participant::create([
                'lastname' => $participant['nom'],
                'firstname' => ' ',
                'phone' => (int) $participant['tel'],
                'email' => $participant['email'],
                'price' => $participant['tarif'],
                'civility' => $participant['civilite'],
                'event_uid' => 'edb028c8-5b40-4130-96af-dc6f5eb213b9',
                'payment_method' => 'Sur place',
                'additional_data' => json_encode($participant['pays']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
