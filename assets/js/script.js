//Capturando elemento do html
var pass = document.getElementById("pass")

pass.addEventListener("mouseover", ()=>{
    pass.type = "text"
})

pass.addEventListener("mouseleave", ()=>{
    pass.type = "password"
})