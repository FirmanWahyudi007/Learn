import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import StudentIndex from './StudentIndex'
import StudentCreate from './StudentCreate'
import StudentEdit from './StudentEdit'
import StudentShow from './StudentShow'

 
class App extends Component {
    render () {
        return (
            <BrowserRouter>
                <div>
                    <Header />
                    <Switch>
                    <Route exact path='/' component={StudentIndex}/>
                    <Route exact path='/create' component={StudentCreate} />
                    <Route path='/student/edit/:id' component={StudentEdit} />
                    <Route path='/student/:id' component={StudentShow} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}
 
ReactDOM.render(<App />, document.getElementById('app'))