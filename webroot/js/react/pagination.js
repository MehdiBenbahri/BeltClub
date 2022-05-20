const Pagination = (query) => {

    const [pageNumber, setPageNumber] = window.React.useState(1);

    window.React.useEffect(() => {
        if (query.reset){
            setPageNumber(1);
        }
    }, [query.reset])

    function getButtons(){
        console.log(query.reset);

        var list = [];
        for (let i = 1; i < ((nbAnnonceMarcheNoir / 10) + pageNumber); i++) {
            if (i <= nbAnnonceMarcheNoir / 10){
                if (i == pageNumber){
                    list.push(<button key={"button-" + i} onClick={() => setPageNumber(i)} className="btn active m-1 btn-outline-light">{i}</button>)
                }
                else{
                    list.push(<button key={"button-" + i} onClick={() => setPageNumber(i)} className="btn m-1 btn-outline-light">{i}</button>)
                }
            }
        }
        return list;
    }

    return (
        <div className="d-flex justify-content-evenly align-items-center flex-wrap mt-3">
            <div className="w-75 d-flex justify-content-evenly align-items-center flex-wrap">
            {getButtons()}
            </div>
            <Search q = {query.query} pageNumber = {pageNumber} />
        </div>
    )
}
