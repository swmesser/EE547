var a = 0;

function subtract(){
    if (a > 0) {
        a = a - 1;
    }
    document.getElementById('result').value = a;
}

function add(){
        
    a = a + 1;
    document.getElementById('result').value = a;
}

function eventHandler(text) {
    alert("Something " + text);
}

function formLoad() {
    var URLParams = new URLSearchParams(window.location.search);
    var currentValue = parseInt(URLParams.get("formResults"));
    var operation = URLParams.get("operation");

    if (URLParams.has("formResults") == true && URLParams.has("operation") == true){
        if (operation == "up"){
            currentValue = currentValue + 1;
        } else {
            if (currentValue > 0){
                currentValue = currentValue - 1;
            } else {
                currentValue = currentValue;
            }
        }
        
        document.getElementById('formResults').value = currentValue;
    } else{ 
        document.getElementById('formResults').value = 0;
    }
}

function upHelper(operation){

}

function downHelper(operation){

}

function operationHelper(operation){
    var currentValue = parseInt(document.getElementById("inputResult"))
    var destination = "Counters.html?" + "operation=" + operation + "&inputResult=" + currentValue;
    location.href = destination;

}