<?php
$link = '/assets/css/service.css';
$links = '/assets/css/dashboard.css';
$title = 'Services';
?>

<div class="container mt-4">
  <h1 class="text-center"><strong>Les services d'Arcadia : Des Activités pour Petits et Grands !</strong></h1>
</div>

<div class="mt-7">
  <h3 class="text-center mb-3 mt-3 h-title"><strong>Qu'il s'agisse d'une petite faim ou d'un grand festin, nos restaurants ont ce qu'il faut pour combler votre appétit !</strong></h3>
</div>

<div class="my-5">
  <?php $counter = 1; ?>
  
  <?php foreach ($services as $service): ?>
    <div class="row align-items-center <?php echo $counter % 2 == 1 ? 'bg-white' : ''; ?>">
      <!-- Section Image -->
      <div class="col-12 col-md-6 <?php echo $counter % 2 == 0 ? 'order-md-2' : ''; ?> text-center mb-4 mb-md-0">
        <img class="img-fluid cards w-75 <?php echo $counter % 2 == 0 ? 'cards2' : ''; ?>" src="<?= $service->slug ?>" alt="">
      </div>
      
      <!-- Section Description -->
      <div class="col-12 col-md-6 text-center <?php echo $counter % 2 == 1 ? 'desc' : 'desc2' ?> ">
        <h3 class="<?php echo $counter % 2 == 1 ? 'title' : 'title2'; ?>"><?= $service->name ?></h3>
        <h4 class="<?php echo $counter % 2 == 1 ? 'mt-4 px-3' : 'txt-white mt-4 px-3'; ?>"><?= $service->description ?></h4>
      </div>
    </div>
    <?php $counter++; ?>
  <?php endforeach; ?>
</div>



<div class="mt-7">
  <h3 class="text-center mb-3 mt-3 h-title"><strong>Préparez-vous à explorer le zoo autrement, avec des expériences qui marqueront petits et grands !</strong></h3>
</div>

<div class="container mt-5">
  <div class="row text-center justify-content-center gap-3">
    <!-- Le Safari Express -->
    <div class="col-md-3 col-sm-6 card p-3 shadow-sm">
      <img class="card-img-top mb-3" src="/assets/img/train.png" alt="petit train" style="width: 100%; height: auto;">
      <div class="card-body">
        <h3 class="card-title"><strong>Le safari express</strong></h3>
        <p class="card-text">
          Montez à bord du safari express : une aventure inoubliable à travers le zoo, où vous découvrirez les merveilles de la faune sauvage tout en profitant d'un trajet relaxant et captivant !
        </p>
      </div>
    </div>

    <!-- Le Safari Guidé -->
    <div class="col-md-3 col-sm-6 card p-3 shadow-sm">
      <img class="card-img-top mb-3" src="/assets/img/visite_guidee.png" alt="visite guidée" style="width: 100%; height: auto;">
      <div class="card-body">
        <h3 class="card-title"><strong>Le safari guidé</strong></h3>
        <p class="card-text">
          Embarquez pour le safari guidé : une aventure immersive au cœur du zoo, où nos experts vous dévoilent les secrets fascinants de la faune sauvage et vous font vivre des moments inoubliables avec les animaux !
        </p>
      </div>
    </div>

    <!-- La Jungle Party -->
    <div class="col-md-3 col-sm-6 card p-3 shadow-sm">
      <img class="card-img-top mb-3" src="/assets/img/anniv_zoo.png" alt="anniv au zoo" style="width: 100%; height: auto;">
      <div class="card-body">
        <h3 class="card-title"><strong>La jungle party</strong></h3>
        <p class="card-text">
          Venez célébrer votre anniversaire avec une jungle party explosive : dansez, explorez et amusez-vous à Arcadia, où chaque instant devient une aventure mémorable entourée de vos amis et des animaux !
        </p>
      </div>
    </div>
  </div>
  <h3 class="text-center mt-4"><strong>Les visites nocturnes !</strong></h3>
  <img class="card-img-top mb-2 mt-4" src="/assets/img/nocturne.jpg" alt="">
  <h3 class="text-center mt-4">Des murmures dans l'obscurité, des yeux qui brillent : vivez le mystère du zoo à la lueur de la lune !
    Découvrez la magie du zoo sous un autre jour... ou plutôt sous une autre nuit ! Plongez dans l'ambiance mystérieuse et fascinante de notre visite nocturne où chaque pas révèle la vie secrète des animaux à la lueur des étoiles. Une aventure sensorielle inoubliable vous attend ! Sur réservation !
    <br><br>
    <?php 
      foreach($evenement as $e){
        if(!empty($e->description)){
          echo $e->description;
        }else{
          echo "Restez connectés ! La date du prochain événement sera annoncée très prochainement. Revenez nous voir pour les dernières mises à jour !";
        }
      }?></h3>
