const Annonce = (obj) => {

    return ( (obj.obj == null) ? (
            <div className="w-75 py-3 rounded my-2 glass-effect-annonce text-light row">
                <div className="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                    <div className="rounded-img-sm animated-background"></div>
                </div>
                <div className="col-xl-10 col-lg-10 col-md-9 col-sm-12">
                    <h5 className="text-uppercase text-light animated-background w-100">LOADING...</h5>
                    <div className="d-flex justify-content-start mt-4 align-items-center">
                        <div className="description w-100">
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
            </div>
        ) : (
            <div className="w-75 py-3 rounded my-2 glass-effect-annonce text-light row">
                <div className="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                    <div className="rounded-img-sm animated-background"></div>
                </div>
                <div className="col-xl-10 col-lg-10 col-md-9 col-sm-12">
                    <h5 className="text-uppercase text-light w-100">{obj.obj.title}</h5>
                    <div className="d-flex justify-content-start mt-4 align-items-center">
                        <div className="description w-100">
                            <p className="w-75">
                                {obj.obj.description}
                            </p>
                        </div>
                        <div className="d-flex justify-content-center align-items-center flex-column">
                            <span className="text-light h3">{new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(obj.obj.price)}</span>
                            {obj.obj.is_negociable ? (
                                <span className="badge bg-warning text-dark">
                                    Prix négociable 
                                    <i className="bi bi-check-lg"></i>
                                </span>
                            ) : '' }
                        </div>
                    </div>
                </div>
            </div>
        )
    )
}
