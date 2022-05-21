const Annonce = (obj) => {

    return ((obj.obj == null) ? (
            <div className="py-3 w-100 rounded my-2 glass-effect-annonce text-light">
                <div className="d-flex justify-content-between align-items-center px-2">
                    <div>
                        <span className="badge text-uppercase h4 bg-secondary animated-background">LOADING...</span>
                        <h5 className="text-uppercase text-light animated-background w-100">LOADING...</h5>
                    </div>
                    <img className="rounded-img-sm" src="http://placehold.jp/350x350.png?text=Loading..."
                         alt="loading image..."/>
                </div>
                <div className="d-flex justify-content-start mt-4 align-items-center">
                    <div className="description p-2 w-100">
                        <p className="animated-background">
                            l
                        </p>
                        <p className="animated-background">
                            l
                        </p>
                        <p className="animated-background">
                            l
                        </p>
                        <p className="animated-background">
                            l
                        </p>
                    </div>
                </div>
            </div>
        ) : (
            <div className="w-100 py-3 rounded my-2 glass-effect-annonce text-light">
                <div className="d-flex justify-content-between align-items-center px-2">
                    <div>
                        <span className="badge text-uppercase h4 bg-danger">{obj.obj.type.nom}</span>
                        <h5 className="text-uppercase text-light w-100">
                            {obj.obj.title}
                        </h5>
                    </div>
                    <img className="rounded-img-sm" src={annonceImg + obj.obj.type.slug + '.png'}
                         alt={obj.obj.type.slug}/>
                </div>
                <div className="d-flex flex-wrap justify-content-between align-items-center">
                    <div className="description p-2 w-100">
                        <p className="w-75">
                            {obj.obj.description}
                        </p>
                    </div>
                    <div className="d-flex justify-content-between align-items-center">
                            <span className="text-light mx-1 h5">{new Intl.NumberFormat('en-US', {
                                style: 'currency',
                                currency: 'USD'
                            }).format(obj.obj.price)}</span>
                        {obj.obj.is_negociable ? (
                            <span className="badge mx-1 bg-warning text-dark">
                                    Prix négociable
                                    <i className="bi bi-check-lg"></i>
                                </span>
                        ) : ''}
                    </div>
                </div>
            </div>
        )
    )
}
