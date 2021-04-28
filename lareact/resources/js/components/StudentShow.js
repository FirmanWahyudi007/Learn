import axios from 'axios'
import React, { Component} from 'react'
import { Link } from 'react-router-dom'

class StudentShow extends Component {
    constructor(props) {
        super(props)
        this.state = {
            student: {}
        }
    }

        componentDidMount () {
            const studentId = this.props.match.params.id
            axios.get(`/api/student/${studentId}`).then(response => {
              this.setState({
                student: response.data
              })
            })
        }
        render () {
            const { student } = this.state
     
            return (
              <div className='container py-4'>
                <div className='row justify-content-center'>
                  <div className='col-md-8'>
                    <div className='card'>
                      <div className='card-header'>Show Student</div>
                      <div className='card-body'>
                        <div className="table-responsive">
                            <table>
                                <tbody>
                                    <tr >
                                        <td colSpan='2'>Nama</td>
                                        <td> :</td>
                                        <td> {student.nama}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan='2'>Jenis Kelamin</td>
                                        <td> :</td>
                                        <td> {student.jenis_kelamin}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan='2'>No HP</td>
                                        <td> :</td>
                                        <td> {student.no_hp}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan='2'>Alamat</td>
                                        <td> :</td>
                                        <td> {student.alamat}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan='2'>Angakatan</td>
                                        <td> :</td>
                                        <td> {student.angkatan}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <Link
                                className='btn btn-primary'
                                to={`/`}
                                >Back
                            </Link>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            )
        }
    }
    export default StudentShow