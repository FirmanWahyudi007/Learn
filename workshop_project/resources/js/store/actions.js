let actions = {
    fetchArticles({commit}) {
        axios.get('/api/artikel')
            .then(res => {
                commit('FETCH_ARTICLES', res.data)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions