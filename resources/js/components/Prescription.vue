<template>
    <div class="container">
        <form>
            <div class="row justify-content-center">
                <h1>Patient Prescription</h1>
            </div>

            <br>

            <div class="form-row">

                <div class="form-group col-md-3">
                <label for="fname">Name: <b><a v-bind:href="patientRoute">{{name}}</a></b></label> <br>
                </div>

                <div class="form-group col-md-3">
                    <label for="gender">Gender: <b>{{gender}}</b> </label>
                </div>

                <div class="form-group col-md-3">
                    <label for="age">Age(Years): <b>{{age}}</b> </label>
                </div>
                
                <div class="form-group col-md-3">
                    <label for="gender">Appointment Id: <b>{{appt_id}}</b> </label>
                </div>

                

            </div>

            <div class="form-row">
                <div class="form-group col-md-4 ">
                    <input type="text" class="form-control" v-model="weight" placeholder="Weight(kg)">
                </div>

                <div class="form-group col-md-4">
                    <input type="text" class="form-control" v-model="bpHigh" placeholder="Blood Pressure(High)">
                </div>

                <div class="form-group col-md-4">
                    <input type="text" class="form-control" v-model="bpLow" placeholder="Blood Pressure(Low)">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-5">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Symptoms</div>
                        <div class="card-body">
                            <div class="list-group">
                                <div v-for="(symtom,index) in addedSymptoms" class="list-group-item"
                                    v-bind:key="index">
                                    <div class="row">
                                        <div class="col">{{symtom.name}}</div>
                                        <div class="col-md-1">
                                            <button class="btn btn-danger btn-sm" v-on:click.prevent="addedSymptoms.splice(index,1)">X</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <auto-complete v-model="symptom" 
                                    v-bind:data="this.symptoms" 
                                    field="name"
                                    placeholder="Symptom"></auto-complete>
                    <div class="d-flex flex-row-reverse">
                        <button v-on:click.prevent="addSymptom" class="btn btn-primary"
                                v-bind:disabled="!isSymptomValid">Add</button>
                    </div>
                    <div class="card-box mt-2">
                        <div class="card-header bg-primary text-white">Tests</div>
                        <div class="card-body">
                            <div class="list-group">
                                <div v-for="(test,index) in addedTests" class="list-group-item"
                                    v-bind:key="index">
                                    <div class="row">
                                        <div class="col">{{test.name}}</div>
                                        <div class="col-md-1">
                                            <button class="btn btn-danger btn-sm" v-on:click.prevent="addedTests.splice(index,1)">X</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <auto-complete v-model="test" 
                                    v-bind:data="this.tests" 
                                    field="name"
                                    placeholder="Test"></auto-complete>
                    <div class="d-flex flex-row-reverse">
                        <button v-on:click.prevent="addTest" class="btn btn-primary mb-2"
                                v-bind:disabled="!isTestValid">Add</button>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Medicines</div>
                        <div class="card-body">
                            <div class="list-group">
                                <div v-for="(medicine,index) in addedMedicines" class="list-group-item"
                                        v-bind:key="index">
                                    <div class="row">
                                        <div class="col">{{medicine.name}}</div>
                                        <div class="col">{{medicine.duration}} Days</div>
                                        <div class="col">{{medicine.dosage}}</div>
                                        <div class="col-md-1">
                                            <button class="btn btn-danger btn-sm" v-on:click.prevent="addedMedicines.splice(index,1)">X</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <auto-complete v-model="medicine" 
                                            v-bind:data="this.availMedicines" 
                                            field="name"
                                            placeholder="Medicine Name"></auto-complete>
                        </div>
                        <div class="col-md-3">
                            <input type="text" placeholder="Duration(Days)" v-model="duration">
                        </div>
                        <div class="col-md-3">
                            <input type="text" placeholder="Dosage" v-model="dosage">
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button v-on:click.prevent="addMedicine" class="btn btn-primary"
                                v-bind:disabled="!isMedicineValid">Add</button>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a v-bind:href="submitRoute" class="btn btn-primary mb-2 ml-auto" 
                   v-on:click="submitForm($event)"
                   v-bind:class="{'disabled':!isFormValid}">Submit</a>
            </div>
        </form>
    </div>
</template>

