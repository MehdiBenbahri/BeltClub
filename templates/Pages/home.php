<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $events
 * @var int $nbAnnonceMarcheNoir
 */
?>
<input type="hidden" id="eventImg" value="<?= $this->Url->build("/img/placeholder/tombolla_placeholder.png") ?>">
<input type="hidden" id="blackMarketImg" value="<?= $this->Url->build("/img/placeholder/enchere_illegal_placeholder.png") ?>">
<input type="hidden" id="numMarketAnnonce" value="<?= $nbAnnonceMarcheNoir ?>">
<div class="my-5 w-100" id="composant_react">

</div>

<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<!--DEV-->
<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

<!--PROD-->
<!--<script crossorigin src="https://unpkg.com/react@18.1.0/umd/react.production.min.js"></script>-->
<!--<script crossorigin src="https://unpkg.com/react-dom@18.1.0/umd/react-dom.production.min.js"></script>-->


<script type="text/babel" src="<?= $this->Url->build("/js/react/main.js"); ?>"></script>

