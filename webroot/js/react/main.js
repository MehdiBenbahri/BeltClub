const App = () => {
    return (
        <div className="app">
            <BrowserRouter>
                <Routes>
                    <Route path={routerBase} element={<Choose
                        blackMarketImg={blackMarketImg}
                        eventImg={eventImg}
                        nbAnnonceMarcheNoir={nbAnnonceMarcheNoir}
                    />}/>
                    <Route path={routerBase + "/app/market"} element={<Market/>}/>}/>
                </Routes>
            </BrowserRouter>
        </div>
    )
}


ReactDOM.render(<App routeurBase={routerBase}/>, domMain);
