class Choose extends React.Component {
    render() {
        return (
            <div className="d-flex justify-content-around align-items-center flex-wrap">
                <div className="rounded rounded-lg shadow animate__animated animate__bounceInLeft">
                    <div className="glass-effect rounded mt-1 d-flex flex-column justify-content-around align-items-center p-3">
                        <img src={this.props.eventImg}
                             className="rounded-img gray-filter m-2 border border-secondary"/>
                        <h4 className="text-light text-uppercase mt-1">Évènements</h4>
                        <ul className="text-light p-0">
                            <li className="d-flex my-1 justify-content-between align-items-center">
                                <span className="mx-1">Nouveauté en direct</span>
                                <i className="bi bi-newspaper"></i>
                            </li>
                            <li className="d-flex my-1 justify-content-between align-items-center">
                                <span className="mx-1">Disponible dans toute la ville</span>
                                <i className="bi bi-geo-alt-fill"></i>
                            </li>
                            <li className="d-flex my-1 justify-content-between align-items-center">
                                <span className="mx-1">Lots à gagner</span>
                                <i className="bi bi-gift"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="rounded rounded-lg shadow animate__animated animate__bounceInRight">
                    <div className="glass-effect rounded mt-1 d-flex flex-column justify-content-around align-items-center p-3 glint-effect">
                        <img src={this.props.blackMarketImg}
                             className="rounded-img m-2 border border-secondary object-right"/>
                        <h4 className="text-light text-uppercase mt-1">Marché noir</h4>
                        <button className="btn btn-outline-light">Je vais faire mes courses ! <i className="bi bi-basket2"></i></button>
                        <ul className="text-light p-0">
                            <li className="d-flex my-1 justify-content-between align-items-center">
                                <span className="mx-1">0 indépendant</span>
                                <i className="bi bi-person-x-fill"></i>
                            </li>
                            <li className="d-flex my-1 justify-content-between align-items-center">
                                <span className="mx-1">{this.props.nbAnnonceMarcheNoir} annonces disponible</span>
                                <i className="bi bi-list-check"></i>
                            </li>
                            <li className="d-flex my-1 justify-content-between align-items-center">
                                <span className="mx-1">Un marché auto-gérer par l'illégal</span>
                                <i className="bi bi-hand-thumbs-up-fill"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        )
    }
}

const domMain = document.getElementById("composant_react");
const blackMarketImg = document.getElementById("blackMarketImg").value;
const eventImg = document.getElementById("eventImg").value;
var nbAnnonceMarcheNoir = document.getElementById("numMarketAnnonce").value;
ReactDOM.render(<Choose
    blackMarketImg={blackMarketImg}
    eventImg={eventImg}
    nbAnnonceMarcheNoir={nbAnnonceMarcheNoir}
/>, domMain);
