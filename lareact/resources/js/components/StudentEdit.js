import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import SweetAlert from 'react-bootstrap-sweetalert';
 
    class StudentEdit extends Component {
      constructor (props) {
        super(props)
        this.state = {
          nama: '',
          jenis_kelamin: '',
          no_hp: '',
          alamat: '',
          angkatan: '',
          alert: null,
          message:'',
          errors: []
        }
        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleUpdateStudent = this.handleUpdateStudent.bind(this)
        this.hasErrorFor = this.hasErrorFor.bind(this)
        this.renderErrorFor = this.renderErrorFor.bind(this)
      }
 
      handleFieldChange (event) {
        this.setState({
          [event.target.name]: event.target.value
        })
      }
 
      componentDidMount () {
 
        const studentID = this.props.match.params.id
 
        axios.get(`/api/student/${studentID}/edit`).then(response => {
          this.setState({
            nama: response.data.nama,
            jenis_kelamin: response.data.jenis_kelamin,
            no_hp: response.data.no_hp,
            alamat: response.data.alamat,
            angkatan: response.data.angkatan,
          })
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
                {this.state.message}
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
 
      handleUpdateStudent (event) {
        event.preventDefault()
 
        const student = {
          nama: this.state.nama,
          jenis_kelamin: this.state.jenis_kelamin,
          no_hp: this.state.no_hp,
          alamat: this.state.alamat,
          angkatan: this.state.angkatan,
        }
 
        const studentID = this.props.match.params.id
 
        axios.put(`/api/student/${studentID}`, student)
          .then(response => {
            // redirect to the homepage
            var msg = response.data.success;
            if(msg == true){
                this.setState({
                    message: response.data.message
                })
                return this.goToHome();
            }
 
          });
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
        const { student } = this.state
        return (
          <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-6'>
                <div className='card'>
                  <div className='card-header'>Edit Student</div>
                  <div className='card-body'>
                    <form onSubmit={this.handleUpdateStudent}>
                      <div className='form-group'>
                        <label htmlFor='nama'>Nama</label>
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
                          id='jenis_kelamin'
                          type='text'
                          className={`form-control ${this.hasErrorFor('jenis_kelamin') ? 'is-invalid' : ''}`}
                          name='jenis_kelamin'
                          value={this.state.jenis_kelamin}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('jenis_kelamin')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='no_hp'>No HP</label>
                        <input
                          id='no_hp'
                          type='text'
                          className={`form-control ${this.hasErrorFor('no_hp') ? 'is-invalid' : ''}`}
                          name='no_hp'
                          value={this.state.no_hp}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('no_hp')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='alamat'>Alamat</label>
                        <input
                          id='alamat'
                          type='text'
                          className={`form-control ${this.hasErrorFor('alamat') ? 'is-invalid' : ''}`}
                          name='alamat'
                          value={this.state.alamat}
                          onChange={this.handleFieldChange}
                        />
                        {this.renderErrorFor('alamat')}
                      </div>
                      <div className='form-group'>
                        <label htmlFor='angkatan'>Angkatan</label>
                        <input
                          id='angkatan'
                          type='text'
                          className={`form-control ${this.hasErrorFor('angkatan') ? 'is-invalid' : ''}`}
                          name='angkatan'
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
                      
                      <button className='btn btn-primary'>Update</button>
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
export default StudentEdit