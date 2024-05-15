var card = document.querySelectorAll(".card-container")
var timeoutWrite 

    card.forEach(e => {
 
            e.addEventListener("mouseenter", () => {
        
                clearTimeout(timeoutWrite)
                var title = e.querySelector(".titulo-palestra")
                var title2 = e.querySelector(".titulo-palestra2")
        
                var textTitle = title.innerHTML
                title.style.display = "none"
        
                var i = 0
                var wrote_text = ""
                function writeText(textTitle){
        
                    wrote_text = wrote_text + textTitle[i]
        
                    if(wrote_text.length < textTitle.length){
                        
                        title2.innerHTML = wrote_text + "|"
                        timeoutWrite = setTimeout(() => {
                            writeText(textTitle)
                        },30)
                    } else{ 
                        title2.innerHTML = wrote_text  
                    }
                    i++
                } 
          
        
                writeText(textTitle)
            })
            e.addEventListener("mouseleave", () => {
        
                 
            })
        

        }
    )
    
    const COLORS = ["#fff9ea",
    "#d49cff",
    "#a35ed9",
    "#c501e2",
    "#7635a8",
    "#9711ff"]

     
    // var bubble = document.querySelectorAll(".bubble")
    // var i = 0;
    // bubble.forEach((e) => {
    //     setInterval(() =>{
          
            
    //         const altura = document.querySelector(".area_palestras_cards").offsetHeight + 50;
    //         const largura = window.innerWidth
        
    //         const distanciaAltura = altura  /2
    //         const distanciaLargura = largura 
             
    //         e.style.transform = "translateX("+anime.random(-distanciaLargura,distanciaLargura)+"px) "+ "translateY("+anime.random(90,distanciaAltura)+"px) rotate("+anime.random(0,400)+"deg) scaleY("+anime.random(0.5,2)+")"
    //         e.style.background =  COLORS[Math.floor(Math.random() * COLORS.length)]

    //     },5000)
       
    // }) 
 