import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import SweetAlert from 'react-bootstrap-sweetalert';
 
class StudentCreate extends Component {
     
    constructor (props) {
        super(props)
        this.state = {
            nama: '',
            jenis_kelamin: '',
            no_hp: '',
            alamat: '',
            angkatan: '',
            alert: null,
            errors: []
        }
        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleCreateNewStudent = this.handleCreateNewStudent.bind(this)
        this.hasErrorFor = this.hasErrorFor.bind(this)
        this.renderErrorFor = this.renderErrorFor.bind(this)
    }
 
    handleFieldChange (event) {
        this.setState({
            [event.target.name]: event.target.value
        })
    }
 
    goToHome(){
        const getAlert = () => (
            <SweetAlert
                success
                title="Success!"
                onConfirm={() => this.onSuccess() }
                onCancel={this.hideAlert()}
                timeout={2000}
                confirmBtnText="Oke Siap"
                >
                Created student successfully
            </SweetAlert>
        );
        this.setState({
            alert: getAlert()
        });
    }
 
    onSuccess() {
        this.props.history.push('/');
    }
 
    hideAlert() {
        this.setState({
            alert: null
        });
    }
 
    handleCreateNewStudent (event) {
        event.preventDefault()
        const student = {
          nama: this.state.nama,
          jenis_kelamin: this.state.jenis_kelamin,
          no_hp: this.state.no_hp,
          alamat: this.state.alamat,
          angkatan: this.state.angkatan,
        }
        axios.post('/api/student', student).then(response => { 
            var msg = response.data.success;
            if(msg == true){
                return this.goToHome();
            }
        })
    }
 
    hasErrorFor (field) {
        return !!this.state.errors[field]
    }
 
    renderErrorFor (field) {
        if (this.hasErrorFor(field)) {
            return (
            <span className='invalid-feedback'>
                <strong>{this.state.errors[field][0]}</strong>
            </span>
            )
        }
    }
 
    render () {
        return (
        <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-6'>
                <div className='card'>
                  <div className='card-header'>Create new student</div>
                  <div className='card-body'>
                    <form onSubmit={this.handleCreateNewStudent}>
                      <div className='form-group'>
                        <label htmlFor='title'>Nama</label>
                        <input
                          id='nama'
                          type='text'
                          className={`form-control ${this.hasErrorFor('nama') ? 'is-invalid' : ''}`}
                          name='nama'
                          value={this.state.nama}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('nama')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='jenis_kelamin'>Jenis Kelamin</label>
                        <input
                          type='text'
                          id='jenis_kelamin'
                          className={`form-control ${this.hasErrorFor('jenis_kelamin') ? 'is-invalid' : ''}`}
                          name='jenis_kelamin'
                          rows='10'
                          value={this.state.jenis_kelamin}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('jenis_kelamin')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='no_hp'>No HP</label>
                        <input
                          type='text'
                          id='no_hp'
                          className={`form-control ${this.hasErrorFor('no_hp') ? 'is-invalid' : ''}`}
                          name='no_hp'
                          rows='10'
                          value={this.state.no_hp}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('no_hp')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='alamat'>Alamat</label>
                        <input
                          type='text'
                          id='alamat'
                          className={`form-control ${this.hasErrorFor('alamat') ? 'is-invalid' : ''}`}
                          name='alamat'
                          rows='10'
                          value={this.state.alamat}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('alamat')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='angkatan'>Angkatan</label>
                        <input
                          type='text'
                          id='angkatan'
                          className={`form-control ${this.hasErrorFor('angkatan') ? 'is-invalid' : ''}`}
                          name='angkatan'
                          rows='10'
                          value={this.state.angkatan}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('angkatan')}
                      </div>
                      <Link
                        className='btn btn-secondary'
                        to={`/`}
                        >Back
                      </Link>

                      <button className='btn btn-primary'>Create</button>
                      {this.state.alert}
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        )
    }
}
export default StudentCreate