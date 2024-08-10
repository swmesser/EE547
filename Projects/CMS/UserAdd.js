function clientValidate(){
    let userId = document.forms['AddForm']['userId'].value;
    let fname = document.forms['AddForm']['fname'].value;
    let lname = document.forms['AddForm']['lname'].value;
    let email = document.forms['AddForm']['email'].value;
    let result = false;
    
    if (userId == ""){
        alert("User Id must be filled out");
    } else if (fname == ""){
        alert("First name must be filled out");
    } else if (lname == ""){
        alert("Last name must be filled out");
    } else if (email == ""){
        alert("Email must be filled out");
    } else {
        result = true;
    }
    console.log(result);
    return result;
}