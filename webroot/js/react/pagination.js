const Pagination = (query) => {

    const [pageNumber, setPageNumber] = window.React.useState(0);
    const [lastQuery, SetLastQuery] = window.React.useState(query.query);

    window.React.useEffect(() => {
        if (query.reset && query.query != lastQuery) {
            setPageNumber(0);
            SetLastQuery(query.query);
        }
        loadChoices();
    })

    function getButtons() {
        var list = [];
        list.push(<button key={"button-prev"} onClick={() => {
            setPageNumber(0)
        }} className="btn m-1 btn-outline-light"><i className="bi bi-caret-left-fill"></i></button>)

        for (let i = 0; i < ((nbAnnonceMarcheNoir / 10) + pageNumber); i++) {
            if (i <= nbAnnonceMarcheNoir / 10) {
                if (pageNumber <= i + 3 && pageNumber >= i - 3) {
                    if (i == pageNumber) {
                        list.push(<button key={"button-" + i} onClick={() => {
                            setPageNumber(i)
                        }} className="btn active m-1 btn-outline-light">{i + 1}</button>)
                    } else {
                        list.push(<button key={"button-" + i} onClick={() => {
                            setPageNumber(i)
                        }} className="btn m-1 btn-outline-light">{i + 1}</button>)
                    }
                }

            }
        }
        list.push(<button key={"button-next"} onClick={() => {
            setPageNumber(nbAnnonceMarcheNoir / 10)
        }} className="btn m-1 btn-outline-light"><i className="bi bi-caret-right-fill"></i></button>);
        return list;
    }

    function loadChoices(){
        let element = document.getElementById('tags-select');
        console.log(element);
        if (element != null){
            let choices = new Choices(element,{
                maxItemCount: -1,
                allowHTML: false,
                editItems: false,
                searchEnabled: false,
                searchChoices: false,
                noResultsText: 'Aucun résultat trouvé',
                noChoicesText: 'Aucun résultat trouvé',
                itemSelectText: 'Cliquez pour sélectionner',
            });
        }
    }

    return (
        <div>
            <div className="d-flex justify-content-evenly align-items-center flex-wrap mt-1">
                <div className="w-75 d-flex justify-content-center align-items-center flex-wrap">
                    {getButtons()}
                </div>
            </div>
            <div className="row px-5">
                <div className="col-xl-4 col-lg-4 col-md-6 col-sm-12 bg-dark-blue rounded">
                    <h6 className="text-light mt-3 text-uppercase">Filtres</h6>
                    <select multiple="multiple" className="form-select bg-dark" id="tags-select">
                        <option value="BERETTA">BERETTA</option>
                        <option value="BERETTB">AK-COMPACT</option>
                        <option value="BERETTC">GUNSENBERG</option>
                    </select>
                    <h6 className="text-light mt-3 text-uppercase">Ajouter une annonce</h6>
                </div>
                <div className="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                    <Search q={query.query} pageNumber={pageNumber}/>
                </div>
            </div>
            <hr/>
            <div className="d-flex justify-content-evenly align-items-center flex-wrap mt-1">
                <div className="w-75 d-flex justify-content-center align-items-center flex-wrap">
                    {getButtons()}
                </div>
            </div>
        </div>
    )
}
