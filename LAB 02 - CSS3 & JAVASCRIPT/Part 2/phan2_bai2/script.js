/*global document*/

function add() {
    var op = document.getElementById("add");
    var num1 = op.getElementsByClassName("firstNumber")[0].value;
    var num2 = op.getElementsByClassName("secondNumber")[0].value;
    if (!num1 || !num2) {
        return alert("Please enter enough operands!");
    }
    document.getElementById("result-add").innerHTML = parseFloat(num1) + parseFloat(num2);
}

function sub() {
    var op = document.getElementById("sub");
    var num1 = op.getElementsByClassName("firstNumber")[0].value;
    var num2 = op.getElementsByClassName("secondNumber")[0].value;
    if (!num1 || !num2) {
        return alert("Please enter enough operands!");
    }
    document.getElementById("result-sub").innerHTML = parseFloat(num1) - parseFloat(num2);
}

function mul() {
    var op = document.getElementById("mul");
    var num1 = op.getElementsByClassName("firstNumber")[0].value;
    var num2 = op.getElementsByClassName("secondNumber")[0].value;
    if (!num1 || !num2) {
        return alert("Please enter enough operands!");
    }
    document.getElementById("result-mul").innerHTML = parseFloat(num1) * parseFloat(num2);
}

function divi() {
    var op = document.getElementById("divi");
    var num1 = op.getElementsByClassName("firstNumber")[0].value;
    var num2 = op.getElementsByClassName("secondNumber")[0].value;
    if (!num1 || !num2) {
        return alert("Please enter enough operands!");
    }
    if (parseFloat(num2) == 0) {
        return alert("Cannot divided by 0!");
    }
    document.getElementById("result-divi").innerHTML = parseFloat(num1) / parseFloat(num2);
}

function pow() {
    var op = document.getElementById("pow");
    var num1 = op.getElementsByClassName("firstNumber")[0].value;
    var num2 = op.getElementsByClassName("secondNumber")[0].value;
    if (!num1 || !num2) {
        return alert("Please enter enough operands!");
    }
    document.getElementById("result-pow").innerHTML = Math.pow(parseFloat(num1), parseFloat(num2));
}