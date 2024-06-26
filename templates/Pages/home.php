<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $events
 * @var int $nbAnnonceMarcheNoir
 */
echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));
?>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"
/>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
/>
<input type="hidden" id="annonceImg" value="<?= $this->Url->build("/img/annonce/") ?>">
<input type="hidden" id="eventImg" value="<?= $this->Url->build("/img/placeholder/tombolla_placeholder.png") ?>">
<input type="hidden" id="blackMarketImg" value="<?= $this->Url->build("/img/placeholder/enchere_illegal_placeholder.png") ?>">
<input type="hidden" id="numMarketAnnonce" value="<?= $nbAnnonceMarcheNoir ?>">
<input type="hidden" id="routerBase" value="<?= $this->request->domain() == "localhost" ? '/beltclub' : '/' ?>">
<input type="hidden" id="marketAnnonceUrl" value="<?= $this->Url->build("/events/get-events-market") ?>">


<div class="my-5 w-100 h-100" id="composant_react">

</div>


<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<!--DEV-->
<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

<!--PROD-->
<!--<script crossorigin src="https://unpkg.com/react@18.1.0/umd/react.production.min.js"></script>-->
<!--<script crossorigin src="https://unpkg.com/react-dom@18.1.0/umd/react-dom.production.min.js"></script>-->


<!-- Load history -->
<script src="https://unpkg.com/history@5/umd/history.development.js" crossorigin></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- Load React Router and React Router DOM -->
<script src="https://unpkg.com/react-router@6/umd/react-router.development.js" crossorigin></script>
<script src="https://unpkg.com/react-router-dom@6/umd/react-router-dom.development.js" crossorigin></script>

<script src="https://cdn.jsdelivr.net/npm/axios@0.27.2/dist/axios.min.js"></script>

<script type="text/babel" src="<?= $this->Url->build("/js/react/constLoader.js"); ?>"></script>
<script type="text/babel" src="<?= $this->Url->build("/js/react/choose.js"); ?>"></script>
<script type="text/babel" src="<?= $this->Url->build("/js/react/annonce.js"); ?>"></script>
<script type="text/babel" src="<?= $this->Url->build("/js/react/pagination.js"); ?>"></script>
<script type="text/babel" src="<?= $this->Url->build("/js/react/market.js"); ?>"></script>
<script type="text/babel" src="<?= $this->Url->build("/js/react/result.js"); ?>"></script>
<script type="text/babel" src="<?= $this->Url->build("/js/react/search.js"); ?>"></script>
<script type="text/babel" src="<?= $this->Url->build("/js/react/main.js"); ?>"></script>

