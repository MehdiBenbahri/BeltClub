const Search = (query) => {

    const [loading, setLoading] = window.React.useState(true);
    const [error, setError] =  window.React.useState(false);
    const [books, setBooks] =  window.React.useState([]);
    const [hasMore, setHasMore] =  window.React.useState(false);
    Axios.defaults.headers.common['X-CSRF-TOKEN'] = CSRF;

    window.React.useEffect(() => {
        setBooks([])
    }, [query])

    window.React.useEffect(() => {
        setLoading(true)
        setError(false)
        let cancel
        axios({
            method: 'POST',
            url: marketAnnonceUrl,
            params: { q: query.q, page: query.pageNumber },
            cancelToken: new axios.CancelToken(c => cancel = c)
        }).then(res => {
            setBooks(prevBooks => {
                //return [...new Set([...prevBooks, ...res.data.docs.map(b => b.title)])]
                //console.log(res.data);
                return "";
            })
            setHasMore(res.data.docs.length > 0)
            setLoading(false)
        }).catch(e => {
            if (axios.isCancel(e)) return
            setError(true)
        })
        return () => cancel()
    }, [query.q, query.pageNumber])

    return [loading, error, books, hasMore]

}
