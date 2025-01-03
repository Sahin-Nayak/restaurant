
/* show first alert after open the website */
// window.onload = function() {
//     alert("Welcome To Login Page");
//   };

/* focus and non focus */
const inputs = document.querySelectorAll(".input");

function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}

inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

/*auto text write */

const textContainer = document.getElementById("text-container");
const text = "Welcome Login Here";
let index = 0;

function writeText() {
    textContainer.innerHTML = text.substring(0, index);
    index++;
    if (index > text.length) {
        index = text.length;
    }
}
setInterval(writeText,1300);

const text1Containerr = document.getElementById("text1-container");
const text1 = "Forget Your Password ?? Don't Worry Reset From Here ";
let index1 = 0;

function writeText1() {
    text1Containerr.innerHTML = text1.substring(0, index1);
    index1++;
    if (index1 > text1.length) {
        index1 = text1.length;
    }
}

setInterval(writeText1,800);

const text2Container = document.getElementById("text2-container");
const text2 = "Register Here ";
let index2 = 0;

function writeText2() {
    text2Container.innerHTML = text2.substring(0, index2);
    index2++;
    if (index2 > text2.length) {
        index2 = text2.length;
    }
}
setInterval(writeText2,800);

/* form validation */

function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }


}
function seterror(id, error){
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function registervalidateForm(){
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var name = document.forms['myForm']["userName"].value;
    if (name.length<3){
        seterror("Name", "*Length of name is too short");
        returnval = false;
    }

    // if (name.length == 0){
    //     seterror("Name", "*Length of name cannot be zero!");
    //     returnval = false;
    // }
    function validateEmail(email){
        const emailRegex= /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    var email = document.forms['myForm']["Email"].value;
    if (!validateEmail(email)){
        seterror("e-mail", "*Email is not in valid format");
        returnval = false;
    }

    function validatePassword(password) {
        const upperRegex = /[A-Z]/;
        const lowerRegex = /[a-z]/;
        const specialRegex = /[!@#$%^&*(),.?":{}|<>]/;
        const numberRegex = /\d/;
        return (upperRegex.test(password) && lowerRegex.test(password) && specialRegex.test(password) && numberRegex.test(password));
    }

    var password = document.forms['myForm']["Passs"].value;
    if (password.length<8){
        seterror("pass_word", "*Password should be atleast 8 characters long!");
        returnval = false;
    }

    return returnval;
}

