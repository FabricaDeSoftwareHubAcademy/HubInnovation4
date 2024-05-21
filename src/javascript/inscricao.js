 
 
function mascaraCPF(i){
   
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
        i.value = v.substring(0, v.length-1);
       return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
 
}

function mascaraPhone(i){
   
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
        i.value = v.substring(0, v.length-1);
       return;
    }
    
    i.setAttribute("maxlength", "16");
    if (v.length == 1) i.value = ("(" + i.value) ;
 
    if (v.length == 3) i.value = (i.value + ") ") ;
    if (v.length == 6) i.value = (i.value + " ") ;
    
    if (v.length == 11) i.value += "-";
 
}


function validarTelefone(telefone) {
    // Expressão regular para validar o formato do telefone
    var regex = /^\(\d{2}\)\s\d\s\d{5}-\d{4}$/;
    
    // Testa se o telefone corresponde ao formato esperado
    if (regex.test(telefone)) {
        return true; // O formato é válido
    } else {
        return false; // O formato é inválido
    }
}


function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]/g, ''); // Remove caracteres não numéricos

    if (cpf.length !== 11 || !/[0-9]{11}/.test(cpf)) return false;

    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }

    let resto = soma % 11;
    let digitoVerificador1 = resto < 2 ? 0 : 11 - resto;

    if (parseInt(cpf.charAt(9)) !== digitoVerificador1) return false;

    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }

    resto = soma % 11;
    let digitoVerificador2 = resto < 2 ? 0 : 11 - resto;

    return parseInt(cpf.charAt(10)) === digitoVerificador2;
}

function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function allRed(){
    let balls = document.querySelectorAll(".ball")
    let colors = [
        "#f00",
        "#D92525",
        "#f00",
        "#f00",
        "#D92525"
    ]
    let i = 0
    balls.forEach(e => { 
      
        anime({
            targets: e,
            translateX: anime.random(-100,100),
            translateY: anime.random(-100,100),
            background: colors[i],
            direction: "alternate"
        }) 
         
        
        i++
    })

    setTimeout(() => {

        let ball5 = document.querySelector(".ball5")
        let ball1 = document.querySelector(".ball1")
        let ball2 = document.querySelector(".ball2")
        let ball3 = document.querySelector(".ball3")
        let ball4 = document.querySelector(".ball4")

        ball5.style.background = "#0a0013"
        ball1.style.background = "#9711ff"
        ball2.style.background = "#230495"
        ball3.style.background = "#c501e2"
        ball4.style.background = "#d49cff"
 
    },3000)
    
    
    
}

function allGreen(){
    let balls = document.querySelectorAll(".ball")
    let colors = [
        "#0CF25D",
        "#038C3E",
        "#02735E",
        "#025951",
        "#0f0"
    ]
    let i = 0
    balls.forEach(e => { 
        anime({
            targets: e,
            translateX: anime.random(-100,100),
            translateY: anime.random(-100,100),
            background: colors[i],
            direction: "alternate"
        }) 
        i++
    })


    setTimeout(() => {

        let ball5 = document.querySelector(".ball5")
        let ball1 = document.querySelector(".ball1")
        let ball2 = document.querySelector(".ball2")
        let ball3 = document.querySelector(".ball3")
        let ball4 = document.querySelector(".ball4")

        ball5.style.background = "#0a0013"
        ball1.style.background = "#9711ff"
        ball2.style.background = "#230495"
        ball3.style.background = "#c501e2"
        ball4.style.background = "#d49cff"
 
    },3000)
    
}

function closeModal(){

    modal = document.querySelector(".modal_inscricao")
    modal.classList.remove("active")
}
 
function activeModal(text){
    let modal = document.querySelector(".modal_inscricao")
    document.querySelector("#text_modal").innerHTML = text
    modal.classList.add("active")
}
 
function resetCampos(){

    let nome_input = document.querySelector("#nome_input").value = ""
    let email_input = document.querySelector("#email_input").value = ""
    let phone_input = document.querySelector("#phone_input").value = ""
    let cpf_input = document.querySelector("#cpf_input").value = "" 
    let date_input = document.querySelector("#date_input").value = ""
    let lgpd1 = document.querySelector("#lgpd1").checked = false
    let lgpd2 = document.querySelector("#lgpd2").checked = false

}

var form = document.querySelector("#form_inscricao")
form.addEventListener("submit",async (e) => {
    
    e.preventDefault() 
    document.querySelector("#btn_cad").disabled = true; 

    let nome_input = document.querySelector("#nome_input")
    let email_input = document.querySelector("#email_input")
    let phone_input = document.querySelector("#phone_input")
    let cpf_input = document.querySelector("#cpf_input")
    let gen_input = document.querySelector("#gen_input")
    let date_input = document.querySelector("#date_input")
    let lgpd1 = document.querySelector("#lgpd1")
    let lgpd2 = document.querySelector("#lgpd2")
    
    if(nome_input.value.length < 3){
        allRed()
        activeModal("Nome inválido, insira pelo menos 3 caracteres") 
        document.querySelector("#btn_cad").disabled = false;
        return
    }
    if(validarEmail(email_input.value) == false){
        allRed()
        activeModal("Email inválido, reescreva e tente novamente!") 
        document.querySelector("#btn_cad").disabled = false;
        return
    } 

    // if(validarTelefone(phone_input.value) == false){
    //     allRed()
    //     activeModal("Número de telefone inválido, reescreva no formato (xx) x xxxx-xxxx!") 
    //     return
    // }
    if(validarCPF(cpf_input.value) == false){
        allRed()
        activeModal("CPF inválido, reescreva e tente novamente!") 
        document.querySelector("#btn_cad").disabled = false;
        return
    } 

    if(gen_input.value == "Selecione"){
        allRed()
        activeModal("Gênero inválido, selecione uma das opções e tente novamente!") 
        document.querySelector("#btn_cad").disabled = false;
        return
    }
    if(date_input.value.length == 0){
        // VALIDAR SE A PESSOA TEM NO MINIMO UMA CERTA IDADE
        allRed()
        activeModal("Data de Nascimento inválida, reescreva e tente novamente!") 
        document.querySelector("#btn_cad").disabled = false;
        return
    }

    if(lgpd1.checked == false){
        // ja faz a validação se esta checked 
        allRed()
        activeModal("LGPD 1 não marcada, marque e tente novamente!") 
        document.querySelector("#btn_cad").disabled = false;
        return
    }

    if(lgpd2.checked == false){
        // ja faz a validação se esta checked 
        allRed()
        activeModal("LGPD 2 não marcada, marque e tente novamente!") 
        document.querySelector("#btn_cad").disabled = false;
        return
    }

    const formData = new FormData(form);
    //console.log(formData.get('cargo')); testando se pegou algo do input

    let data_php = await fetch("action/register_participant.php",{
             method:"POST",
             body: formData
         });
    
    let cad = await data_php.json();
    
    if(cad.status == 'success'){
        console.log('Cadastrado com Sucesso!!');
        allGreen()
        activeModal("Inscrição Realizada!") 
        resetCampos()
    }else{
        console.log('Erro ao Cadastrar!!');
        allRed()
        activeModal("CPF Já Cadastrado em outra Palestra!") 
    }
    
    document.querySelector("#btn_cad").disabled = false;

})

document.querySelector("#cancel_button").addEventListener("click",() => {window.location.href = "./index.php"})