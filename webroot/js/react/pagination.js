const Pagination = (query) => {

    const [pageNumber, setPageNumber] = window.React.useState(0);
    const [lastQuery, SetLastQuery] = window.React.useState(query.query);

    window.React.useEffect(() => {
        if (query.reset && query.query != lastQuery) {
            setPageNumber(0);
            SetLastQuery(query.query);
        }
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
        }} className="btn m-1 btn-outline-light"><i className="bi bi-caret-right-fill"></i></button>)
        return list;
    }

    return (
        <div>
            <div className="row p-5">
                <div className="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                    <Search q={query.query} pageNumber={pageNumber}/>
                </div>
                <div className="col-xl-4 col-lg-4 col-md-6 col-sm-12 bg-secondary rounded">
                    <h6 className="text-light mt-3">Filtre</h6>
                    <select className="form-select" name="" id="">
                        <option value="">BERETTA</option>
                    </select>
                    <h6 className="text-light mt-3">Ajouter une annonce</h6>
                    
                </div>
            </div>
            <div className="d-flex justify-content-evenly align-items-center flex-wrap mt-1">
                <div className="w-75 d-flex justify-content-center align-items-center flex-wrap">
                    {getButtons()}
                </div>
            </div>
        </div>
    )
}
