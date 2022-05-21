const Routes = window.ReactRouterDOM.Routes;
const Route = window.ReactRouterDOM.Route;
const BrowserRouter =  window.ReactRouterDOM.BrowserRouter;
const Link =  window.ReactRouterDOM.Link;
const Axios = window.axios;
const useSearchParams =  window.ReactRouterDOM.useSearchParams;

const domMain = document.getElementById("composant_react");
const CSRF = $('meta[name="csrfToken"]').attr('content');
const marketAnnonceUrl = document.getElementById("marketAnnonceUrl").value;
const blackMarketImg = document.getElementById("blackMarketImg").value;
const eventImg = document.getElementById("eventImg").value;
const annonceImg = document.getElementById("annonceImg").value;
const routerBase = document.getElementById("routerBase").value;
var nbAnnonceMarcheNoir = document.getElementById("numMarketAnnonce").value;


