<template>
     <div class="container">
        <div class="row mt-5" >
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                    <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Prioridad</th>
                        <th>Detalles</th>
                  </tr>
                  <tr v-for="paciente in pacientes" :key="paciente.patient_id">
                      

                    <td v-if="paciente.state_patient_id === 1">{{paciente.patient_id}}</td>
                    <td v-if="paciente.state_patient_id === 1">{{paciente.name}}</td>
                    <td v-if="paciente.state_patient_id === 1">{{paciente.priority}}</td>

                    <td v-if="paciente.state_patient_id === 1">
                        <button class="btn btn-success" @click="DetallesModal(paciente)">Detalles<i class="fas fa-user-plus fa-fw"></i></button>
                    </td>
                  </tr>
                </tbody></table>
              </div>
            </div>

          </div>
        </div>
<div id="addNew" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" v-show="!editmode" id="exampleModalLabel">Nuevo Paciente</h5>
        <h5 class="modal-title" v-show="editmode" id="exampleModalLabel">Detalles Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="editmode ? updatePatient() : createPatient()">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name" class="col-form-label">Nombre:</label>
                    <input v-model="form.name" v-show="!editmode"  type="text" class="form-control" id="name" name="name">
                    <input v-model="form.name" v-show="editmode" type="text" class="form-control" id="name" name="name" value="${pacientes.name}" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastname" class="col-form-label">Apellido:</label>
                    <input v-model="form.lastname" v-show="!editmode" type="text" class="form-control" id="lastname" name="lastname">
                    <input v-model="form.lastname" v-show="editmode" type="text" class="form-control" id="lastname" name="lastname" value="${form.lastname}" disabled>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="address" class="col-form-label">Edad:</label>
                    <input v-model="form.address"  v-show="!editmode" type="number" class="form-control" id="address" name="address">
                    <input v-model="form.address"  v-show="editmode" type="number" class="form-control" id="address" name="address" value="${form.address}" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="district" class="col-form-label">Distrito:</label>
                    <input v-model="form.district"  v-show="!editmode" type="text" class="form-control" id="district" name="district">
                    <input v-model="form.district"  v-show="editmode" type="text" class="form-control" id="district" name="district" value="${form.district}" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="reference" class="col-form-label">Referencia:</label>
                    <input v-model="form.reference"  v-show="!editmode" type="text" class="form-control" id="reference" name="reference">
                    <input v-model="form.reference"  v-show="editmode" type="text" class="form-control" id="reference" name="reference" value="${form.reference}" disabled>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="priority" class="col-form-label">Prioridad:</label>
                    <select v-model="form.priority"  v-show="!editmode" class="form-control" id="priority" name="priority">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select v-model="form.priority"  v-show="editmode" class="form-control" id="priority" name="priority" value="${form.priority}" disabled>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="doctor" class="col-form-label">Doctor:</label>
                    <input v-model="form.doctor"  v-show="!editmode" type="text" class="form-control" id="doctor" name="doctor">
                    <input v-model="form.doctor"  v-show="editmode" type="text" class="form-control" id="doctor" name="doctor" value="${form.doctor}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="oa" class="col-form-label">Codigo OA:</label>
                    <input v-model="form.oa"  type="text" class="form-control" id="oa" name="oa" >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="insurance" class="col-form-label">Seguro:</label>
                    <input v-model="form.insurance"  v-show="!editmode" type="text" class="form-control" id="insurance" name="insurance">
                    <input v-model="form.insurance"  v-show="editmode" type="text" class="form-control" id="insurance" name="insurance" value="${form.insurance}" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="cellphone" class="col-form-label">Celular:</label>
                    <input v-model="form.cellphone"  v-show="!editmode" type="text" class="form-control" id="cellphone" name="cellphone">
                    <input v-model="form.cellphone"  v-show="editmode" type="text" class="form-control" id="cellphone" name="cellphone" value="${form.cellphone}" disabled>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" v-show="editmode" class="btn btn-primary">Crear Codigo</button>
            <button type="submit" v-show="!editmode" class="btn btn-primary">Crear</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

     </div>

</template>
<script>
    export default {
        data(){
            return{
                editmode: false,
                pacientes:{},
                form: {
                    patient_id:'',
                    name : '',
                    lastname: '',
                    address: '',
                    district: '',
                    reference: '',
                    priority: '',
                    doctor: '',
                    oa: '',
                    insurance:'',
                    cellphone:''
                }
            }
        },
        methods: {
            DetallesModal(paciente){
               
                
                this.editmode = true
                this.form.patient_id = paciente.patient_id
                this.form.name = paciente.name
                this.form.lastname = paciente.lastname
                this.form.address = paciente.address
                this.form.district = paciente.district
                this.form.reference = paciente.reference
                this.form.priority = paciente.priority
                this.form.doctor = paciente.doctor
                this.form.insurance = paciente.insurance
                this.form.cellphone = paciente.cellphone

                
                $('#addNew').modal('show')
                
                
                console.log(name+" "+ this.editmode);
            },
            newModal(){
                this.editmode = false;
                this.form = {}
                $('#addNew').modal('show')
            },
            getPat(){
                var dataPaci = "getpacientes";
                axios.get(dataPaci).then((res)=> {
                    this.pacientes = res.data;
                });
            },
            updatePatient(){
                
                axios.post('updatePatient',{ data:this.form }).then((res)=>{
                    this.getPat();
                    $('#addNew').modal('hide')
                    console.log('paciente actualizado');
                }).catch(()=>{
                    console.log('hubo error en creacion');
                })
            },
            createPatient(){
                
                axios.post('crearPaciente',{ data:this.form }).then((res)=>{
                    this.getPat();
                    $('#addNew').modal('hide')
                    console.log('paciente creado');
                }).catch(()=>{
                    console.log('hubo error en creacion');
                })
            }

        },


        created() {
            this.getPat()
        }
    }
</script>