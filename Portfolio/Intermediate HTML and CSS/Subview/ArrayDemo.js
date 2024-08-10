// Javascript Source Code

var vehicles = [
    {"manufacturer": "Honda", "model": "Accord"},
    {"manufacturer": "Honda", "model": "Civic"},
    {"manufacturer": "Honda", "model": "CRV"},
    {"manufacturer": "Toyota", "model": "Camry"},
    {"manufacturer": "Toyota", "model": "Corrola"},
    {"manufacturer": "Toyota", "model": "Forerunner"},
    {"manufacturer": "Toyota", "model": "Tacoma"},
    {"manufacturer": "Ford", "model": "F150"},
    {"manufacturer": "Ford", "model": "F250"},
    {"manufacturer": "Ford", "model": "F350"},
    {"manufacturer": "Ford", "model": "Explorer"}
]

console.log(vehicles.length);


function PopulateManufacturers(){
    var manufacturers = [];
    document.getElementById('manufacturers').innerHTML = "";

    //loop through all vehicles--> remove duplicates
    for( let i = 0; i < vehicles.length; i++){
        if(!manufacturers.includes(vehicles[i].manufacturer)){
            manufacturers.push(vehicles[i].manufacturer);
        }
    }
    
    //build and display html
    for( let i =0; i< manufacturers.length; i++ ){
        document.getElementById('manufacturers').innerHTML += "<option>" + manufacturers[i] + "</option>";
    }
    // calling populateModels

}

function PopulateModels(){
    var selectedMake = document.getElementById('manufacturers').value;
    var models = [];

    for( let i = 0; i < vehicles.length; i++){
        if( vehicles[i].manufacturer == selectedMake){
            models.push(vehicles[i].model);
        }
    }

    document.getElementById('models').innerHTML = "";
   
    for( let i = 0; i < models.length; i++ ){
        document.getElementById('models').innerHTML += "<option>" + models[i] + "</option>";
    }

    
}

function PopulateResults() {
    var selectedMake = document.getElementById('manufacturers').value;
    var selectedModel = document.getElementById('models').value;

    document.getElementById('results').value = selectedMake + " " + selectedModel;
}