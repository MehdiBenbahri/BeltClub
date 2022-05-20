const Market = () => {

    function handleSearch(e) {
        setQuery(e.target.value)
        setReset(true)
    }

    const [reset, setReset] = window.React.useState(false);
    const [query, setQuery] = window.React.useState("");

    return (
        <div>
            <div className="d-flex justify-content-center align-items-center w-100">
                <input id="search" onChange={handleSearch} type="text"
                       className="bg-dark w-75 center-placeholder form-control text-light"
                       placeholder="Rechercher des annonces / des offres 🔎"/>
            </div>
            <Pagination query = {query} reset = {reset} />

        </div>
    )

}