</div>

<div class="mt-7">
  <h3 class="text-center mb-3 mt-3 h-title"><strong>Plongez au cœur de l'aventure animalière !</strong></h3>
</div>

<div class="container-fluid mt-5" id="serv">
  <div class="row d-flex justify-content-center text-center">
    <!-- Section 1 -->
    <div class="col-md-3 mx-5 p-0">
      <img class="w-100" src="/assets/img/soigneur.jpg" alt="soigneur">
      <h3 class="title mb-5 mt-2">Premier pas de soigneur</h3>
      <h3 class="mt-5"><strong>
          La journée "Premier Pas de Soigneur" au Zoo d'Arcadia offre aux passionnés des animaux l'opportunité de vivre une expérience immersive dans le quotidien d'un soigneur animalier.
          Cette activité unique permet aux participants de découvrir les coulisses du zoo, d'interagir avec divers animaux, et d'acquérir des connaissances précieuses sur le soin, l'alimentation et l'enrichissement des animaux.</strong>
        <span id="dots1">...</span>
        <span id="more1" style="display: none;">
          <br><br><strong>Programme de la Journée :
            <br><br>8h30 - Accueil des Participants : Rendez-vous à l'entrée du zoo. Accueil avec une collation et briefing sur la sécurité. Durée : 30 minutes
            <br><br>9h00 - Découverte des Coulisses : Visite des installations en coulisses, incluant la cuisine où sont préparées les rations alimentaires des animaux. Présentation du matériel utilisé par les soigneurs. Durée : 1 heure
            <br><br>10h00 - Préparation de la Nourriture et Nourrissage : Participation à la préparation des repas des animaux, suivi d'un nourrissage avec l'aide des soigneurs. Les animaux concernés varient, mais incluent généralement des herbivores comme les girafes, des primates, ou des oiseaux. Durée : 1 heure 30 minutes
            <br><br>11h30 - Activités d'Enrichissement : Création d'activités d'enrichissement pour stimuler le comportement naturel des animaux. Cela peut inclure la conception de jeux pour les félins ou des parcours alimentaires pour les primates. Durée : 1 heure
            <br><br>12h30 - Déjeuner : Pause déjeuner, fourni par le zoo, avec les autres participants. C'est l'occasion de poser des questions aux soigneurs et d'échanger des expériences. Durée : 1 heure
            <br><br>13h30 - Soin des Herbivores :
            Rencontre avec les herbivores du zoo, tels que les zèbres ou les tapirs. Participation au nettoyage de leur enclos et apprentissage des soins de base à leur apporter.
            Durée : 1 heure 30 minutes
            <br><br>15h00 - Rencontre avec un Soigneur Spécialisé :
            Discussion avec un soigneur spécialiste des grands carnivores ou des reptiles, pour en savoir plus sur leur travail, les particularités de ces animaux, et les défis auxquels ils font face.
            Durée : 1 heure
            <br><br>16h00 - Moment Libre et Feedback :
            Temps libre pour explorer le zoo à son rythme. Retour avec l’équipe pour un feedback et la remise d’un certificat de participation.
            Durée : 1 heure
            <br><br>Horaires de la Journée :
            <br>Début : 8h30
            Fin : 17h00
            <br><br>Tarif :
            Adulte (à partir de 16 ans) : 150 € par personne.
            <br>Enfant (10-15 ans, accompagné d'un adulte) : 110 € par personne.
            <br><br>Informations Supplémentaires :
            Nombre de participants limité à 10 pour garantir une expérience immersive et de qualité.
            Réservation obligatoire, avec un paiement d'acompte de 50 € pour valider la participation.
            <br><br>Tenue recommandée : vêtements confortables et chaussures adaptées pour une activité en extérieur.
            <br><br>Cette journée offre une immersion totale dans l'univers des soigneurs animaliers et permet de comprendre les enjeux du bien-être animal tout en contribuant directement aux activités du zoo. Une expérience inoubliable pour les amoureux des animaux souhaitant en savoir plus sur la vie au zoo !</strong>
        </span>
      </h3>
      <button onclick="toggleText(this)" id="myBtn1" data-target="1" class="btn btn-secondary mt-2">Lire la suite</button>
    </div>

    <!-- Section 2 -->
    <div class="col-md-3 mx-5 p-0">
      <img class="w-100" src="/assets/img/aigle.jpg" alt="aigle">
      <h3 class="title mt-2 mb-5">Les maîtres des airs</h3>
      <h3 class="mt-5"><strong>
          Le spectacle de l'aigle royal au Zoo d'Arcadia est une démonstration fascinante mettant en lumière la grâce, la puissance et les capacités impressionnantes de cet oiseau majestueux. Encadré par des fauconniers expérimentés, ce spectacle offre une opportunité unique d'observer un aigle royal en plein vol, tout en découvrant des informations passionnantes sur sa biologie, ses comportements, et l'importance de sa préservation.</strong>
        <span id="dots2">...</span>
        <span id="more2" style="display: none;">
          <br><br><strong>Début du Spectacle :
            <br><br>Le spectacle commence par une introduction sur l'aigle royal, ses caractéristiques physiques, son habitat naturel, et ses techniques de chasse. Le fauconnier présente l'oiseau, expliquant comment il est entraîné et les spécificités du lien entre l'humain et l'animal.
            Durée : 10 minutes
            <br><br>Démonstration de Vol :
            L'aigle est ensuite libéré pour une démonstration de vol spectaculaire au-dessus des spectateurs. Il effectue des cercles majestueux avant de revenir vers le fauconnier, illustrant ainsi la force et l'agilité de cet oiseau de proie. Des explications sont données sur les différentes techniques de vol, la manière dont l'aigle repère ses proies et la vitesse qu'il peut atteindre en piqué.
            Durée : 15 minutes
            <br><br>Interaction avec le Public :
            Les spectateurs peuvent voir de près l'aigle royal et poser des questions aux fauconniers. Certains volontaires peuvent même participer à une petite activité, où ils portent un gant spécial pour inviter l'aigle à se poser brièvement sur leur bras.
            Durée : 10 minutes 
            <br><br>Conclusion et Message de Préservation : La démonstration se termine par un message sur l'importance de la préservation des rapaces, en particulier des aigles, dont les populations sont menacées par la destruction de leur habitat et le braconnage.
            Durée : 5 minutes
            <br><br>Horaires du Spectacle :
            Matin : 11h00
            Après-midi : 15h00
            Chaque spectacle dure environ 40 minutes.
            <br><br>Lieu de l'Animation :
            Amphithéâtre des Rapaces ( en périphérie de la volière) du Zoo d'Arcadia, une aire en plein air aménagée pour offrir une vue optimale des démonstrations, avec des gradins pour le public et une zone dégagée pour permettre aux oiseaux de voler en toute liberté.
            <br><br>Informations Supplémentaires :
            L'accès au spectacle est inclus dans le billet d'entrée du zoo.
            Il est recommandé d'arriver 15 minutes avant le début de l'animation pour garantir une bonne place.
            L'amphithéâtre est en plein air, donc il est conseillé de prévoir une protection solaire ou des vêtements de pluie en fonction de la météo.
            Ce spectacle permet de découvrir toute la beauté de l'aigle royal dans un cadre sécurisé, tout en sensibilisant le public aux enjeux de la protection de ces impressionnants prédateurs des airs. Une expérience à ne pas manquer pour petits et grands amoureux de la nature !</strong>
        </span>
      </h3>
      <button onclick="toggleText(this)" id="myBtn2" data-target="2" class="btn btn-secondary mt-2">Lire la suite</button>
    </div>

    <!-- Image de l'otarie -->
    <div class="col-md-3 mx-5 p-0">
      <img class="w-100" src="/assets/img/otarie.jpg" alt="otarie">
      <h3 class="title mt-2 mb-5">L'Odyssée des lions de mer </h3>
      <h3 class="mt-5"><strong>Le spectacle de lions de mer au Zoo d'Arcadia est une animation divertissante et éducative qui met en valeur l'intelligence et les compétences étonnantes de ces animaux marins. Sous la direction de leurs soigneurs, les lions de mer effectuent une série d'acrobaties, de jeux aquatiques et d'exercices. Ce spectacle est à la fois amusant pour toute la famille et instructif, sensibilisant le public à la conservation des espèces marines.</strong>
        <span id="dots3">...</span>
        <span id="more3" style="display: none;">
          <br><br><strong>Début du Spectacle :
            <br><br>Le spectacle commence par une présentation des lions de mer participants. Les soigneurs expliquent les caractéristiques de ces mammifères marins, leurs habitats naturels, ainsi que les menaces qui pèsent sur eux dans la nature.
            Durée : 10 minutes
            <br><br>Enchaînement d'Exercices et d'Acrobaties :
            Les lions de mer exécutent des sauts, des plongeons et divers tours en réponse aux instructions de leurs soigneurs. Ces performances montrent leur incroyable agilité, leur mémoire, et leur aptitude à apprendre des comportements complexes. Certains des tours incluent le saut à travers des cerceaux, l'équilibrage de balles sur le museau, et des jeux de coopération avec les soigneurs.
            Durée : 15 minutes
            <br><br>Interaction avec le Public :
            Les lions de mer s'approchent du bord de la scène pour interagir avec les spectateurs. Quelques volontaires sont choisis pour participer directement, par exemple en lançant une balle ou en saluant les lions de mer, créant des moments mémorables pour les participants.
            Durée : 10 minutes
            <br><br>Message de Conservation et Conclusion :
            Pour conclure, les soigneurs parlent de l'importance de protéger les océans et les mammifères marins. Ils donnent des conseils sur la manière dont chacun peut contribuer à la conservation des espèces marines.
            Durée : 5 minutes
            <br><br>Horaires du Spectacle :
            Matin : 10h30
            Après-midi : 14h30
            Chaque spectacle dure environ 40 minutes.
            <br><br>Lieu de l'Animation :
            En Périphérie de l'Aquarium, dans l’Espace Marin du Zoo d'Arcadia. Cette zone est spécialement aménagée avec un bassin en plein air, entouré de gradins pour permettre aux spectateurs d'avoir une vue idéale sur les acrobaties des lions de mer. L'emplacement est situé à côté de l'aquarium principal, offrant une immersion totale dans l'univers marin.
            <br><br>Informations Supplémentaires :
            Le spectacle est inclus dans le billet d'entrée du zoo.
            Il est recommandé d'arriver 15 minutes avant le début pour trouver une place assise, surtout pendant les périodes de grande affluence.
            La zone du spectacle est partiellement couverte, mais il est conseillé de prévoir une protection contre le soleil lors des journées très chaudes.
            Ce spectacle est conçu pour émerveiller les petits et les grands, tout en sensibilisant les visiteurs à la préservation des océans et des animaux marins. C’est un moment amusant, éducatif, et inoubliable à partager en famille !</strong>
        </span>
      </h3>
      <button onclick="toggleText(this)" id="myBtn3" data-target="3" class="btn btn-secondary mt-2">Lire la suite</button>
    </div>
  </div>
</div>

<div class="mt-7">
  <h3 class="text-center mb-3 mt-3 h-title"><strong>Avant de partir, emportez un peu de la magie du zoo avec vous : un souvenir pour prolonger l'aventure chez vous !</strong></h3>
</div>

<div class="my-5">
    <div class="row align-items-center bg-white flex-row">
      <div class="col-md-6 col-lg-5 text-center mb-4 mb-md-0">
        <img class="img-fluid cards w-75" src="assets/img/souvenir.webp" alt="">
      </div>
      <div class="col-md-6 col-lg-7 text-center desc">
        <h3 class="title">Les trésors d'Arcadia</h3>
        <h4 class="mt-4 px-3">Prolongez votre aventure avec un souvenir unique de notre boutique , pour garder un petit morceau d'Arcadia près de vous !</h4>
      </div>
    </div>
</div>

<?php $script = '/assets/js/form.js' ?>