"use strict";

// let hello = "Hello World!"; 
// const hello = "Hello World!"; 
var hello = "Hello World!"; 
hello = "Hello World and me!";

window.foo = "Hello bar!";

{
    // block
    /**
     * 
     */
    let hello = "Hello Blocks World!";
}
// alert(hello);
// window.alert(foo);

function mult(n, m) {
    let result = n * m;
    return result;
}

// let x = prompt("Enter x = ");
// let result = mult(x, 2);
let result = 7 / 0;
// console.log(result);

// let o = prompt("Enter operation = ");
// let x = parseFloat(prompt("Enter x = "));
// let y = parseFloat(prompt("Enter y = "));

// if (isNaN(x) || isNaN(y)) {
//     console.error("x or y not a number")
// } else {
//     if (o == '+') {
//         result = x + y;
//     } else if (o == '-') {
//         result = x - y;
//     }else if(o == '*') {
//         result = x * y;
//     }else if (o == '/') {
//         result = x / y;
//     } else {
//         console.error("operation undifined")
//     }
//     console.log("Result = ", result);
// }

console.log(typeof mult);

let obj = {};
console.log(typeof obj);

function hell() {
    console.log("Hello function");
}

function hell1(hello, hello1="Defoult hello") {
    console.log(hello, hello1);
}

hell1(hello, "Hello options");
hell1(hello);

function hell2(x, y) {
    if (y === undefined) y = "Var undifined"; // !==
    console.log(x, y);
}

hell2(hello, "Test")
hell2(hello)

function hell3(x, y) {
    y = (y === undefined) ? "Ternar operator" : y;
    // if (y === undefined) y = "Var undifined"; // !==
    console.log(x, y);
}

hell3("Test 3");
hello4('текст призначено'); 
function hello4(x, text) { 
    text = text || 'текст не призначено';

    console.log(x, text);
}

hello4('текст призначено'); 


let fhello = function(){console.log("Hello Функціональний вираз - анонімна функція")};
    
fhello();

let add = function (a, b) {
    return a + b;
};

console.log(add(1, 2));

// console.log(ar_add(1, 2));
let ar_add = (a, b) =>  a + b;

console.log(ar_add(1, 2));


function greeting(name) {
    console.log("Hello " + name);
}

function getUserName(callback) {
    const name = prompt("Enter your name");
    callback(name);
}

getUserName(greeting);