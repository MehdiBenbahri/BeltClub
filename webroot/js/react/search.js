const Search = (query) => {

    const [loading, setLoading] = window.React.useState(true);
    const [error, setError] = window.React.useState(false);
    const [annonces, setAnnonces] = window.React.useState(getLoadingAnnonce(4));
    const [hasMore, setHasMore] = window.React.useState(false);
    Axios.defaults.headers.common['X-CSRF-TOKEN'] = CSRF;

    window.React.useEffect(() => {
        setAnnonces(getLoadingAnnonce(4))
    }, [query])

    function getLoadingAnnonce(num) {
        let list = [];
        for (let i = 1; i <= num; i++) {
            list.push(<Annonce key={"uniq" + i} obj={null}/>);
        }
        return list;
    }

    window.React.useEffect(() => {
        setLoading(true)
        setError(false)
        let cancel;
        axios({
            method: 'POST',
            url: marketAnnonceUrl,
            params: {q: query.q, page: query.pageNumber},
            cancelToken: new axios.CancelToken(c => cancel = c)
        }).then(res => {
            setAnnonces(prevBooks => {
                //return [...new Set([...prevBooks, ...res.data.docs.map(b => b.title)])]
                console.log(res.data);

                return res.data.map(obj =>
                    <Annonce key={obj.id} obj={obj}/>
                );


            })
            setHasMore(res.data.length > 0)
            setLoading(false)
        }).catch(e => {
            if (axios.isCancel(e)) return
            setError(true)
        })
        return () => cancel()
    }, [query.q, query.pageNumber])

    return [loading, error, annonces, hasMore]

}