<script>
import AutoComplete from './AutoComplete.vue';
export default {
    props: ['name','gender','appt_id','patientRoute','submitRoute',
            'availMedicinesurl','symptomsurl','testsurl','prescriptionPost',
            'presmedicinePost','pressympPost','prestestPost','age'],
    components: {
        'auto-complete':AutoComplete
    },
    data() {
        return {
            weight:'',
            bpLow:'',
            bpHigh:'',
            medicine:{},
            symptom:{},
            test:{},
            duration:'',
            dosage:'',
            symptoms:[],
            availMedicines:[],
            tests:[],
            addedMedicines:[],
            addedSymptoms:[],
            addedTests:[]
        }
    },
    created() {
        this.fetchAvailableMedicines();
        this.fetchSymptoms();
        this.fetchTests();
    },
    methods: {
        fetchAvailableMedicines() {
            fetch(this.availMedicinesurl)
                .then(res=>res.json())
                .then(res=> {
                    this.availMedicines=res;
                });
        },
        fetchSymptoms() {
            fetch(this.symptomsurl)
                .then(res=>res.json())
                .then(res=> {
                    this.symptoms=res;
                });
        },
        fetchTests() {
            fetch(this.testsurl)
                .then(res=>res.json())
                .then(res=> {
                    this.tests=res;
                })
        },
        addMedicine() {
            let object=this.medicine;
            object['duration']=this.duration;
            object['dosage']=this.dosage;
            this.addedMedicines.push(object);
            this.medicine={};
            this.duration='';
            this.dosage='';
        },
        addSymptom() {
            this.addedSymptoms.push(this.symptom);
            this.symptom={};
        },
        addTest() {
            this.addedTests.push(this.test);
            this.test={};
        },
        submitForm(event) {
            // event.preventDefault();
            fetch(this.prescriptionPost,{
                    method:'POST',
                    headers: {
                        'Content-type':'application/json'
                    },
                    body: JSON.stringify({
                        'appt_id':this.appt_id,
                        'weight':this.weight,
                        'bpLow':this.bpLow,
                        'bpHigh':this.bpHigh
                        })
                })
                .then(res=>res.json())
                .then(res=> {
                    let prescriptionId=res.prescription_id;
                    this.addedMedicines.forEach(medicine=> {
                        if(!medicine.id)
                        {
                            fetch(this.availMedicinesurl,{
                                    method:'POST',
                                    headers: {
                                        'Content-type':'application/json'
                                    },
                                    body: JSON.stringify({
                                        'name':medicine.name
                                        })
                                })  
                                .then(res=>res.json())
                                .then(res=>{
                                    medicine.id=res.id;
                                    fetch(this.presmedicinePost,{
                                        method:'POST',
                                        headers: {
                                            'Content-type':'application/json'
                                        },
                                        body: JSON.stringify({
                                            'prescription_id':prescriptionId,
                                            'medicine_id':medicine.id,
                                            'duration':medicine.duration,
                                            'dosage':medicine.dosage
                                            })
                                    });
                                });
                        }
                        else
                        {
                            fetch(this.presmedicinePost,{
                                method:'POST',
                                headers: {
                                    'Content-type':'application/json'
                                },
                                body: JSON.stringify({
                                    'prescription_id':prescriptionId,
                                    'medicine_id':medicine.id,
                                    'duration':medicine.duration,
                                    'dosage':medicine.dosage
                                    })
                            });
                        }
                    });
                    this.addedSymptoms.forEach(symptom=> {
                        if(!symptom.id)
                        {
                            fetch(this.symptomsurl,{
                                    method:'POST',
                                    headers: {
                                        'Content-type':'application/json'
                                    },
                                    body: JSON.stringify({
                                        'name':symptom.name
                                        })
                                })  
                                .then(res=>res.json())
                                .then(res=> {
                                    symptom.id=res.id;
                                    fetch(this.pressympPost,{
                                        method:'POST',
                                        headers: {
                                            'Content-type':'application/json'
                                        },
                                        body: JSON.stringify({
                                            'prescription_id':prescriptionId,
                                            'symptom_id':symptom.id
                                            })
                                    });
                                });
                        }
                        else
                        {
                            fetch(this.pressympPost,{
                                method:'POST',
                                headers: {
                                    'Content-type':'application/json'
                                },
                                body: JSON.stringify({
                                    'prescription_id':prescriptionId,
                                    'symptom_id':symptom.id
                                    })
                            });
                        }
                    });
                    this.addedTests.forEach(test=> {
                        if(!test.id)
                        {
                            fetch(this.testsurl,{
                                    method:'POST',
                                    headers: {
                                        'Content-type':'application/json'
                                    },
                                    body: JSON.stringify({
                                        'name':test.name
                                        })
                                })  
                                .then(res=>res.json())
                                .then(res=>{
                                    test.id=res.id;
                                    fetch(this.prestestPost,{
                                        method:'POST',
                                        headers: {
                                            'Content-type':'application/json'
                                        },
                                        body: JSON.stringify({
                                            'prescription_id':prescriptionId,
                                            'test_id':test.id
                                            })
                                    });
                                });
                        }
                        else
                        {
                            fetch(this.prestestPost,{
                                method:'POST',
                                headers: {
                                    'Content-type':'application/json'
                                },
                                body: JSON.stringify({
                                    'prescription_id':prescriptionId,
                                    'test_id':test.id
                                    })
                            });
                        }
                    });
            });
        }
    },
    computed: {
        isFormValid() {
            if(!this.weight||!this.bpLow||!this.bpHigh)
                return false;
            return true;
        },
        isTestValid() {
            if(!this.test.name)
                return false;
            return true;
        },
        isSymptomValid() {
            if(!this.symptom.name)
                return false;
            return true;
        },
        isMedicineValid() {
            if(!this.medicine.name||!this.duration||!this.dosage)
                return false;
            return true;
        }
    }
}
</script>