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
    
const COLORS = [
"#fff9ea",
"#d49cff",
"#a35ed9",
"#c501e2",
"#7635a8",
"#9711ff"]

var validAttribute = (e,a ) => {
    if(e.hasAttribute(a)){
        if(!isNaN(e.getAttribute(a))){
            return true
        }
    }
    return false
}

document.addEventListener("DOMContentLoaded",(e) => {

    var imgs_palestrante = document.querySelectorAll(".imgs_palestrante")
    imgs_palestrante.forEach(e => {
        var imgs = e.querySelectorAll("img")
     
        imgs.forEach(e => {
            e.style.opacity = 0
        })
        imgs[0].style.opacity = 1
    })
    

})
 
var moveCard = (e,side) => {
     
    let card_container = e.closest(".card-container") 
    let imgs_palestrantes = card_container.querySelector(".imgs_palestrante")
    let imgs = imgs_palestrantes.querySelectorAll("img") 

    if(!validAttribute(imgs_palestrantes,"data-carousel")){
        imgs_palestrantes.setAttribute("data-carousel",0)
    }
    if(side == "right"){ 
        imgs_palestrantes.setAttribute("data-carousel", parseInt(imgs_palestrantes.getAttribute("data-carousel"))+1) 
        if(parseInt(imgs_palestrantes.getAttribute("data-carousel"))  >= imgs.length ){
            imgs_palestrantes.setAttribute("data-carousel",0)
        } 
    }else{
        imgs_palestrantes.setAttribute("data-carousel", parseInt(imgs_palestrantes.getAttribute("data-carousel"))-1)
        if(parseInt(imgs_palestrantes.getAttribute("data-carousel"))  < 0){
            imgs_palestrantes.setAttribute("data-carousel",imgs.length - 1)
        } 
    }
 
  
    
    let index_carousel =  parseInt(imgs_palestrantes.getAttribute("data-carousel"))
   
    for (let index = 0; index < imgs.length; index++) {
        if(index == index_carousel){
            imgs[index].style.opacity = "1"
            continue
        } 
        imgs[index].style.opacity = "0"
        
    }

    
} 

